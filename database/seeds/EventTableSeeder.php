<?php

use Illuminate\Database\Seeder;
use App\Event;
use Faker\Factory as Faker;
use Carbon\Carbon as Carbon;

class EventTableSeeder extends Seeder
{

    /**
     * Run the events seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->delete();

        $faker = Faker::create();

        foreach (range(1, 100) as $index) {
            Event::create([
                'name' => $faker->catchPhrase,
                'description' => $faker->text(200),
                'start_time' => $start_time = $faker->dateTimeBetween('now', '+30 days')->format('d/m/Y - H:i'),
                'end_time' => $faker->dateTimeBetween('+30 days', '+60 weeks')->format('d/m/Y - H:i'),
                'location' => $faker->city.' '.$faker->streetAddress,
                'lat' => $faker->latitude,
                'lng' => $faker->longitude,
                'image_min' => $faker->imageUrl(400, 400),
                'is_private' => $faker->boolean(),
                'is_valid' => $faker->boolean(),
                'user_id' => 1
            ]);


        }
    }

}
