<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    //? function to logout the user
    public function logout() {

        auth()->logout();
        
        return redirect()->route('login');
    }
}
