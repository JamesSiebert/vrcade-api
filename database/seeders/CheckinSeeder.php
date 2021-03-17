<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CheckinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('checkin')->insert([
            'player_id' => 'James1',
            'room_id' => '1',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

        DB::table('checkin')->insert([
            'player_id' => 'James2',
            'room_id' => '2',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

        DB::table('checkin')->insert([
            'player_id' => 'James2',
            'room_id' => '3',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
