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
        Schema::create('credits', function (Blueprint $table) {
            $table->id();
            $table->integer('sum');
            $table->unsignedBigInteger('condition_id');
            $table->unsignedBigInteger('bank_id');

            $table->foreign('condition_id')->references('id')->on('conditions');
            $table->foreign('bank_id')->references('id')->on('banks');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credits');
    }
};
