<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Dvd;
use Validator;

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

    public function review($id){

        $query = new DVD();
        $dvds = $query->getDetails($id);
        $reviews = Dvd::getReviews($id);
            return view('details',
                ['dvd' => $dvds[0],
                    'id' => $id,
                    'reviews' => $reviews
                ]);
    }

    public function addReview(Request $request){


        $validator = Dvd::validate($request->all());

        if ($validator->passes()) {
            Dvd::create([
                'title' => $request->input('title'),
                'rating' => $request->input('rating'),
                'description' => $request->input('description'),
                'dvd_id' => $request->input('dvd_id')
            ]);


            return redirect('/dvds/'.$request->input('dvd_id'))->with('success', 'Review successfully added.');
        }

        return redirect('/dvds/'.$request->input('dvd_id'))->withErrors($validator)->withInput();

    }



}