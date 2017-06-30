<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;

class User extends Controller
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
     * Show the profile view
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function showProfile(Request $request)
    {
        return view('user-profile', [ 'user' => $request->user() ]);
    }
    
    /**
     * Edit the profile of the authenticated user
     *
     * @param \App\Http\Requests\ProfileRequest $request
     * @return \Illuminate\Http\Response
     */
    public static function postProfile(ProfileRequest $request)
    {
        // Update the model of the autheinticated user and redirect to
        // the 'user.profile' route
    }
    
    /**
     * Show the profile edition view
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public static function showEditProfileForm(Request $request)
    {
        return view('user-profile-edit', [ 'user' => $request->user() ]);
    }
    
    /**
     * Show the history of this user
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public static function showHistory(Request $request)
    {
        return view('user-history', [ 'user' => $request->user() ]);
    }
}
