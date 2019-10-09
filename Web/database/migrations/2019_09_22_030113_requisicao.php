<?php

use Carbon\Traits\Timestamp;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Requisicao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisicao',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->bigInteger('aluno_id')->unsigned();
            $table->foreign('aluno_id')->references('id')->on('users');
            $table->bigInteger('dispositivo_id')->unsigned();
            $table->foreign('dispositivo_id')->references('id')->on('dispositivo');
            $table->boolean('estado')->default(1);
            $table->timestamp('data')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requisicao');
    }
}
