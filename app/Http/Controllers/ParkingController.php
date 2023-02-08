<?php

namespace App\Http\Controllers;

use App\Models\Parking;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ParkingController extends Controller
{
    public function index(Request $r){
        if($r->start != null && $r->end != null){
            $data = Parking::selectRaw('parkings.*')
            ->whereBetween('entrance', [
                $r->start . ' 00:00:00',
                $r->end   . ' 23:59:59'
            ])->get();

            return view('parking.index', ['data' => $data]);
        }

        return view('parking.index');

    }

    public function entry(Request $r){
        //return $r->input();
        $time = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');
        $park = Carbon::now('Asia/Jakarta')->format('YmdHis');

        $existing = Parking::where('vehicleregistration', $r->nopol)
        ->whereNull('exit')
        ->get();

        if (count($existing) > 0){
            return '<h3 class="m-3"><center>Kendaraan Anda Belum Keluar.</center></h3>';
        } else {
            Parking::create([
                'parkingno'             => $park,
                'entrance'              => $time,
                'vehicleregistration'   => $r->nopol
            ]);
            
            return view('parking.entry', [
                'nopol'  => $r->nopol,
                'waktu'  => $time,
                'parkir' => $park,
            ]);
        }
    }

    public function exit(Request $r){
        $data = Parking::where('parkingno', $r->noparkir)
        ->whereNull('exit')
        ->first();

        if($data != null){
            $in   = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');
            $out  = Carbon::parse($data->entrance);
            $dur  =  $out->diffInHours($in) + 1;
            $cost = (int)$dur * 3000;

            $data->exit  = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');
            $data->total = $cost;
            $data->save();

            return view('parking.entry', [
                'nopol'  => $data->vehicleregistration,
                'waktu'  => $data->entrance,
                'exit'   => $data->exit,
                'parkir' => $data->parkingno,
                'total'  => $data->total
            ]);

        } else {
            return '<h3 class="m-3"><center>No Parkir Tidak Ditemukan.</center></h3>';
        }
    }
}
