<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id('id');
            $table->integer('user_id')->unsigned();
            $table->bigInteger('program_id')->unsigned();
            $table->boolean('completed')->default(0);  
            $table->tinyText('notes')->nullable(); 
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('usersauths')->onDelete('cascade');
            $table->foreign('program_id')->references('id')->on('program_models')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
}
