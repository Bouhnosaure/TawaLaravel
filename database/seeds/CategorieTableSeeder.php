<?php

use App\Category;
use Faker\Factory as Faker;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->delete();

        $faker = Faker::create();

        Category::create(['name' => 'Conférences']);
        Category::create(['name' => 'Spectacles']);
        Category::create(['name' => 'Sports']);
        Category::create(['name' => 'Festivals']);
        Category::create(['name' => 'Concerts']);
        Category::create(['name' => 'Salons']);
        Category::create(['name' => 'Soirées']);
        Category::create(['name' => 'Sorties']);
        Category::create(['name' => 'Divers']);
        Category::create(['name' => 'Expositions']);
        Category::create(['name' => 'Cinéma']);
        Category::create(['name' => "Sports d'hiver"]);


    }
}