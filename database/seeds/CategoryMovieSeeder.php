<?php 

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CategoryMovieSeeder extends Seeder{

    public function run()
    {
        DB::table('category_movies')->delete();
        $created_at = date('Y:m:d H:i:s');
		DB::table('category_movies')->insert(['name' => 'Movie', 'created_at' => $created_at , 'updated_at' => $created_at]);
		DB::table('category_movies')->insert(['name' => 'TV Show', 'created_at' => $created_at, 'updated_at' => $created_at]);
		DB::table('category_movies')->insert(['name' => 'Coming Soon' , 'created_at' => $created_at, 'updated_at' => $created_at]);
		DB::table('category_movies')->insert(['name' => 'Top Movie' , 'created_at' => $created_at, 'updated_at' => $created_at]);
		DB::table('category_movies')->insert(['name' => 'Editor Choise' , 'created_at' => $created_at, 'updated_at' => $created_at]);
    }
}