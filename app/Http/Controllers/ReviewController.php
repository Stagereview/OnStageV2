<?php

namespace App\Http\Controllers;

use Auth;
use App\Company;
use App\User;
use App\Review;
use Illuminate\Http\Request;
use App\Http\Requests\CreateReviewRequest;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $companyid = $request->id;
        $companies = Company::where('id', $companyid)->first();  
        return view('review.create', ['companyid' => $companyid, 'crum' => 'new-review', 'crum2' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $review = new Review;

        $review->user_id = Auth::id();
        $review->company_id = request('company_id');
        $review->title = request('title');
        $review->rating = request('rating');
        $review->role = request('role');
        $review->type = request('type');
        $review->start_date =  request('start_date');
        $review->end_date = request('end_date');
        $review->details = request('details');
    
        $review->save();

        return redirect()->action('ReviewController@show', $review->id)->with('success', 'Uw review is succesvol toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        $review = Review::getReview($review->id);
        $companies = Company::where('id', $review[0]->company_id)->first();
        
        return view('review.show', ['reviews' => $review, 'crum' => 'review', 'crum2' => $companies]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        return redirect('/');
    }
    
}
