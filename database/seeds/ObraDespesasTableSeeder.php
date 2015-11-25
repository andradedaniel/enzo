<?php

use Illuminate\Database\Seeder;

class ObraDespesasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('obra_despesas')->truncate();
        // obra 1 - não material
        DB::table('obra_despesas')->insert([
            'obra_tipo_despesa_id' => '1',
            'obra_id' => '1',
            'material_id' => '',
            'data' => '2014-05-10',
            'descricao' => 'Alvará de construção',
            'quantidade' => '1',
            'valor_unitario' => '500',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        // obra 1 - com material
        DB::table('obra_despesas')->insert([
            'obra_tipo_despesa_id' => '2',
            'obra_id' => '1',
            'material_id' => '1',
            'data' => '2014-06-10',
            'descricao' => 'Cimento CIPLAN',
            'quantidade' => '10',
            'valor_unitario' => '20',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
