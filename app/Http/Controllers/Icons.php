<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Icons extends Controller
{
    public function index() {

        return view('icons');
    }
}
