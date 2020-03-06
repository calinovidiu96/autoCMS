<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    //
    protected $fillable = [
       'vehicle_id', 'user_id', 'vehicle_name', 'operation_name', 'schedule_date'
    ];


    public function vehicle()
    {
        return $this->belongsTo('App\Vehicle');
    }
}
