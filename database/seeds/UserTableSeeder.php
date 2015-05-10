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
            'username' => 'Citrex',
            'lastname' => 'Mangin',
            'firstname' => 'Alexandre',
            'email' => 'alexandre.mangin@viacesi.fr',
            'password' => bcrypt('123123'),
            'phone' => '0616391876',
        ]);

        $faker = Faker::create();
        foreach (range(1, 100) as $index) {
            User::create([
                'username' => $faker->userName,
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'email' => $faker->email,
                'password' => bcrypt('123123'),
                'phone' => $faker->phoneNumber,
            ]);
        }
    }

}
