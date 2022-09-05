<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Lead;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\LeadsImport;
use Illuminate\Support\Facades\DB;
use Session;

class AdminController extends Controller
{
 
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

        $leads = DB::table('leads')->get();

        return view('admin.admindashboard', [
            'leads' => $leads,
        ]);
   }
  
}