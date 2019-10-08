<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

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

     /**
     * Get reviews for one company
     *
     * @param  \App\Company $companyId
     * @return \Illuminate\Http\Response
     */
    public static function getReviews($companyId) {

        $review = DB::table('reviews')
                        ->where('company_id', $companyId)
                        ->select(   'reviews.id as review_id',
                                    'reviews.title',
                                    'reviews.rating',
                                    'reviews.role',
                                    'reviews.type',
                                    'reviews.details',
                                    'users.first_name',
                                    'users.last_name')
                        ->leftJoin('users', 'reviews.user_id', '=', 'users.id')
                        ->orderBy('reviews.created_at', 'desc')
                        ->paginate(6);
        
        // $review = Review::where('company_id', $companyId)
        //     ->leftJoin('users', 'reviews.user_id', '=', 'users.id')
        //     ->orderBy('reviews.created_at', 'desc')
        //     ->paginate(10);

        return $review;
    }
}