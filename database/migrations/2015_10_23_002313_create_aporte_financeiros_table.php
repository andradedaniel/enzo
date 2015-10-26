<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAporteFinanceirosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * @todo criar campo para cópia de comprovante
     * @todo criar vinculo com conta bancaria????
     */
    public function up()
    {
        Schema::create('aporte_financeiros', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('valor',8,2);
            $table->text('observacao',8,2)->nullable();
            //data do deposito
            $table->integer('investidor_id')->unsigned();
            $table->foreign('investidor_id')->references('id')->on('investidors');
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
        Schema::drop('aporte_financeiros');
    }
}
