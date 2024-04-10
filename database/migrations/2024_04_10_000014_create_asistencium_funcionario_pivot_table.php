<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenciumFuncionarioPivotTable extends Migration
{
    public function up()
    {
        Schema::create('asistencium_funcionario', function (Blueprint $table) {
            $table->unsignedBigInteger('asistencium_id');
            $table->foreign('asistencium_id', 'asistencium_id_fk_9677824')->references('id')->on('asistencia')->onDelete('cascade');
            $table->unsignedBigInteger('funcionario_id');
            $table->foreign('funcionario_id', 'funcionario_id_fk_9677824')->references('id')->on('funcionarios')->onDelete('cascade');
        });
    }
}
