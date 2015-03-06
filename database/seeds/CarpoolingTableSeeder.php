<?php

use App\Carpooling;
use App\Stopover;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon as Carbon;

class CarpoolingTableSeeder extends Seeder
{

    /**
     * Run the events seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carpoolings')->delete();

        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Carpooling::create([
                'start_time' => $start_time = $faker->dateTimeBetween('now', '+30 days')->format('d/m/Y - H:i'),
                'description' => $faker->text(200),
                'seats' => $faker->numberBetween(1, 10),
                'price' => $faker->randomDigit(),
                'is_flexible' => $faker->boolean(),
                'is_luggage' => $faker->boolean(),
                'user_id' => 1,
                'event_id' => $faker->numberBetween(1, 20),
            ]);
        }
    }

}


