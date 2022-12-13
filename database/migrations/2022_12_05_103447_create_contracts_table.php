<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->dateTime('takeover_date');
            $table->dateTime('period');
            $table->unsignedBigInteger('credit_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('credit_id')->references('id')->on('credits');
            $table->foreign('user_id')->references('id')->on('users');
        
      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
};
