<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\CategoryMovie;
use DB;

/**
 * Created by ocittwo
 *
 * Movie Controller
 */
class MovieController extends Controller{

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
	 * Index general movie
	 *
	 * URL /movie
	 */
	public function index(Request $request)
	{

		$model = Movie::all();

		$res['success'] = true;
		$res['message'] = $model;
		
		return response($res);
	}

	/**
	 * Movie by category
	 * 
	 * URL movie/category/{category_name}
	 */
	public function movie_category(Request $request, $category_name)
	{
		$category = CategoryMovie::where('name', $category_name)->first();
		if (!$category) {
			$res['success'] = false;
			$res['message'] = 'Category not found!';
			
			return response($res);
		}
		
		$category_id = $category->id;
		$movie = Movie::where('category_id', $category_id)->get();
		if ($movie) {
			$res['success'] = true;
			$res['message'] = $movie;
			
			return response($res);
		}else{
			$res['success'] = false;
			$res['message'] = 'Failed search movie!';
			
			return response($res);
		}
	}

	/**
	 * Get list category
	 *
	 * URL /movie/category_list
	 */
	public function lis_category(Request $request)
	{
		$model = CategoryMovie::all();
		if (!$model) {
			$res['success'] = false;
			$res['message'] = 'Category empty!';
			
			return response($res);
		}

		$res['success'] = true;
		$res['message'] = $model;

		return response($res);
	}

}