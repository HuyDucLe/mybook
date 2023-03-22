<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = \Faker\Factory::create();
        $limit = 25;

        for ($i = 0; $i < $limit; $i++){
            DB::table('categories')->insert([
                'category_name' => $fake->name
            ]);
        }
    }
}
