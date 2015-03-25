<?php namespace App\Services;
use Illuminate\Support\Facades\Cache;

class RottenTomatoes {

    public static function search($dvd_title){

        $dvd_title = strtolower($dvd_title);
        $string = urlencode($dvd_title);

        if (Cache::has('RT-'.$string)){
            $jsonString = Cache::get('RT-'.$string);
        }
        else{
            $url = 'http://api.rottentomatoes.com/api/public/v1.0/movies.json?page=1&apikey=33zc2f53dch292nws4wr9guy&q=';
            $url .= $string;
            $jsonString = file_get_contents($url);
            Cache::put('RT-'.$string, $jsonString, 60);
        }

        $rottenTomatoesData = json_decode($jsonString);
        $movies = $rottenTomatoesData->movies;

        foreach($movies as $movie){

            $title = strtolower($movie->title);
            if ($title == $dvd_title){
                return $movie;
            }
        }
        return false;
    }

}