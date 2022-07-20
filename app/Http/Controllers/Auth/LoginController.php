<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //? for restrcitions
    public function __construct() {

        $this->middleware(['guest']);
    }

    //? display the login page
    public function index() {

        return view('auth.login');
    }

    //? function to login the user
    public function login(Request $request) {

        //? validation
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //? check if the user is logged in
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {

            return back()->with('status', 'Invalid login details.');
        }

        //? redirect the user in dashboard after login
        return redirect()->route('dashboard');
    }
}
