<?php

namespace App\Http\Controllers;

use App\Company;
use App\Review;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Auth;

class CompanyController extends Controller
{
    /**
     * Force user to be logged in before accessing any user information
     */

    public function __construct() {
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(9);

        return view('company.index', ['companies' => $companies, 'crum' => 'home']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function create(Company $company)
    {
        $this->middleware('auth');

        return view('company.create', ['crum' => 'create-company', 'crum2' => $company]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCompanyRequest $request, Company $company)
    {
        $this->middleware('auth');
        
        $company = new Company;

        $company->user_id = Auth::id();
        $company->name = request('name');
        $company->street = request('street');
        $company->housenumber = request('housenumber');
        $company->city = request('city');
        $company->zip_code = request('zip_code');
        if($company->logo) {
             $company->logo = request()->file('logo')->store('public/images/');
        }
        $company->save();

        return redirect()->action('CompanyController@show', $company->id)->with('success', 'Uw bedrijf is succesvol toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $reviews = Review::getReviews($company->id);

        return view('company.show', ['company' => $company, 'reviews' => $reviews, 'crum' => 'company', 'crum2' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company.edit', ['company' => $company, 'crum' => 'edit-company', 'crum2' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $this->middleware('auth');

        $company->name = request('name');
        $company->street = request('street');
        $company->housenumber = request('housenumber');
        $company->city = request('city');
        $company->zip_code = request('zip_code');
        if($request->hasFile('logo')) {
            $company->logo = request()->file('logo')->store('public/images');
        }
        $company->save();

        return redirect('/company/' . $company->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        return redirect('/');
    }

    public function search($company)
    {

        $companies = [];
        $companies = Company::where('name','LIKE','%'.$company.'%')->orWhere('street','LIKE','%'.$company.'%')->orWhere('zip_code','LIKE','%'.$company.'%')->paginate(10);
        if(count($companies) > 0){
            return view('company.index', ['companies' => $companies, 'crum' => 'search', 'crum2' => $company]);
        }
        return redirect('/');
    }
}
