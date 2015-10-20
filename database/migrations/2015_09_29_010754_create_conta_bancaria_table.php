<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContaBancariaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conta_bancaria', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_banco',20);
            $table->string('agencia',11)->nullable();
            $table->string('num_conta',11)-> nullable();
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
        Schema::drop('conta_bancaria');
    }
}
