<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use App\UserProfile;
use Auth;
use Storage;

class UserController extends Controller
{

    /**
     * Register new user
     *
     * @param $request Request
     */
    public function register(Request $request)
    {
        $hasher = app()->make('hash');

        $username = $request->input('username');
        $email = $request->input('email');
        $password = $hasher->make($request->input('password'));

        $register = User::create([
            'username'=> $username,
            'email'=> $email,
            'password'=> $password,
        ]);

        if ($register) {
            $res['success'] = true;
            $res['message'] = 'Success register!';

            return response($res);
        }else{
            $res['success'] = false;
            $res['message'] = 'Failed to register!';

            return response($res);
        }
    }

    /**
     * Get user by id
     *
     * URL /user/{id}
     */
    public function get_user(Request $request, $id)
    {
        $user = User::where('id', $id)->get();
        if ($user) {
              $res['success'] = true;
              $res['get_user'] = $user;

              return response($res);
        }else{
          $res['success'] = false;
          $res['message'] = 'Cannot find user!';

          return response($res);
        }
    }

    public function update(Request $request)
    {
      $this->validate($request, [
          'avatar' => 'required|image',
          'first_name' => 'required|string',
          'last_name' => 'required|string'
      ]);

      $avatar = Str::random(34);
      $request->file('avatar')->move(storage_path('avatar'), $avatar);

      $user_profile = UserProfile::where('user_id', Auth::user()->id)->first();
      if ($user_profile) {
        $current_avatar_path = storage_path('avatar') . '/' . $user_profile->avatar;
        if (file_exists($current_avatar_path)) {
          unlink($current_avatar_path);
        }

        $user_profile->avatar = $avatar;
        $user_profile->first_name = $request->first_name;
        $user_profile->last_name = $request->last_name;
        $user_profile->save();

      }else{
        $user_profile = new UserProfile;
        $user_profile->user_id = Auth::user()->id;
        $user_profile->avatar = $avatar;
        $user_profile->first_name = $request->first_name;
        $user_profile->last_name = $request->last_name;
        $user_profile->save();
      }

      $res['success'] = true;
      $res['message'] = "Success update user profile.";
      $res['data'] = $user_profile;
      
      return $res;
    }

    public function get_avatar($name)
    {
        $avatar_path = storage_path('avatar') . '/' . $name;

        if (file_exists($avatar_path)) {
          $file = file_get_contents($avatar_path);
          return response($file, 200)->header('Content-Type', 'image/jpeg');
        }

        $res['success'] = false;
        $res['message'] = "Avatar not found";
        
        return $res;
    }
}
