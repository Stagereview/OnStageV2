<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public $table = 'reviews';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}