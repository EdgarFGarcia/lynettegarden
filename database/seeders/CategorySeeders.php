<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CategorySeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('category')->truncate();
        DB::table('category')->insert([
            'name'          => "Wedding Themes",
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('category')->insert([
            'name'          => "Birthday Party Themes",
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('category')->insert([
            'name'          => "Garden Party",
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('category')->insert([
            'name'          => "Social Gathering",
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
