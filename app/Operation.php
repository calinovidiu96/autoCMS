<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    //
    protected $fillable = [
        'name', 'vehicle_id', 'parts', 'price'
    ];

    public function vehicle()
    {
        return $this->belongsTo('App\Vehicle');
    }
}
