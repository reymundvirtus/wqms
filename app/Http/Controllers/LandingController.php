<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    //? for restrictions
    public function __construct() {

        $this->middleware(['guest']);
    }

    //? display the landing page
    public function index() {

        return view('landing');
    }
}
