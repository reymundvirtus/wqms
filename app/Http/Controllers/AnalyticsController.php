<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use App\Notifications\TemperatureNotif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class AnalyticsController extends Controller
{
    public function index() {

        return view('analytics');
    }

    public function sendNotification(Request $request) {
        
        $notification = Notification::create([
            'subject' => $request->subject,
            'details' => $request->details,
        ]);

        //? send to one user
        // $user = User::first();
        // $user->notify(new TemperatureNotif($notification));

        //? send to email
        // FacadesNotification::route('mail', ['wqms@gmail.com' => User::first()->name])->notify(new TemperatureNotif($notification));

        //? send to multi user
        $users = DB::table('users')
                    ->select('name', 'email')
                    ->get();

        FacadesNotification::route('mail', $users)->notify(new TemperatureNotif($notification));

        return response()->json($notification);
    }
}
