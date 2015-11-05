<?php

use Illuminate\Database\Seeder;

class AporteFinanceirosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('aporte_financeiros')->truncate();

        $idDaniel= DB::table('investidors')->where('nome', '=', 'Daniel')->select('id')->first();
        $idRocha=DB::table('investidors')->where('nome', '=', 'Rocha')->select('id')->first();
        $idEvander=DB::table('investidors')->where('nome', '=', 'Evander')->select('id')->first();
        DB::table('aporte_financeiros')->insert([
            'valor' => '44000',
            'data' => '2014-08-23',
            'comprovante_filename' => $idDaniel->id.'_44000_2014-08-23',
            'investidor_id' => $idDaniel->id,
            'observacao' => '',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('aporte_financeiros')->insert([
            'valor' => '10560',
            'data' => '2014-09-15',
            'comprovante_filename' => $idRocha->id.'_10560_2014-09-15',
            'investidor_id' => $idRocha->id,
            'observacao' => 'Pagamento de boleto cimento',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('aporte_financeiros')->insert([
            'valor' => '23500',
            'data' => '2014-11-15',
            'comprovante_filename' => $idDaniel->id.'_23500_2014-11-15',
            'investidor_id' => $idDaniel->id,
            'observacao' => '',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('aporte_financeiros')->insert([
            'valor' => '80550',
            'data' => '2014-07-01',
            'comprovante_filename' => $idEvander->id.'_80550_2014-07-01',
            'investidor_id' => $idEvander->id,
            'observacao' => 'Pagamento de boleto ceramica na conta XXXX',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
