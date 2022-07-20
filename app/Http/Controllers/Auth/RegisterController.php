<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //? for restrictions
    public function __construct() {
        $this->middleware(['guest']);
    }

    //? display the registration page
    public function index() {

        return view('auth.register');
    }

    //? store the input in signup to our database
    public function store(Request $request) {

        //? for validation
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|max:50',
            'password' => 'required|confirmed',
        ]);

        //? after we validate we store the new user in our database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //? then we sign in the user in
        auth()->attempt($request->only('email', 'password'));

        //? after sign in we redirect the user in the dashboard
        return redirect()->route('dashboard');
    }
}
