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
            'player_id' => 'James',
            'room_id' => 'login',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

        DB::table('checkin')->insert([
            'player_id' => 'Ben',
            'room_id' => 'lobby',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

        DB::table('checkin')->insert([
            'player_id' => 'James',
            'room_id' => 'air hockey',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

        DB::table('checkin')->insert([
            'player_id' => 'James',
            'room_id' => 'air hockey',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

        DB::table('checkin')->insert([
            'player_id' => 'James',
            'room_id' => 'archery',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

        DB::table('checkin')->insert([
            'player_id' => 'James',
            'room_id' => 'basketball',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
