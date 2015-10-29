<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestidorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investidors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',50);
            $table->string('email',100)->unique();
            $table->string('password', 60);
            $table->decimal('investimento_inicial',8,2);
            $table->string('foto_path')->nullable();
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
        Schema::drop('investidors');
    }
}
