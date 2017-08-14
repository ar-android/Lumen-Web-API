<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CategoryAdsSeeder extends Seeder {

    public function run()
    {
        DB::table('category_ads')->delete();
        $faker = Faker\Factory::create();

        for ($i=0; $i < 6; $i++) { 
	        $category = app()->make('App\CategoryAds');
	        $category->fill(['name' => $faker->text]);
	        $category->save();
        }
    }

}
