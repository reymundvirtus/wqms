<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CrudUsers extends Model
{
    use HasFactory;

    function scopeRetrieveUser() {

        $result = DB::select('SELECT * FROM users');

        return $result;
    }

    public function DeleteUser($request) {

        $user_id = $request->input('user_id');

        $result = DB::delete('DELETE FROM users WHERE id = ?', [$user_id]);
        return $result;
    }

    function UpdateUser($request) {

        $user_id = $request->input('user_id');
        $name = $request->input('name');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));

        $result = DB::update('UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?', [$name, $email, $password, $user_id]);

        return $result;
    }
}
