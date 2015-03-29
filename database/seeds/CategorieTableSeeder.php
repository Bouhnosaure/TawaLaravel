<?php

use App\Categorie;
use Faker\Factory as Faker;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->delete();

        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Categorie::create([
                'name' => $faker->name
            ]);

        }
    }
}
