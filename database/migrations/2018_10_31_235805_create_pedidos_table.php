<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userId');
            $table->timestamps();
            $table->string('nombrePersona');
            $table->string('telefono');
            $table->text('descripcion');
            $table->date('fechaEntrega');
            $table->string('estado')->default('nuevo');
            $table->integer('precio');
            $table->integer('costo')->default('0');
            $table->integer('ganancia')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
