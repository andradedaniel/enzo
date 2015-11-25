<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObraDespesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obra_despesas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('obra_id')->unsigned();
            $table->foreign('obra_id')->references('id')->on('obras');
            $table->integer('obra_tipo_despesa_id')->unsigned();
            $table->foreign('obra_tipo_despesa_id')->references('id')->on('obra_tipo_despesas');
            $table->integer('material_id')->unsigned()->nullable();
            $table->foreign('material_id')->references('id')->on('materials');

            $table->date('data')->nullable();
            $table->string('descricao',255)->nullable();
            $table->decimal('quantidade',8,2)->nullable();
            $table->decimal('valor_unitario',8,2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('obra_despesas');
    }
}
