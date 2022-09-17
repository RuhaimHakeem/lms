<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Carbon\Carbon;
use App\Models\Lead;
use App\Models\Status;
use Session;
use DB;

class LeadsImport implements ToCollection, WithHeadingRow, WithValidation
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        $now = Carbon::now();
        $unique_code = $now->format('YmdHis');

     
            foreach($rows as $row){

                     $data=[
                        'batchid'=> $unique_code,
                        'name'=>$row['name'],
                        'phonenumber'=>$row['phonenumber'],
                        'email'=>$row['email'],   
                    ];
                   $res = Lead::create($data);
           }          
      
        if($res){
            $leads = DB::table('leads')->where('batchid', $unique_code)->get();

            foreach($leads as $lead) {
                
                $status = new Status; 
                $status->status = "Unassigned";
                $status->leadid = $lead->id;
        
                $status->save();
            } 
             Session::put('code', $unique_code);
        }
    }

    public function rules(): array
    {
        
        return[
            'name'=>'required',
            'phonenumber'=>'required',
            'email'=>'required',
        ];
    }
}