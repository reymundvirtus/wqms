<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reminder extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'start',
        'end',
        'user_id',
        'created_at',
        'updated_at',
    ];

    public function InsertReminder($request) {

        $title = $request->input('title');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $end_date = $request->input('end_date');
        $user_id = auth()->user()->id;
        
        $result = DB::insert('INSERT INTO reminders (title, start, end, user_id) VALUES (?, ?, ?, ?)', [$title, $start_date, $end_date, $user_id]);

        return $result;
    }

    //? for getting reminders
    public function scopeRetrieveReminder() {
        
        $result = DB::select('SELECT reminders.id, users.name, users.id, reminders.title, reminders.start, reminders.end, reminders.created_at, reminders.user_id AS encoder_id,
        (SELECT users.name FROM users WHERE id = encoder_id) AS encoder FROM reminders, users
        WHERE reminders.user_id = users.id');

        return $result;
    }

    //? update the reminder
    // public function UpdateReminder($request) {

    //     $id = $request->input('id');
    //     $title = $request->input('title');
    //     $start_date = $request->input('start_date');
    //     $end_date = $request->input('end_date');
        
    //     $result = DB::update('UPDATE reminders SET title = ?, start = ?, end = ? WHERE id = ?', [$title, $start_date, $end_date, $id]);

    //     return $result;
    // }

    //? to delete reminder in database
    public function DeleteReminder($request) {

        $id = $request->input('id');

        $result = DB::delete('DELETE FROM reminders WHERE id = ?', [$id]);
        return $result;
    }
}
