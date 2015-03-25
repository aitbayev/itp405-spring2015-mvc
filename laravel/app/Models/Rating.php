<?php namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Rating extends Model{

    public function dvd() {
        return $this->hasMany('App\Models\Dvd');
    }
}