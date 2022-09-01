<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Lead;

class AdminController extends Controller
{
    public function leadupload(){
        return view("admin.leadupload");
    }

    public function upload(Request $request){

        $now = Carbon::now();
        $unique_code = $now->format('YmdHis');

        $lead = new Lead();
        $lead->batchid = $unique_code; 
        $lead->name = $request->name;
        $lead->email = 'ruhaim860@gmail.com';
        $lead->phonenumber = '123';
        $res = $lead->save();
    
        
        
        if(!$res) {
            return redirect('/admindashboard');
        }

        else {
            print("all good");
        }

    }
  
}