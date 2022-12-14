<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Lead;
use App\Models\User;
use App\Models\Status;
use App\Models\Countrydetail;
use App\Models\Leaddetail;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\LeadsImport;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\{Country, State, City};
use DB;
use Hash;
use DataTables;



class AdminController extends Controller
{

    public function viewlead($id) {
        $userId = Session::get('loginId');
        $admin = User::where('id','=', $userId)->first();

        $lead = Lead::where('id','=', $id)->first();
        $leaddetails = Leaddetail::where('leadid','=', $id)->first();
        $countrydetails = Countrydetail::where('leadid','=', $id)->first();

        return view('admin.viewlead', [
            
            'admin' => $admin,
            'lead' => $lead,
            'leaddetails' => $leaddetails,
            'countrydetails' => $countrydetails,
        ]);
    }
    public function viewleads() {
        
        $userId = Session::get('loginId');
        $admin = User::where('id','=', $userId)->first();
      

        return view('admin.viewleads', [        
            'admin' => $admin,
        ]);
           
       
    }

    public function leadnote() {
        
        $userId = Session::get('loginId');
        $admin = User::where('id','=', $userId)->first();
      

        return view('admin.leadnote', [        
            'admin' => $admin,
        ]);
           
       
    }

    public function updatedetails(Request $request, $id) {
        
        $lead =  Lead::where('id','=', $id)->first();
        $lead->lead = $request->lead;
      

  
    $res = $lead->update();

        

    if($res) {
        return back()->with('success',"Cheque details updated");
    }

    else {
        return back()->with('fail',"Something went wrong");
    }
}

    public function details() {
        if(request()->ajax())
        {

            $data = DB::table('leads')
            ->join('statuses', 'leads.id', '=', 'statuses.leadid')
            ->get();
            
            return datatables()->of($data)->make(true);
        }
       
    }

    public function viewagents() {  

        $userId = Session::get('loginId');
        $admin = User::where('id','=', $userId)->first();   
 
         return view('admin.viewagents', [
             'admin' => $admin,    
         ]);
            
        
     }

     public function leadtransaction() {  

        $userId = Session::get('loginId');
        $admin = User::where('id','=', $userId)->first();   
 
         return view('admin.leadtransaction', [
             'admin' => $admin,    
         ]);
            
        
     }

     public function leadtransactionview($id) {  

        $userId = Session::get('loginId');
        $admin = User::where('id','=', $userId)->first(); 
        
        $leads = Lead::where('agentid','=', $id)->get(); 
 
         return view('admin.leadtransactionview', [
             'admin' => $admin,  
             'leads' => $leads,  
         ]);

     }

     public function agentdetails() {

        if(request()->ajax())
        {

            $data = DB::table('users')
            ->where('admin', 0)
            ->get();

            foreach($data as $agent) {
                $agent->dob =  date('d-m-Y', strtotime($agent->dob)) ; 
            }
            
            return datatables()->of($data)->make(true);
        }
       
        
     }

     public function agentsummary() {   

        $userId = Session::get('loginId');
        $admin = User::where('id','=', $userId)->first();
        
        $agents = DB::table('users')->where('admin', 0)->get();
        if($agents){  
 
         return view('admin.agentsummary', [
             'agents' => $agents,
             'admin' => $admin,
         ]);
 
        }
            
        
     }

     

     public function editlead($id){

        $country = null;
        $state = null;
        $city = null;
        $countries = Country::get(["name", "id", "phonecode"]);

        $userId = Session::get('loginId');
        $admin = User::where('id','=', $userId)->first();
        $countrydetail = Countrydetail::where('leadid','=', $id)->first();
        $lead = Lead::where('id','=', $id)->first();
        $leaddata = Leaddetail::where('leadid','=', $id)->first();
        if($countrydetail) {
            $country = Country::where('name','=', $countrydetail->countryname)->first();
            $state = State::where('name','=', $countrydetail->state)->first();
            $city = City::where('name','=', $countrydetail->city)->first();
        }   
 
            return view('admin.updatelead', ['lead' => $lead,'admin' => $admin, 'countries' => $countries, 'countrydetail' => $countrydetail, 'leaddata' => $leaddata, 'country' => $country, 'state' => $state, 'city' => $city]);
        
     }

