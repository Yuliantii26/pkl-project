<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\provinsi;
use App\Http\Controller\DB;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $kota = Kota::with('provinsi')->get();
        return view('admin.kota.index', compact('kota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsi = provinsi::all();
        return view('admin.kota.create', compact('provinsi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
        $request->validate(
            [
                'kode_kota' => 'required|max:5|unique:kotas',
                'nama_kota' => 'required|unique:kotas',
                
            ],
            [
                'kode_kota.required' => 'Kode Harus Diisi',
                'kode_kota.unique' => 'Kode Maksimal 5 Nomor',
                'kode_kota.unique' => 'Kode Sudah Dipakai',
                'nama_kota.required' =>' Nama kota Harus Diisi',
                'nama_kota.unique' => 'Kode Sudah Dipakai',
            ] );
        
        $kota = new Kota();
        $kota->kode_kota = $request->kode_kota;
        $kota->nama_kota = $request->nama_kota;
        $kota->id_provinsi = $request->id_provinsi;
        $kota->save();
        return redirect()->route('kota.index')->with(['message'=>'Data berhasil dibuat']);
    }

    /**
     * Display the specified resource.
     * 
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provinsi = provinsi::all();
        $kota = Kota::findOrFail($id);
        return view('admin.kota.show', compact('kota','provinsi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provinsi = provinsi::all();
        $kota = Kota::findOrFail($id);
        return view('admin.kota.edit',compact('kota','provinsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        
        $kota = Kota::findOrFail($id);
        $kota->kode_kota = $request->kode_kota;
        $kota->nama_kota = $request->nama_kota;
        $kota->id_provinsi = $request->id_provinsi;
        $kota->save();
        return redirect()->route('kota.index')->with(['message'=>'Data berhasil di edit!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kota = Kota::findOrFail($id)->delete();
        return redirect()->route('kota.index')->with(['message'=>'Data berhasil dihapus!']);
    }
}