<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    //

    protected $fillable = [
        'id','name', 'model', 'year', 'cmc', 'horsepower', 'fuel'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function operations(){
        return $this->hasMany('App\Operation');
    }

    public function visits()
    {
        return $this->hasMany('App\Visit');
    }

}
