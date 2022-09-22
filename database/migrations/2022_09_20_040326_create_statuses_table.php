<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('statuses', function (Blueprint $table) {
                $table->id();
                $table->string('status')->nullable();
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
        Schema::dropIfExists('statuses');
    }
}