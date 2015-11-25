<?php

use Illuminate\Database\Seeder;

class ObrasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('obras')->truncate();

        DB::table('obras')->insert([
            'identificacao' => 'PORTO NACIONAL',
            'endereco' => 'Rua X agosto pereira',
            'data_inicio' => '2015-04-15',
            'data_previsao_fim' => '2015-06-30',
            'valor_alvo_venda' => '190000.00',
            'valor_venda' => '170000.00',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('obras')->insert([
            'identificacao' => 'POLINESIA',
            'endereco' => 'Rua Y salmao correia',
            'data_inicio' => '2014-10-15',
            'data_previsao_fim' => '2015-06-30',
            'valor_alvo_venda' => '1000000.00',
            'valor_venda' => '800000.00',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

    }
}