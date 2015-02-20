<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Dvd;

class DvdsController extends Controller{

    public function search(){
        $query = new Dvd();
        $genres = $query->getGenres();
        $ratings = $query->getRatings();
        return view('search', [
            'genres' => $genres,
            'ratings' => $ratings
        ]);
    }

    public function results(Request $request){

        $query = new Dvd();

        $dvds = $query->search($request->input('dvd_title'), $request->input('genre'), $request->input('rating') );

        $genres = $query->getGenres();
        $ratings = $query->getRatings();

        return view('results',
            ['dvd_title' => $request->input('dvd_title'),
             'dvds' => $dvds,
                'genre' => $request->input('genre'),
                'rating'=> $request->input('rating')
            ]);
    }
}