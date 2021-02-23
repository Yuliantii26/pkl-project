<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use App\Models\Kecamatan;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
        $kelurahan = Kelurahan::with('kecamatan')->get();
        return view('admin.kelurahan.index',compact('kelurahan'));
    }

    public function create()
    {
        $kecamatan = Kecamatan::all();
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
       
        $kelurahan = new Kelurahan();
        $kelurahan->id_kelurahan = $request->id_kelurahan;
        $kelurahan->nama_kelurahan = $request->nama_kelurahan;
        $kelurahan->id_kecamatan = $request->id_kecamatan;
        $kelurahan->save();
        return redirect()->route('kelurahan.index')
                ->with(['message'=>'Data kelurahan berhasil dibuat']);
    }

    public function show($id)
    {
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::findOrFail($id);
        return view('admin.kelurahan.show',compact('kelurahan','kecamatan'));
    }

    public function edit($id)
    {
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::findOrFail($id);
        return view('admin.kelurahan.edit',compact('kelurahan','kecamatan'));

    }

    public function update(Request $request, $id)
    {
        
        $kelurahan = Kelurahan::findOrFail($id);
        $kelurahan->id_kelurahan=$request->id_kelurahan;
        $kelurahan->nama_kelurahan = $request->nama_kelurahan;
        $kelurahan->id_kecamatan = $request->id_kecamatan;
        $kelurahan->save();
        return redirect()->route('kelurahan.index')
                ->with(['message'=>'Data kelurahan berhasil diedit']);
    }

    public function destroy($id)
    {
        $kelurahan = Kelurahan::findOrFail($id)->delete();
        return redirect()->route('kelurahan.index')
                ->with(['message'=>'Data kelurahan berhasil dihapus']);
    }
}