<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\TvShow;
use App\CategoryMovie;
use DB;

/**
 * Created by ocittwo
 *
 * Tv Show Controller
 */
class TvShowController extends Controller{

	/**
	 * List tv show
	 *
	 * URL /movie/tv_show
	 */
	public function index(Request $request)
	{
		$movie = Movie::where('type', 1)->take(10)->get();
		if (!$movie) {
			$res['success'] = false;
			$res['message'] = 'Tv Show is empty!';
			
			return response($res);
		}

		$res['success'] = true;
		$res['message'] = $movie;
		
		return response($res);
	}

	/**
	 * Display tv show by id movie
	 *
	 * URL /movie/tv_show/{id_movie}
	 */
	public function tvshow_movie_id(Request $request, $id_movie)
	{
		$model = TVShow::where('movie_id', $id_movie)->get();

		$res['success'] = true;
		$res['message'] = $model;
		
		return response($res);
	}

	/**
	 * Show movie by id tvshow
	 *
	 * URL /movie/tv_show/show{id}
	 */
	public function tvshow_id(Request $request, $id)
	{
		$model = TVShow::where('id', $id)->first();
		if (!$model) {
			$res['success'] = False;
			$res['message'] = 'Failed, tv show not found!';
			
			return response($res);
		}

		$res['success'] = true;
		$res['message'] = $model;
		
		return response($res);
	}

}