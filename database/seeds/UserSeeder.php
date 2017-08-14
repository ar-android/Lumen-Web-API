<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        $faker = Faker\Factory::create();
        $hasher = app()->make('hash');
        for ($i=0; $i < 100; $i++) { 
          $item = app()->make('App\User');
          $item->username = $faker->name;
          $item->email = $faker->email;
          $item->password = $hasher->make($faker->password);
          $item->api_token = sha1($faker->password);
          $item->save();
        }
        // $hasher = app()->make('hash');
        // $password = $hasher->make('password');
        // $api_token = sha1(time());
        // $item->fill([
        //   'username'=>'Ahmad Rosid',
        //   'email'=>'ocittwo@gmail.com',
        //   'password'=>$password,
        //   'api_token'=>$api_token
        // ]);
    }

}
