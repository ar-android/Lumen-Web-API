<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ItemAdsSeeder extends Seeder {

    public function run()
    {
        DB::table('item_ads')->delete();
        $faker = Faker\Factory::create();

        for ($i=0; $i < 100; $i++) { 
          $rand_int = rand(0,1);
          $item = app()->make('App\ItemAds');
          $item->user_id = rand(1, 100);
          $item->category_id = rand(1, 6);
          $item->title = 'Macbook Pro 14 in';
          $item->price = $faker->randomNumber(5);
          $item->description = $faker->text;
          $item->city = $faker->city;
          $item->sold = $rand_int;
          $item->published = $rand_int;
          $item->save();
        }

    }

}
