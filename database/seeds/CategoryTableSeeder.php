<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    public function run() {
        DB::table('categories')->truncate();

        factory('CodeCommerce\Category', 15)->create();

        /* #### EXEMPLO USANDO FAKER ####

        $faker = Faker::create();

        foreach(range(1, 15) as $i) {
            Category::create(['name'=>$faker->word(), 'description'=>$faker->sentence()]);
        }
        */
    }

}