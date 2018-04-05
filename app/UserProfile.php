<?php

namespace App;

use Illuminate\Database\Eloquent\Model; 

class UserProfile extends Model{

  /**
   * Table database
   */
  protected $table = 'user_profiles';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
  	'user_id', 'avatar', 'first_name', 'last_name'
  ];
}