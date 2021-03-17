<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('credit')->insert([
            'player_id' => 'Test1',
            'amount' => 200,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

        DB::table('credit')->insert([
            'player_id' => 'Test2',
            'amount' => 100,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
