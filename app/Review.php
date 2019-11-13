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
                                    'reviews.contact_name',
                                    'reviews.details',
                                    'reviews.start_date',
                                    'reviews.end_date',
                                    'reviews.created_at',
                                    'users.first_name',
                                    'users.last_name')
                        ->leftJoin('users', 'reviews.user_id', '=', 'users.id')
                        ->orderBy('reviews.created_at', 'desc')
                        ->paginate(6);
                        
        return $review;
    }

     /**
     * Get review for one company
     *
     * @param  \App\Company $review
     * @return \Illuminate\Http\Response
     */
    public static function getReview($review_id) {

        $review = DB::table('reviews')
                        ->where('reviews.id', $review_id)
                        ->select(   'reviews.id as review_id',
                                    'reviews.user_id',
                                    'reviews.company_id',
                                    'reviews.title',
                                    'reviews.rating',
                                    'reviews.role',
                                    'reviews.type',
                                    'reviews.details',
                                    'reviews.start_date',
                                    'reviews.end_date',
                                    'reviews.contact_name',
                                    'reviews.contact_email',
                                    'reviews.contact_phonenumber',
                                    'users.first_name',
                                    'users.last_name')
                        ->leftJoin('users', 'reviews.user_id', '=', 'users.id')
                        ->orderBy('reviews.created_at', 'desc')
                        ->get();
                        
        return $review;
    }
}