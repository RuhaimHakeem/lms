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

        // $now = Carbon::now();
        // $unique_code = $now->format('YmdHis');
        $code = Session::get('code');
        
        $leads = DB::table('leads')->where('batchid', '=', $code)->get();
        // session()->forget('code');
        Session::forget('code');
        return view("admin.leadupload", [
                'leads' => $leads,
            ]); 
            
           
     }

    public function upload(Request $request){

       $file = $request->file;
       $res = Excel::import(new LeadsImport, $file); 

       
        return redirect('admindashboard/leadupload'); 
    }
  
}