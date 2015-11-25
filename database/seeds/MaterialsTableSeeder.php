<?php

use Illuminate\Database\Seeder;

class MaterialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materials')->truncate();

        DB::table('materials')->insert([
            'categoria' => 'Categoria Material 01',
            'descricao' => 'Cimento PORTINARI',
            'unidade_medida' => 'SC',
        ]);

        DB::table('materials')->insert([
            'categoria' => 'Categoria Material 02',
            'descricao' => 'Rejunte Rejuntabras Bege 1kg',
            'unidade_medida' => 'PT',
        ]);
    }
}
