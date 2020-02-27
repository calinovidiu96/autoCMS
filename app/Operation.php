<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    //
    protected $fillable = [
        'name', 'parts', 'price', 'date'
    ];

    public function vehicle()
    {
        return $this->belongsTo('App\Vehicle');
    }
}
