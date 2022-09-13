<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaddetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaddetails', function (Blueprint $table) {
            $table->id();
            $table->string('position')->nullable();
            $table->string('phonenumber2')->nullable();
            $table->string('leadtype')->nullable();
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
        Schema::dropIfExists('leaddetails');
    }
}