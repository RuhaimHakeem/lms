<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = ['name','batchid', 'email', 'phonenumber'];   

    public function transactionDetails() {
        return $this->hasOne(TransactionDetail::class, 'leadid', 'id');
    }
}