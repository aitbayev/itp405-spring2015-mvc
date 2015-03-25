<?php namespace App\Http\Controllers;

use App\Services\RottenTomatoes;
use Illuminate\Http\Request;
use DB;
use App\Models\Dvd;
use App\Models\Genre;
use App\Models\Rating;
use App\Models\Label;
use App\Models\Format;
use App\Models\Sound;
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
        $rottenTomatoes = RottenTomatoes::search($dvds[0]->title);

            return view('details',
                ['dvd' => $dvds[0],
                    'id' => $id,
                    'reviews' => $reviews,
                    'rottentomato' => $rottenTomatoes
                ]);
    }

    public function addReview(Request $request){


        $validator = Dvd::validate($request->all());

        if ($validator->passes()) {
            Dvd::createReview([
                'title' => $request->input('title'),
                'rating' => $request->input('rating'),
                'description' => $request->input('description'),
                'dvd_id' => $request->input('dvd_id')
            ]);


            return redirect('/dvds/'.$request->input('dvd_id'))->with('success', 'Review successfully added.');
        }

        return redirect('/dvds/'.$request->input('dvd_id'))->withErrors($validator)->withInput();

    }


    public function createDvd(){
        $genres = Genre::All();
        $ratings = Rating::All();
        $labels = Label::All();
        $formats = Format::All();
        $sounds = Sound::All();

        return view('createDvd', [
            'genres' => $genres,
            'ratings' => $ratings,
            'labels' => $labels,
            'formats' => $formats,
            'sounds' => $sounds
        ]);

    }

    public function insertDvd(Request $request){
        $dvd = new Dvd();
        $dvd->title = $request->input('dvd_title');
        $dvd->genre_id = $request->input('genre');
        $dvd->label_id = $request->input('label');
        $dvd->format_id = $request->input('format');
        $dvd->rating_id = $request->input('rating');
        $dvd->sound_id = $request->input('sound');

        $dvd->save();

        return redirect('dvds/create')->with('success', 'Dvd successfully created');
    }


    public function dvdsWithGenre($genre_name){

        $dvds = Dvd::with('genre', 'rating', 'label')
            ->whereHas('genre', function($query) use ($genre_name){
                $query->where('genre_name', '=', $genre_name);
            })
            ->get();

//doesn't work for some genres
        return view('genredvds',[
            'dvds' => $dvds,
            'genre_name' => $genre_name
        ]);

    }
}