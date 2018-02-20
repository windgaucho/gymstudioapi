<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRubrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rubros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion', 50);
            $table->string('tipo', 10);
            $table->string('grupo', 10);
            $table->softDeletes();
            // Agrega created_at y updated_at
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
        Schema::dropIfExists('rubros');
    }
}
