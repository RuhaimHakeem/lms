<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public $now;

    
    /**
     * Run the migrations.
     *
     * @return void
     */
   
    public function up()
    {

        
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('dob');
            $table->string('gender');
            $table->string('phonenumber');
            $table->string('password');
            $table->string('email');    
            $table->timestamps();
            $table->boolean('verified')->default(false);
            $table->integer('verification_code')->nullable();
            $table->boolean('admin')->default(0);
         
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}