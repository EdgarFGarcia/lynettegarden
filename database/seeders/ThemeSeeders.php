<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ThemeSeeders extends Seeder
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
        // garden party themes
        DB::table('themes')->insert([
            'name'          => 'Light Up Theme',
            'category_id'   => 3,
            'min_pax'       => 15,
            'max_pax'       => 80,
            'description'   => '',
            'price'         => 57000.00,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('themes')->insert([
            'name'          => 'Makeshift Theme',
            'category_id'   => 3,
            'min_pax'       => 15,
            'max_pax'       => 80,
            'description'   => '',
            'price'         => 55000.00,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('themes')->insert([
            'name'          => 'Warm Welcome Theme',
            'category_id'   => 3,
            'min_pax'       => 15,
            'max_pax'       => 80,
            'description'   => '',
            'price'         => 60000.00,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);
        // end garden party themes

        // social gathering
        DB::table('themes')->insert([
            'name'          => 'Disco Inferno Theme',
            'image_url'     => 'assets/img/lynette/SOCIAL_GATHERING0.jpg',
            'category_id'   => 4,
            'min_pax'       => 15,
            'max_pax'       => 60,
            'description'   => '',
            'price'         => 57000.00,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);
        DB::table('themes')->insert([
            'name'          => 'Urban Graffiti Theme',
            'image_url'     => 'assets/img/lynette/SOCIAL_GATHERING1.jpg',
            'category_id'   => 4,
            'min_pax'       => 15,
            'max_pax'       => 60,
            'description'   => '',
            'price'         => 55000.00,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);
        DB::table('themes')->insert([
            'name'          => 'Black & White Theme',
            'image_url'     => 'assets/img/lynette/SOCIAL_GATHERING2.jpg',
            'category_id'   => 4,
            'min_pax'       => 15,
            'max_pax'       => 60,
            'description'   => '',
            'price'         => 60000.00,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);
        // end social gathering
        // birthday themes
        DB::table('themes')->insert([
            'name'          => 'Princess Celebration Theme',
            'category_id'   => 2,
            'min_pax'       => 15,
            'max_pax'       => 50,
            'description'   => '',
            'price'         => 27000.00,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);
        DB::table('themes')->insert([
            'name'          => 'Hello Kitty Theme',
            'category_id'   => 2,
            'min_pax'       => 15,
            'max_pax'       => 50,
            'description'   => '',
            'price'         => 36000.00,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);
        DB::table('themes')->insert([
            'name'          => 'Aladdin Theme',
            'category_id'   => 2,
            'min_pax'       => 15,
            'max_pax'       => 50,
            'description'   => '',
            'price'         => 36000.00,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);
        DB::table('themes')->insert([
            'name'          => 'Tea Party Theme',
            'category_id'   => 2,
            'min_pax'       => 15,
            'max_pax'       => 50,
            'description'   => '',
            'price'         => 32000.00,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);
        DB::table('themes')->insert([
            'name'          => 'Modern Outdoor Theme',
            'category_id'   => 2,
            'min_pax'       => 15,
            'max_pax'       => 50,
            'description'   => '',
            'price'         => 36000.00,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);
        DB::table('themes')->insert([
            'name'          => 'Country Theme',
            'category_id'   => 2,
            'min_pax'       => 15,
            'max_pax'       => 50,
            'description'   => '',
            'price'         => 35000.00,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);
        // end birthday themes
        // wedding themes
        DB::table('themes')->insert([
            'name'          => 'Whimsical Theme',
            'category_id'   => 1,
            'min_pax'       => 15,
            'max_pax'       => 80,
            'description'   => 'For the whimsical couple, your wedding will be one full of bright splashes of color and quirky, bohemian components. Incorporate design elements like multicolored balloons, streamers, punchy floral arrangements, and mismatched chairs.',
            'price'         => 105000.00,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);
        DB::table('themes')->insert([
            'name'          => 'Modern Theme',
            'category_id'   => 1,
            'min_pax'       => 15,
            'max_pax'       => 80,
            'description'   => 'For a modern wedding, think clean lines, geometric shapes, and minimal design. A modern theme knows few bounds, so channel it however you see fit. Put a modern spin on anything, from your wedding dress to your venue decorations, like sleek seats, a cool structural backdrop. We also asked top wedding planners for their trend predictions, so stay up to date with their ideas, like greenery and cream balloons.',
            'price'         => 117000.00,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);
        DB::table('themes')->insert([
            'name'          => 'Eco-Natural Theme',
            'category_id'   => 1,
            'min_pax'       => 15,
            'max_pax'       => 80,
            'description'   => "Just because you want to be mindful of the environment (as we all should be) at your wedding, doesn't mean you have to skimp out on the little things. You can use biodegradable confetti as an alternative to rice for your grand exit, plants instead of flowers as table décor, and invitations printed on recycled paper. If the weather allows, choose an outdoor venue to cut back on energy from lighting.",
            'price'         => 95000.00,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);
        // end wedding themes
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
