<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Carbon\Carbon;
use App\Models\Lead;

class LeadsImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $now = Carbon::now();
        $unique_code = $now->format('YmdHis');
                
        foreach($collection as $key=>$value){

           
            
            if($key > 0){

                $lead = new Lead();
                $lead->batchid = $unique_code; 
                $lead->name = $value[0];
                $lead->email = $value[1];
                $lead->phonenumber = $value[2];
                $lead->save();
            
                // if(!$res) {
                //     return redirect('/admindashboard');
                // }

                // else {
                //     print("all good");
                // }
            }
        }
    }
}