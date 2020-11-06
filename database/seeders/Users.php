<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'first_name'    => "Owner",
            'last_name'     => "Owner",
            'email'         => "owner@gmail.com",
            'password'      => bcrypt('password'),
            'positions_id'  => 1,
            'created_at'    => date("Y-m-d H:i:s")
        ]);
    }
}
