<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reminder;

class ReminderController extends Controller
{
    //? for restrictions
    public function __construct() {

        $this->middleware('auth');
    }
    
    //? display the calendar page
    public function index() {

        $reminds = array();
        $reminder = Reminder::all();
        foreach($reminder as $remind) {
            $reminds[] = [
                'id' => $remind->id,
                'title' => $remind->title,
                'start' => $remind->start,
                'end' => $remind->end,
            ];
        }
        return view('reminder', ['reminds' => $reminds]);
    }

    //? store reminder in reminders table in database
    public function store(Request $request) {

        $result = new Reminder();
        $result->InsertReminder($request);

        return response()->json($result);
    }

    //? update the reminder in calendar itself
    public function update($id, Request $request) {

        $reminder = Reminder::find($id);
        if (!$reminder) {
            return response()->json([
                'error' => 'Unable to locate the event',
            ], 404);
        }
        $reminder->update([
            'start' => $request->start_date,
            'end' => $request->end_date,
        ]);

        return response()->json('Event Updated');
    }

    //? delete the reminder in calendar itself
    public function delete($id) {

        $reminder = Reminder::find($id);
        if (!$reminder) {
            return response()->json([
                'error' => 'Unable to locate the event',
            ], 404);
        }
        $reminder->delete();

        return $id;
    }

    //? update reminder in our model to our database
    // public function update_reminder(Request $request) {

    //     $result = new Reminder();
    //     $result->UpdateReminder($request);

    //     return response()->json($result);
    // }

    //? to delete a row in reminders table in database
    public function delete_reminder(Request $request) {

        $result = new Reminder();
        $result->DeleteReminder($request);
        
        return response()->json($result);
    }

    //? getting the reminders data
    public function get_reminders() {

        $reminders = Reminder::RetrieveReminder();

        return response()->json($reminders);
    }
}
