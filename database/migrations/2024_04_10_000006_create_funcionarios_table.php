<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionariosTable extends Migration
{
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('n_identificacion')->nullable();
            $table->string('nombre');
            $table->string('genero')->nullable();
            $table->date('f_nacimiento')->nullable();
            $table->integer('celular')->nullable();
            $table->string('direccion')->nullable();
            $table->string('cargo')->nullable();
            $table->string('sede')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
