<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Lead;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\LeadsImport;

class AdminController extends Controller
{
    public function leadupload(){
        return view("admin.leadupload");
    }

    public function upload(Request $request){

        $file = $request->file;
           
    
        Excel::import(new LeadsImport, $file);
        echo "Inserted Successfully";

    }
  
}