     public function updatelead(Request $request,$id){


        //update basic details of the lead

        $res = DB::table('leads')
        ->where('id', $id)
        ->update(['name' => $request->name, 'phonenumber' => $request->phonenumber, 'email' => $request->email, 'accountnumber' => $request->accountnumber]);

        // update country details of the lead
        
        $country = Country::where('id','=', $request->countryid)->first();
        $state = State::where('id','=', $request->stateid)->first();
        $city = City::where('id','=', $request->cityid)->first();

        if($country && $state) {
            $val = Countrydetail::where('leadid', $id)->first();

             if($val) {
            
             $result = DB::table('countrydetails')
            ->where('leadid', $id)
            ->update(['countryname' => $country->name , 'state' => $state->name, 'city' => optional($city)->name, 'countrycode' => $country->phonecode]);
        }
 
        else {
            $result = DB::table('countrydetails')->insert(['countryname' => $country->name , 'state' => $state->name, 'city' => optional($city)->name, 'countrycode' => $country->phonecode, 'leadid' => $id]);
        }
        }

        //update lead position, leadtype and phonenumber2

        $position = $request->position;
        $phonenumber2 = $request->phonenumber2;
        $leadtype = $request->leadtype;

       if($position || $phonenumber2 ||  $leadtype ) {
        $lead = Leaddetail::where('leadid', $id)->first();

        if($lead) {
            
            $success = DB::table('leaddetails')
           ->where('leadid', $id)
           ->update(['position' => $request->position , 'phonenumber2' => $request->phonenumber2, 'leadtype' => $request->leadtype]);
       }

       else {
           $success = DB::table('leaddetails')->insert(['position' => $request->position , 'phonenumber2' => $request->phonenumber2, 'leadtype' => $request->leadtype,'leadid' => $id]);
       }
       }
            
        if($res || isset($result) || isset($success) ) {
            return redirect('/admindashboard/viewleads')->with('success','Lead updated successfully');
        }
        else {
            return redirect('/admindashboard/viewleads')->with('fail','Something went wrong. Please try again');
        }
     }

     public function deletelead($id){

        $lead = Lead::findOrFail($id);
        $res = $lead->delete();
  
        if($res) {
            return redirect('/admindashboard/viewleads')->with('success','Lead deleted successfully');
        }
        else {
            return redirect('/admindashboard/viewleads')->with('fail','Something went wrong. Please try again');
        }
     }

     public function editagent($id){
            
        $userId = Session::get('loginId');
        $admin = User::where('id','=', $userId)->first();
         
        $agent = User::where('id','=', $id)->first();

        if($agent->dob) {
            $agent->properdate = date('d-m-Y', strtotime($agent->dob)) ;
        }
        
        return view('admin.updateagent', [
            'agent' => $agent,
            'admin' => $admin,
      ]);
     }

     public function fetchleads(Request $request)
    {    
        
        if($request->lead) {

            $data['leads'] = DB::table('leads')
            ->join('statuses', 'leads.id', '=', 'statuses.leadid')
            ->leftjoin('countrydetails', 'leads.id', '=', 'countrydetails.leadid')
            ->leftjoin('leaddetails', 'leads.id', '=', 'leaddetails.leadid')
            ->where('leads.id', '=', $request->lead)
            ->get();

            $transaction = DB::table('transactiondetails')
            ->where('leadid', '=', $request->lead)
            ->get();
        }

       
        $returnArr = [$data, $transaction];    
        return response()->json($returnArr);
        

    }

     public function fetchState(Request $request)
     {
         $data['states'] = State::where("country_id",$request->country_id)->get(["name", "id"]);
         return response()->json($data);
     }
     public function fetchCity(Request $request)
     {
         $data['cities'] = City::where("state_id",$request->state_id)->get(["name", "id"]);
         return response()->json($data);
     }

     public function updateagent(Request $request,$id){

       //TODO: Forget the session of the agent if email is changed

       $userId = Session::get('loginId');
       $user = User::where('id','=', $userId)->first();

       $dob = date('Y-m-d', strtotime($request->dob));

       $password = Hash::make($request->password);

       if($request->password) {
        $logout = DB::table('users')
        ->where('id', $id)
        ->update(['verified' => 0, 'password' => $password  ]);
       }

        $res = DB::table('users')
        ->where('id', $id)
        ->update(['first_name' => $request->firstname, 'last_name' => $request->lastname,'email' => $request->email,  'dob' => $dob, 'gender' => $request->gender, 'phonenumber' => $request->phone]);

        if($res || isset($logout) ) {
            return redirect('/admindashboard/viewagents')->with('success','Agent updated successfully');
        }
        else {
            return redirect('/admindashboard/viewagents')->with('fail','Something went wrong. Please try again');
        }
     }

