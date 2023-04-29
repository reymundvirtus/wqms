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
            'temperature_moist' => $request->temperature_moist,
            'temperature_salanity' => $request->temperature_salanity,
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

    public function get_tempm() {

        $tempm = DB::table('temperatures')
            ->select('temperature_moist')
            ->orderByRaw('created_at DESC LIMIT 1')
            ->get();

        return response()->json($tempm);
    }


    //! TEMPERATURE FOR TODAY'S VIDEOWWW

    //? get tempc for today
    public function get_tempc_today() {

        $tempc = DB::select("SELECT ROUND(SUM(temperature_c) / COUNT(temperature_c), 2) as total_tempc FROM temperatures WHERE DATE(created_at) = '2023-01-04'"); // '2023-01-04' or date('Y-m-d')

        return response()->json($tempc);
    }

    //? get pH for today
    public function get_temppH_today() {

        $temppH = DB::select("SELECT ROUND(SUM(temperature_pH) / COUNT(temperature_pH), 2) as total_temppH FROM temperatures WHERE DATE(created_at) = '2023-01-04'"); // '2023-01-04' or date('Y-m-d')

        return response()->json($temppH);
    }

    //? get moisture for today
    public function get_tempm_today() {

        $tempm = DB::select("SELECT ROUND(SUM(temperature_moist) / COUNT(temperature_moist), 2) as total_tempm FROM temperatures WHERE DATE(created_at) = '2023-01-04'"); // '2023-01-04' or date('Y-m-d')

        return response()->json($tempm);
    }

    //! FOR LINEAR REGRESSION

    //? get x & y
    public function get_x_y() {

        $x_y = DB::select("SELECT ROUND(AVG(temperature_c) OVER(), 2) as x, ROUND(AVG(temperature_f) OVER(), 2) as y FROM temperatures");

        return response()->json($x_y);
    }
}
