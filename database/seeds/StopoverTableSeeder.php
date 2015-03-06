<?php

use App\Carpooling;
use App\Stopover;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon as Carbon;

class StopoverTableSeeder extends Seeder
{

    /**
     * Run the events seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stopovers')->delete();

        $faker = Faker::create();

        foreach (range(1, 80) as $index) {
            Stopover::create([
                'location' => $faker->city . ' ' . $faker->streetAddress,
                'carpooling_order' => $faker->numberBetween(1, 5),
                'carpooling_id' => $faker->numberBetween(1, 10),
            ]);

        }
    }

}


