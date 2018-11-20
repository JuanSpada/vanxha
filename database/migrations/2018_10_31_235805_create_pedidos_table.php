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
            $table->integer('empresaId');
            $table->timestamps();
            $table->string('nombrePersona');
            $table->string('telefono');
            $table->text('descripcion');
            $table->date('fechaEntrega');
            $table->integer('estado')->default(1);
            $table->integer('precio');
            $table->integer('costo')->default(0);
            $table->integer('ganancia')->default(0);
            $table->string('foto')->default('fotoPedido.png');
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
