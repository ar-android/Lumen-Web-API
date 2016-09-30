<?php

namespace App;

use Illuminate\Database\Eloquent\Model; 

class CategoryMovie extends Model{

  /**
   * Table database
   */
  protected $table = 'category_movies';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
  		'name'
  ];


  protected $hidden = [
      'created_at', 'updated_at'
  ];
}