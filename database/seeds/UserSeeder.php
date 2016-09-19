<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        $item = app()->make('App\User');
        $hasher = app()->make('hash');
        $password = $hasher->make('password');
        $api_token = sha1(time());
        $item->fill([
          'username'=>'Ahmad Rosid',
          'email'=>'ocittwo@gmail.com',
          'password'=>$password,
          'api_token'=>$api_token
        ]);
        $item->save();
    }

}
