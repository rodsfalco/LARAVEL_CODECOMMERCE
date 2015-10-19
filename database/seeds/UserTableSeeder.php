<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run() {
        DB::table('users')->truncate();

        User::create([
            'name'=>'Rodrigo',
            'email'=>'rods.falco@gmail.com',
            'password'=>Hash::make(123456)
        ]);

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