<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('user_positions')->insert([
            'name'  => "Owner"
        ]);

        DB::table('user_positions')->insert([
            'name'  => "Manager"
        ]);
    }
}
