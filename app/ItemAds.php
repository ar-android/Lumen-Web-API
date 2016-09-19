<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Model item ads
 */
class ItemAds extends Model
{

  /**
   * Table database
   */
  protected $table = 'item_ads';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'user_id','category_id','title','price','description','picture','no_hp','city','sold','published',
  ];

  /**
   * One to one relationships
   */
  public function category()
  {
    return $this->hasOne('App\CategoryAds');
  }
}
