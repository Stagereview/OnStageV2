<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Contact extends Model
{
    public $table = "contacts";

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public static function getContacts($company_id) {
        $contacts = Contact::where('company_id', '=', $company_id)->get();

        return $contacts;
    }
}
