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

        $faker = Faker::create();

        UserProfile::create([
            'lastname' => 'Mangin',
            'firstname' => 'Alexandre',
            'phone' => '0616391876',
            'image_min' => $faker->imageUrl(400, 400),
            'user_id' => 1,
        ]);


        foreach (range(1, 20) as $index) {
            UserProfile::create([
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'phone' => $faker->phoneNumber,
                'image_min' => $faker->imageUrl(400, 400),
                'user_id' => $index + 1,
            ]);
        }
    }

}
