<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Models\Rw;
use App\Models\Tracking;
use DB;

class ApiController extends Controller
{
   
    public function rw()
    {
        $rw = DB::table('trackings')->select([
            DB::raw('SUM(positif) as Positif'),
            DB::raw('SUM(sembuh) as Sembuh'),
            DB::raw('SUM(meninggal) as Meninggal'),
        ])
        ->groupBy('tanggal')->get();

        $positif = DB::table('rws')
                 ->select('trackings.positif',
                 'trackings.sembuh','trackings.meninggal')
                 ->join('trackings','rws.id','=','trackings.id_rw')
                 ->sum('trackings.positif');
        $sembuh = DB::table('rws')
                 ->select('trackings.positif',
                 'trackings.sembuh','trackings.meninggal')
                 ->join('trackings','rws.id','=','trackings.id_rw')
                 ->sum('trackings.sembuh');
        $meninggal = DB::table('rws')
                   ->select('trackings.positif',
                   'trackings.sembuh','trackings.meninggal')
                   ->join('trackings','rws.id','=','trackings.id_rw')
                   ->sum('trackings.sembuh');
                   return response([
                       'succes' => true,
                       'data' =>['Hari ini' => $rw,
                   ],
                        'total' =>['Positif' => $positif,
                        'Sembuh' => $sembuh,
                        ' Meninggal' => $meninggal,
                ],
                        'message' => 'Berhasil'
            ],200);
    }
}
