<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountrydetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countrydetails', function (Blueprint $table) {
            $table->id();
            $table->string('countryname')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->integer('countrycode')->nullable();
            $table->unsignedBigInteger('leadid')->nullable();
            $table->foreign('leadid')->references('id')->on('leads')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countrydetails');
    }
}