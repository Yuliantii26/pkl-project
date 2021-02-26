<?php

namespace App\Http\Controllers;

use App\Models\kelurahan;
use App\Models\kecamatan;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
        $kelurahan = kelurahan::with('kecamatan')->get();
        return view('admin.kelurahan.index',compact('kelurahan'));
    }

    public function create()
    {
        $kecamatan = kecamatan::all();
        return view('admin.kelurahan.create',compact('kecamatan'));
    }

    public function store(Request $request)
    {
       //validasi
       $request->validate(
        [
            'id_kelurahan' => 'required|max:5|unique:kelurahans',
            'nama_kelurahan' => 'required|unique:kelurahans',
            'id_kecamatan' => 'required|unique:kelurahans',
        ],
        [
            'id_kelurahan.required' => 'id Harus Diisi',
            'id_kelurahan.unique' => 'id Maksimal 5 Nomor',
            'id_kelurahan.unique' => 'id Sudah Dipakai',
            'nama_kelurahan.required' =>' Nama kelurahan Harus Diisi',
            'nama_kelurahan.unique' => 'Kode Sudah Dipakai',
        ] );
       
        $kelurahan = new kelurahan();
        $kelurahan->id_kelurahan = $request->id_kelurahan;
        $kelurahan->nama_kelurahan = $request->nama_kelurahan;
        $kelurahan->id_kecamatan = $request->id_kecamatan;
        $kelurahan->save();
        return redirect()->route('kelurahan.index');
    }

    public function show($id)
    {
        $kecamatan = kecamatan::all();
        $kelurahan = kelurahan::findOrFail($id);
        return view('admin.kelurahan.show',compact('kelurahan','kecamatan'));
    }

    public function edit($id)
    {
        $kecamatan = kecamatan::all();
        $kelurahan = kelurahan::findOrFail($id);
        return view('admin.kelurahan.edit',compact('kelurahan','kecamatan'));

    }

    public function update(Request $request, $id)
    {
        
        $kelurahan = kelurahan::findOrFail($id);
        $kelurahan->id_kelurahan=$request->id_kelurahan;
        $kelurahan->nama_kelurahan = $request->nama_kelurahan;
        $kelurahan->id_kecamatan = $request->id_kecamatan;
        $kelurahan->save();
        return redirect()->route('kelurahan.index');
    }

    public function destroy($id)
    {
        $kelurahan = kelurahan::findOrFail($id)->delete();
        return redirect()->route('kelurahan.index');
    }
}