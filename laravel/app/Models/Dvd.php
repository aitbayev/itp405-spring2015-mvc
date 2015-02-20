<?php namespace App\Models;
use DB;

class Dvd {

    public function search($title, $genre, $rating){

         $query =  DB::table('dvds')
            ->join('genres', 'genres.id', '=', 'dvds.genre_id')
            ->join('ratings', 'ratings.id', '=', 'dvds.rating_id')
            ->join('labels', 'labels.id', '=', 'dvds.label_id')
            ->join('sounds', 'sounds.id', '=', 'dvds.sound_id')
            ->join('formats', 'formats.id', '=', 'dvds.format_id');


        if($title){
            $query->where('title', 'like', '%' . $title .'%');
        }

        if($genre != "All" && $genre){
            $query->where('genre_name', '=', $genre);
        }

        if($rating != "All" && $rating){
            $query->where('rating_name', '=', $rating);
        }

            return $query->get();

    }

    public function getGenres(){
        $query = DB::table('genres');
        return $query->get();
    }

    public function getRatings(){
        $query = DB::table('ratings');
        return $query->get();
    }
}