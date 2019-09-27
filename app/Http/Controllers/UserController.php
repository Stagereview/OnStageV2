<?php

namespace App\Http\Controllers;

use Validator;
use Auth;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Force user to be logged in before accessing any user information
     */

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // TODO: Add functionality so only admin can view this page.
        $users = User::paginate(10);

        // Redirect to homepage.
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Disabled via routing. Handled via registering.
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Disabled via routing. Handled via registering.
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // Admin can view everyone. User can only view himself.
        if(Auth::user()->user_role != 2):
            $user = Auth::user();
        endif;

        return view('user.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // If user is not an admin, only allow user to edit himself.
        if(Auth::user()->user_role != 2):
            $user = Auth::user();
        endif;
        
        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //Specify rules for validating user input
        $rules = array(
            'first_name' => 'required|max:255',
            'last_name' => 'required',
        );
        //Run the validator
        $validator = Validator::make($request->all(), $rules);

        //Check for success or fail of validator
        if($validator->fails()):
            return back()
                    ->withErrors($validator)
                    ->withInput($request->input());
        else:
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->save();
        endif;

        return redirect()->action('UserController@show', $user->id)->with('success', 'De gegevens zijn successvol aangepast!');
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
