<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenciaTable extends Migration
{
    public function up()
    {
        Schema::create('asistencia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('asistio')->default(0)->nullable();
            $table->date('fecha')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
