<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObrasOutrasDespesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obras_outras_despesas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('obra_id')->unsigned();
            $table->foreign('obra_id')->references('id')->on('obras');
            $table->integer('obra_tipo_outras_despesas_id')->unsigned();
            $table->foreign('obra_tipo_outras_despesas_id')->references('id')->on('obra_tipo_outras_despesas');
            $table->string('descricao',255)->nullable();
            $table->decimal('valor',8,2);
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
        Schema::drop('obras_outras_despesas');
    }
}
