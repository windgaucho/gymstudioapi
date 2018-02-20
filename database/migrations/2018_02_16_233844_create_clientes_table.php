<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('apellido', 50);
            $table->string('nombre', 50);
            $table->string('dni', 9);
            $table->date('fecha_nacimiento');
            $table->string('telefono', 50);
            $table->string('direccion');
            $table->string('email', 100);
            $table->string('observaciones');
            $table->date('vencimiento');
            $table->date('ultimo_acceso');
            $table->date('vencimiento_certificado');
            $table->boolean('cerificado');
            $table->decimal('saldo', 10, 2);
            $table->integer('enroll_number');
            $table->softDeletes();
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
        Schema::dropIfExists('clientes');
    }
}
