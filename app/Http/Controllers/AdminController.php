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
            return view('admin.viewleads', [
                'leads' => $leads,
            ]);
       
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
        }
        return view('admin.admindashboard', [
            'leads' => $leads,
        ]);

       
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