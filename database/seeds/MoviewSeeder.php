<?php 

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MoviewSeeder extends Seeder{

    public function run()
    {
        DB::table('movies')->delete();

        $model = app()->make('App\Movie');
        $model->fill([
        	'title' => 'Marvel\'s Agents of S.H.I.E.L.D.',
        	'poster' => 'https://walter.trakt.tv/images/shows/000/001/394/posters/thumb/c4a4211e12.jpg',
        	'picture' => 'https://walter.trakt.tv/images/shows/000/001/394/fanarts/original/2cc61c8eea.jpg',
        	'description' => 'The missions of the Strategic Homeland Intervention Enforcement and Logistics Division.',
        	'ratings' => 8,
        	'url_trailer' => 'http://youtube.com/watch?v=yY9ar4QJOsY',
            'category_id' => 1,
        	'type' => 1
        ]);
        $model->save();
    }
}