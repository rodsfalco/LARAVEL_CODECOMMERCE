<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run() {
        DB::table('users')->truncate();

        factory('CodeCommerce\User', 3)->create();

        /* #### EXEMPLO USANDO FAKER ####

        $faker = Faker::create();

        foreach(range(1, 10) as $i) {
            User::create([
                'name'=>$faker->name(),
                'email'=>$faker->email(),
                'password'=>Hash::make($faker->word())
            ]);
        }
        */
    }

}