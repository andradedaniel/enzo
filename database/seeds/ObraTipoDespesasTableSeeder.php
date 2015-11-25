<?php

use Illuminate\Database\Seeder;

class ObraTipoDespesasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('obra_tipo_despesas')->truncate();

        DB::table('obra_tipo_despesas')->insert([
            'descricao' => 'Imposto',
        ]);

        DB::table('obra_tipo_despesas')->insert([
            'descricao' => 'Material',
        ]);
    }
}
