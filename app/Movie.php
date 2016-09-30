<?php

namespace App;

use Illuminate\Database\Eloquent\Model; 

class Movie extends Model{

  /**
   * Table database
   */
  protected $table = 'movies';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
  	'title', 'picture', 'description', 'ratings', 'url_trailer', 'type'
  ];
}