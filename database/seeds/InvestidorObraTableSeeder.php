<?php

use Illuminate\Database\Seeder;

class InvestidorObraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('investidor_obra')->truncate();

        $idDaniel= DB::table('investidors')->where('nome', '=', 'Daniel')->select('id')->first();
        $idRocha=DB::table('investidors')->where('nome', '=', 'Rocha')->select('id')->first();
        $idEvander=DB::table('investidors')->where('nome', '=', 'Evander')->select('id')->first();

        DB::table('investidor_obra')->insert([
            'investidor_id' => $idDaniel->id,
            'obra_id' => 1,
            'percentual_lucro' => '40',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('investidor_obra')->insert([
            'investidor_id' => $idRocha->id,
            'obra_id' => 1,
            'percentual_lucro' => '20',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('investidor_obra')->insert([
            'investidor_id' => $idEvander->id,
            'obra_id' => 1,
            'percentual_lucro' => '40',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('investidor_obra')->insert([
            'investidor_id' => $idDaniel->id,
            'obra_id' => 2,
            'percentual_lucro' => '40',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

    }
}
