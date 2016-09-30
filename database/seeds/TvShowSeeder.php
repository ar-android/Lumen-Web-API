<?php 

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TvShowSeeder extends Seeder{

    public function run()
    {
        DB::table('tv_show')->delete();
        $created_at = date('Y:m:d H:i:s');
		DB::table('tv_show')->insert([
			'title' => 'Marvel\'s Agents of S.H.I.E.L.D.',
        	'poster' => 'https://walter.trakt.tv/images/shows/000/001/394/posters/thumb/c4a4211e12.jpg',
        	'picture' => 'https://walter.trakt.tv/images/shows/000/001/394/fanarts/original/2cc61c8eea.jpg',
        	'description' => 'The missions of the Strategic Homeland Intervention Enforcement and Logistics Division.',
			'url_stream' => 'https://redirector.googlevideo.com/videoplayback?requiressl=yes&mv=m&ms=nxu&expire=1475272778&app=texmex&mt=1475258040&id=990d4936e32d6894&source=webdrive&sparams=requiressl%2Cid%2Citag%2Csource%2Cttl%2Cip%2Cipbits%2Cexpire&ipbits=32&mn=sn-4g57knre&ip=2a01%3A4f8%3A160%3A11eb%3A3ba8%3Ab00b%3A16e%3Ab132&nh=IgpwcjAyLmZyYTE2KgkxMjcuMC4wLjE&key=ck2&signature=4341D989A691309F9177398411904EA2C18308DE.40F1C09D9A3FB59180F569EE4B87025578E8E8F0&pl=29&itag=22&ttl=transient&mm=30&filename=video.mp4",label:"720p",type: "video/mp4"},{file: "https://redirector.googlevideo.com/videoplayback?ipbits=32&mv=m&mm=30&nh=IgpwcjAyLmZyYTE2KgkxMjcuMC4wLjE&pl=29&mn=sn-4g57knre&itag=59&ttl=transient&signature=5FC0DC58A6BB18CF83B9EAAE34D7FEFA004D51D5.50DFED4941B2EBB48DC975A42084CE20DEF29205&ip=2a01%3A4f8%3A160%3A11eb%3A3ba8%3Ab00b%3A16e%3Ab132&source=webdrive&sparams=requiressl%2Cid%2Citag%2Csource%2Cttl%2Cip%2Cipbits%2Cexpire&key=ck2&mt=1475258040&app=texmex&requiressl=yes&ms=nxu&id=990d4936e32d6894&expire=1475272778&filename=video.mp4',
			'movie_id' => 1,
			'category_id' => 1,
			'episode' => 1,
			'season' => 1,
			'total_episode' => 23,
			'total_season' => 4,
			'total_views' => 1,
			'created_at' => $created_at , 
			'updated_at' => $created_at
			]);
    }
}