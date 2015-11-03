<?php

use Illuminate\Database\Seeder;

class InvestidorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('investidors')->truncate();

        DB::table('investidors')->insert([
            'nome' => 'Daniel',
            'email' => 'daniel@gmail.com',
            'password' => '1234',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('investidors')->insert([
            'nome' => 'Rocha',
            'email' => 'rocha@gmail.com',
            'password' => '1234',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('investidors')->insert([
            'nome' => 'Evander',
            'email' => 'evander@gmail.com',
            'password' => '1234',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
