<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{

    /**
     * Run the users seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        User::create([
            'name' => 'Citrex',
            'email' => 'alexandre.mangin@viacesi.fr',
            'password' => bcrypt('123123')
        ]);

        $faker = Faker::create();
        foreach (range(1, 20) as $index) {
            User::create([
                'name' => $faker->userName,
                'email' => $faker->email,
                'password' => bcrypt('123123')
            ]);
        }
    }

}
