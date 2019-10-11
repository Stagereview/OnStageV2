<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public $table = "company";

    public function review()
    {
        return $this->hasMany('App\Review');
    }

    public function contacts()
    {
        return $this->hasMany('App\Contact');
    }
}
