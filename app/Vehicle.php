<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    //
    protected $fillable = [
        'name', 'year', 'cmc', 'horsepower', 'fuel'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function operation(){
        return $this->hasMany('App\Operation');
    }
}
