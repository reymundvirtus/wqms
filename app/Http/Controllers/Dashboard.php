<?php

namespace App\Http\Controllers;

use App\Models\CrudUsers;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    //? for restrictions
    public function __construct() {

        $this->middleware('auth');
    }

    //? display the dashboard page
    public function index() {

        return view('index');
    }

    //? retrieve data from users table in database
    public function retrieve_data() {

        $user = CrudUsers::RetrieveUser();

        return response()->json($user);
    }

    //? to delete a row in users table in database
    public function delete_data(Request $request) {

        $result = new CrudUsers();
        $result->DeleteUser($request);
        
        return response()->json($result);
    }

    //? updating the data in users table in database
    public function update_data(Request $request) {

        $result = new CrudUsers();
        $result->UpdateUser($request);

        return response()->json($result);
    }
}
