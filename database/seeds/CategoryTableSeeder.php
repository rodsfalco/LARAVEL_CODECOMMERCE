<?php

/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 21/09/2015
 * Time: 15:28
 */

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CategoryTableSeeder extends Seeder
{
    public function run() {
        DB::table('categories')->truncate();

        factory('CodeCommerce\Category', 10)->create();

        /* USANDO FAKER

        $faker = Faker::create();

        foreach(range(1, 15) as $i) {
            Category::create(['name'=>$faker->word(), 'description'=>$faker->sentence()]);
        }

        */
    }

}