<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemAds;

class ItemAdsController extends Controller
{

    /**
     * Create a new auth instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get all data from item_ads
     */
    public function index(Request $request)
    {
      $item_ads = ItemAds::where('published', true)->get();
      if (count($item_ads) !== 0) {
          $res['success'] = true;
          $res['result'] = $item_ads;

          return response($res);
      }else{
          $res['success'] = true;
          $res['result'] = 'No ads have been published!';

          return response($res);
      }

    }

    /**
     * Insert database for ItemAds
     * Url : /item_ads
     */
    public function create(Request $request)
    {
      $item_ads = new ItemAds;
      $item_ads->fill([
        'user_id' => $request->input('user_id'),
        'category_id' => $request->input('category_id'),
        'title' => $request->input('title'),
        'price' => $request->input('price'),
        'description' => $request->input('description'),
        'picture' => $request->input('picture'),
        'no_hp' => $request->input('no_hp'),
        'city' => $request->input('city'),
        'sold' => false,
        'published'=> true
      ]);
      if($item_ads->save()){
        $res['success'] = true;
        $res['result'] = 'Success add new item_ads!';

        return response($res);
      }
    }

    /**
     * Get one data ItemAds by id
     * Url : /item_ads/{id}
     */
    public function read(Request $request, $id)
    {
      $item_ads = ItemAds::where('id',$id)->first();
      if ($item_ads !== null) {
        $res['success'] = true;
        $res['result'] = $item_ads;

        return response($res);
      }else{
        $res['success'] = false;
        $res['result'] = 'Category not found!';

        return response($res);
      }
    }

    /**
     * Update data ItemAds by ud
     * Url : /item_ads/udpate/{id}
     */
    public function update(Request $request, $id)
    {
      if ($request->has('name')) {
          $item_ads = ItemAds::find($id);
          $item_ads->name = $request->input('name');
          if ($item_ads->save()) {
              $res['success'] = true;
              $res['result'] = 'Success update '.$request->input('name');

              return response($res);
          }
      }else{
        $res['success'] = false;
        $res['result'] = 'Please fill name item_ads!';

        return response($res);
      }
    }

    /**
     * Delete data ItemAds by id
     */
    public function delete(Request $request, $id)
    {
      $item_ads = ItemAds::find($id);
      if ($item_ads->delete($id)) {
          $res['success'] = true;
          $res['result'] = 'Success delete item_ads!';

          return response($res);
      }
    }

}
