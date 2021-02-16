<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Provinsi;
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
        $provinsi = Provinsi::all();
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
        $request->validate(
            [
                'kode_kota' => 'required|unique:kotas',
                'nama_kota' => 'required|unique:kotas',
            ],
            [
                'kode_kota.required' => 'Kode kota harus diisi',
                'kode_kota.unique' => 'Kode kota telah terdaftar',
                'nama_kota.required' => 'kota harus diisi',
                'nama_kota.unique' => 'kota telah terdaftar'
            ]
            );
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
        $kota = Kota::findOrFail($id);
        return view('admin.kota.show', compact('kota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kota = Kota::findOrFail($id);
        $provinsi = Provinsi::all();
        return view('admin.kota.edit', compact('kota','provinsi'));
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
        $request->validate(
            [
                'kode_kota' => 'required:kotas',
                'nama_kota' => 'required:kotas',
            ],
            [
                'kode_kota.required' => 'Kode kota harus diisi',
                'nama_kota.required' => 'kota harus diisi'
            ]
            );
        
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