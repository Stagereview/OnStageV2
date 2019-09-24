<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.dashboard');
    }

    public function edit($id)
    {
        // get user
        $user = DB::table('users')->where('id', $id)->first();

        return view('dashboard.edit')->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        // validate the input data from dashboard edit
        $validatedData = Validator::make($request->all(), [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255'
        ])->validate();

        // update the user table when the input data is validated
        DB::table('users')->where('id', $id)->update([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name']
        ]);

        return redirect()->route('dashboard');
    }
}