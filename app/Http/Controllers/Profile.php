<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Profile extends Controller
{
    //? for restrictions
    public function __construct() {

        $this->middleware('auth');
    }

    //? display the profiles page
    public function index() {

        return view('profile');
    }
}
