<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Company;
use App\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $companyid = $request->id;
        $companies = Company::where('id', $companyid)->first();  
        return view('contact.create', ['companyid' => $companyid, 'crum' => 'new-contact', 'crum2' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact = new contact;

        $contact->company_id = request('company_id');
        $contact->function = request('function');
        $contact->gender = request('gender');
        $contact->name = request('name');
        $contact->email = request('email');
        $contact->phone_number = request('phone_number');
    
        $contact->save();

        return redirect()->action('CompanyController@show', $request->company_id)->with('success', 'De contactpersoon is toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
