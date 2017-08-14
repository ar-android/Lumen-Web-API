<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(UserSeeder::class);
        $this->call(CategoryAdsSeeder::class);
        $this->call(ItemAdsSeeder::class);

        // $this->call(CategoryMovieSeeder::class);
        // $this->call(MoviewSeeder::class);
        // $this->call(TvShowSeeder::class);
    }
}
