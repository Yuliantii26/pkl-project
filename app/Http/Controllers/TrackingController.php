<?php

namespace App\Http\Controllers;
use App\Http\Controllers\DB;
use App\Models\kota;
use App\Models\kecamatan;
use App\Models\kelurahan;
use App\Models\rw;
use App\Models\tracking;
use Illuminate\Http\Request;

class trackingController extends Controller
{
    public function index()
    {
        $tracking = Tracking::with('rw.kelurahan.kecamatan.kota.provinsi')->orderBy('id','DESC')->get();
        // dd($tracking);
        return view('admin.tracking.index',compact('tracking'));
    }

    public function create()
    {
        $rw = Rw::all();
        return view('admin.tracking.create',compact('rw'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'positif' => 'required:trackings',
            'sembuh' => 'required:trackings',
            'meninggal' => 'required:trackings',
            'tanggal' => 'required:trackings'
        ], [
            'positif.required' => 'Jumlah pasien sembuh harus diisi',
            'sembuh.required' => 'Jumlah pasien sembuhharus diisi',
            'meninggal.required' => 'Jumlah pasien meninggal harus diisi',
            'tanggal.required' => 'Tanggal harus diisi',
        ]);
        $tracking = new Tracking();
        $tracking->id_rw = $request->id_rw;
        $tracking->positif = $request->positif;
        $tracking->sembuh = $request->sembuh;
        $tracking->meninggal = $request->meninggal;
        $tracking->tanggal = $request->tanggal;
        $tracking->save();
        return redirect()->route('tracking.index');
    }

    public function show($id)
    {
        $tracking = Tracking::findOrFail($id);
        return view('admin.tracking.show',compact('tracking'));
    }


    public function edit($id)
    {
        $rw = Rw::all();
        $tracking = Tracking::findOrFail($id);
        return view('admin.tracking.edit',compact('tracking','rw'));
    }


    public function update(Request $request, $id)
    {
        
        $tracking = Tracking::findOrFail($id);
        $tracking->id_rw = $request->id_rw;
        $tracking->positif = $request->positif;
        $tracking->sembuh = $request->sembuh;
        $tracking->meninggal = $request->meninggal;
        $tracking->tanggal = $request->tanggal;
        $tracking->save();
        return redirect()->route('tracking.index');
    }

    public function destroy($id)
    {
        $tracking = Tracking::findOrFail($id);
        $tracking->delete();
        return redirect()->route('tracking.index');
    }
}