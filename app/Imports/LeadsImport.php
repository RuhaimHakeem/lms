<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Carbon\Carbon;
use App\Models\Lead;
use Session;

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

                    //  $lead = new Lead();
                    //  $lead->batchid = $unique_code; 
                    //  $lead->name = $value[0];
                    //  $lead->email = $value[1];
                    //  $lead->phonenumber = $value[2];
                    //  $res = $lead->save();

                     $data=[
                        'batchid'=> $unique_code,
                        'name'=>$row['name'],
                        'email'=>$row['email'],
                        'phonenumber'=>$row['phonenumber'],   
                    ];
                   $res = Lead::create($data);
           }          
      
        if($res){
             Session::put('code', $unique_code);
        }
    }

    public function rules(): array
    {
        
        return[
            'name'=>'required',
            'email'=>'required|unique:leads,email',
            'phonenumber'=>'required',
        ];
    }
}