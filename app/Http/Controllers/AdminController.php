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



class AdminController extends Controller
{
    public function viewleads() {
        
        $userId = Session::get('loginId');
        $admin = User::where('id','=', $userId)->first();
       $leads = DB::table('leads')->get();
  

       if($leads){  

        return view('admin.viewleads', [
            'leads' => $leads,
            'admin' => $admin,
        ]);

       }
           
       
    }

    public function viewagents() {  

        $userId = Session::get('loginId');
        $admin = User::where('id','=', $userId)->first();

        $agents = DB::table('users')->where('admin', 0)->get();
        if($agents){  
 
         return view('admin.viewagents', [
             'agents' => $agents,
             'admin' => $admin,
         ]);
 
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
        ->update(['name' => $request->name, 'phonenumber' => $request->phonenumber, 'email' => $request->email]);

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

        return view('admin.updateagent', [
            'agent' => $agent,
            'admin' => $admin,
      ]);
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

        $res = DB::table('users')
        ->where('id', $id)
        ->update(['first_name' => $request->firstname, 'last_name' => $request->lastname,'email' => $request->email, 'dob' => $request->dob, 'gender' => $request->gender, 'phonenumber' => $request->phone]);

        if($res) {
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

        $agentid = $request->agent;
        $agent = User::where('id','=',$agentid)->first();
  
        $leads = $request->lead;
        if($leads){
            foreach($leads as $lead) {

                $res = Lead::where('id', $lead)
                ->update(['agentid' => $agentid, 'agentname' => $agent->name]);
                
                Status::where('leadid', $lead)
                ->update(['status' => 'Assigned']);
            }
        }

        else {
            return back()->with('fail',"Please select agent to assign");
        }
        

        if($res) {
            return back()->with('success',"Agent Assigned");
        }

        else {
            return back()->with('fail',"Something went wrong");
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