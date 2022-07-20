<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Calendar extends Controller
{
    //? for restrictions
    public function __construct() {

        $this->middleware('auth');
    }

    //? display the calendar page
    public function index() {

        return view('calendar');
    }
}