     public function deleteagent($id){

        $agent = User::findOrFail($id);
        $res = $agent->delete();
  
        if($res) {
            return redirect('/admindashboard/viewagents')->with('success','Agent deleted successfully');
        }
        else {
            return redirect('/admindashboard/viewagents')->with('fail','Something went wrong. Please try again');
        }
     }

     public function assignleads() {
  
        $userId = Session::get('loginId');
        $admin = User::where('id','=', $userId)->first();

        $agents = DB::table('users')->where('admin', 0)->get();
        // $status = DB::table('statuses')->where('admin', 0)->get();
        $leads = DB::table('leads')->get();

        $statuses = DB::table('statuses')->get();

        if($leads && $agents){  
 
         return view('admin.assignleads', [
             'leads' => $leads,
             'agents' => $agents,
             'admin' => $admin,
             'statuses' => $statuses,
         ]);
 
        }           
        
     }

     public function leadassign(Request $request) {

        $res = null;

        $agentid = $request->agent;
        $agent = User::where('id','=',$agentid)->first();
  
        $leads = $request->lead;
        if (isset($_POST['assign'])) {
            if($leads){
                foreach($leads as $lead) {   
                    $res = Lead::where('id', $lead)
                    ->update(['agentid' => $agentid, 'agentname' => $agent->name]);
                        
                    Status::where('leadid', $lead)
                    ->update(['status' => 'Assigned']);
                }
                if($res) {
                    return back()->with('success',"Agent Assigned");
                }
                else {
                    return back()->with('fail',"Something went wrong");
                }
            }
            else {
                return back()->with('fail',"Please select lead to assign");
            }
        }

        elseif(isset($_POST['unassign'])) {
            if($leads){
                foreach($leads as $lead) {   
                    $res = Lead::where('id', $lead)
                    ->update(['agentid' => null, 'agentname' => null]);
                        
                    Status::where('leadid', $lead)
                    ->update(['status' => 'Unassigned']);
                }

                if($res) {
                    return back()->with('success',"Agent Unassigned");
                }
                else {
                    return back()->with('fail',"Something went wrong");
                }
            }
            else {
                return back()->with('fail',"Please select lead to assign");
            }
        }
        

       

       

        
 
        }


    // public function search(Request $request)
    // {
    //     $value = $request->get('details');
    //     if($value == "All") {
    //         $leads = DB::table('leads')->get();
    //         return redirect()->to('/admindashboard/viewleads');
    //     }
    //     else {
    //         $leads = DB::table('leads')->where('name', $value)->get();
    //         if($leads){
    //             return redirect()->to('/admindashboard/viewleads');
    //         }
    //     }

    // }
 
    public function leadupload(){

        $userId = Session::get('loginId');
         $admin = User::where('id','=', $userId)->first();
        
        $code = Session::get('code');
        
        $leads = DB::table('leads')->where('batchid', '=', $code)->get();
        Session::forget('code');
        return view("admin.leadupload", [
                'leads' => $leads,
                'admin' => $admin,
            ]);        
           
    }

    public function upload(Request $request){

       $file = $request->file;

       if($file) {
        Excel::import(new LeadsImport, $file); 
        return redirect('admindashboard/leadupload'); 
        
       }
       else {
        return redirect('admindashboard/leadupload'); 
       }
        
    }

    public function admindashboard(){
        if(Session::has('loginId')){

         $leads = DB::table('leads')->get();
         $agents = DB::table('users')->where("admin",0)->get();

         $userId = Session::get('loginId');
         $admin = User::where('id','=', $userId)->first();

         return view('admin.admindashboard', [
                'leads' => $leads,
                'agents' => $agents,
                'admin' => $admin,
            ]);
        }
       

       
   }

   public function leadsummary(){

    $userId = Session::get('loginId');

    $admin = User::where('id','=', $userId)->first();
    
    $leads = DB::table('leads')->get();
        if($leads){  
 
         return view('admin.leadsummary', [
             'leads' => $leads,
             'admin' => $admin,
         ]);
 
        }
   

   
}

   public function logout(){

    $userId = Session::get('loginId');;

    $user = User::where('id','=', $userId)->first();

    if(Session::has('loginId')){
        $user->verified = false;
        $user->update();
        Session::pull('loginId');
        Session::forget('loginId');

        return redirect('/adminlogin');
    }
}
  
}