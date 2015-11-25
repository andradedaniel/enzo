<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identificacao',25);
            $table->string('endereco',100)->nullable();
            $table->date('data_inicio')->nullable();
            $table->date('data_previsao_fim')->nullable();
            $table->decimal('valor_alvo_venda',9,2)->nullable();
            $table->decimal('valor_venda',9,2)->nullable(); //temporaria
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
        Schema::drop('obras');
    }
}
