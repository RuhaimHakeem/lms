<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Lead;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\LeadsImport;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{

    public function viewleads() {
  
       
    
       $leads = DB::table('leads')->get();
  

       if($leads){  

        return view('admin.viewleads', [
            'leads' => $leads,
        ]);

       }
           
       
    }

    public function viewagents() {   

        $agents = DB::table('users')->where('admin', 0)->get();
        if($agents){  
 
         return view('admin.viewagents', [
             'agents' => $agents,
         ]);
 
        }
            
        
     }

     public function agentsummary() {   

        $agents = DB::table('users')->where('admin', 0)->get();
        if($agents){  
 
         return view('admin.agentsummary', [
             'agents' => $agents,
         ]);
 
        }
            
        
     }

     

     public function editlead($id){

       
        $lead = Lead::where('id','=', $id)->first();

        return view('admin.updatelead', [
            'lead' => $lead,
        ]);
     }

     public function updatelead(Request $request,$id){

       
        $res = DB::table('leads')
        ->where('id', $id)
        ->update(['name' => $request->name, 'phonenumber' => $request->phonenumber, 'email' => $request->email]);

        if($res) {
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

       
        $agent = User::where('id','=', $id)->first();

        return view('admin.updateagent', [
            'agent' => $agent,
        ]);
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
  
       
        $agents = DB::table('users')->where('admin', 0)->get();
        $leads = DB::table('leads')->get();
        if($leads && $agents){  
 
         return view('admin.assignleads', [
             'leads' => $leads,
             'agents' => $agents,
         ]);
 
        }
            
        
     }

     public function leadassign(Request $request) {

        $agentid = $request->agent;
        $agent = User::where('id','=',$agentid)->first();
  
        $leads = $request->lead;
        if($leads){
            foreach($leads as $lead) {
                $res = DB::table('leads')
                ->where('id', $lead)
                ->update(['agentid' => $agentid, 'agentname' => $agent->name]);       
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

        
        $code = Session::get('code');
        
        $leads = DB::table('leads')->where('batchid', '=', $code)->get();
        Session::forget('code');
        return view("admin.leadupload", [
                'leads' => $leads,
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
         $agents = DB::table('users')->get();

         return view('admin.admindashboard', [
                'leads' => $leads,
                'agents' => $agents,
            ]);
        }
       

       
   }

   public function leadsummary(){
    $leads = DB::table('leads')->get();
        if($leads){  
 
         return view('admin.leadsummary', [
             'leads' => $leads,
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

        return redirect('adminlogin');
    }
}
  
}