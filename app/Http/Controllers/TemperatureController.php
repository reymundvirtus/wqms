<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TemperatureController extends Controller
{
    public function insert_temp(Request $request) {

        $insert_temp = DB::table('temperatures')->insert([
            'temperature_c' => $request->temperature_c,
            'temperature_f' => $request->temperature_f,
            'temperature_pH' => $request->temperature_pH,
        ]);

        return response()->json($insert_temp);
    }

    //? get tempc
    public function get_tempc() {

        $tempc = DB::table('temperatures')
            ->select('temperature_c', 'temperature_f')
            ->orderByRaw('created_at DESC LIMIT 1')
            ->get();

        return response()->json($tempc);
    }

    //? get pH
    public function get_temppH() {

        $temppH = DB::table('temperatures')
            ->select('temperature_pH')
            ->orderByRaw('created_at DESC LIMIT 1')
            ->get();

        return response()->json($temppH);
    }
}
