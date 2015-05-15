<?php

use App\UserProfile;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserProfileTableSeeder extends Seeder
{

    /**
     * Run the users seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_profiles')->delete();

        UserProfile::create([
            'lastname' => 'Mangin',
            'firstname' => 'Alexandre',
            'phone' => '0616391876',
            'user_id' => 1,
        ]);

        $faker = Faker::create();
        foreach (range(1, 20) as $index) {
            UserProfile::create([
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'phone' => $faker->phoneNumber,
                'user_id' => $index + 1,
            ]);
        }
    }

}
