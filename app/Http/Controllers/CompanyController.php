<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCompanyRequest;

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
        
        return view('company.index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->middleware('auth');

        return view('company.create');
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
        return view('company.show', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $this->middleware('auth');
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
            return view('company.index', ['companies' => $companies]);
        }
        return redirect('/');
    }
}
