<?php

$faker = Faker\Factory::create();

$factory('App\Event', [
    'name' => $faker->catchPhrase,
    'description' => $faker->text(200),
    'start_time' => $start_time = $faker->dateTimeBetween('now', '+30 days')->format('d/m/Y - H:i'),
    'end_time' => $faker->dateTimeBetween('+30 days', '+60 weeks')->format('d/m/Y - H:i'),
    'location' => $faker->city . ' ' . $faker->streetAddress,
    'lat' => $faker->latitude,
    'lng' => $faker->longitude,
    'image_min' => $faker->imageUrl(400, 400),
    'is_private' => $faker->boolean(),
    'is_valid' => $faker->boolean(),
    'user_id' => 1,
    'categorie_id' => $faker->numberBetween('1', '10')
]);