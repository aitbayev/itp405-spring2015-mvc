<?php namespace App\Models;
use DB;
use Validator;

class Dvd {

    public function search($title, $genre, $rating){

         $query =  DB::table('dvds')
             ->join('ratings', 'ratings.id', '=', 'dvds.rating_id')
             ->join('genres', 'genres.id', '=', 'dvds.genre_id')
             ->join('labels', 'labels.id', '=', 'dvds.label_id')
             ->join('sounds', 'sounds.id', '=', 'dvds.sound_id')
             ->join('formats', 'formats.id', '=', 'dvds.format_id')
             ->select('*', 'dvds.id');

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

    public function getDetails($id){
        $query = DB::table('dvds')
            ->join('ratings', 'ratings.id', '=', 'dvds.rating_id')
            ->join('genres', 'genres.id', '=', 'dvds.genre_id')
            ->join('labels', 'labels.id', '=', 'dvds.label_id')
            ->join('sounds', 'sounds.id', '=', 'dvds.sound_id')
            ->join('formats', 'formats.id', '=', 'dvds.format_id')
            ->where('dvds.id','=', $id);
        return $query->get();
    }

    public static function create($input)
    {
        DB::table('reviews')->insert($input);
    }

    public static function validate($input)
    {
        return Validator::make($input, [
            'title' => 'required|min:5',     //at least 5
            'rating' => 'required|integer|between:1,10', //1-10
            'description' => 'required|min:20', //at least 20
            'dvd_id' => 'required|integer'
        ]);
    }

    public static function getReviews($id){
        $query = DB::table('reviews')
            ->where('dvd_id', '=', $id);
        return $query->get();

    }

}