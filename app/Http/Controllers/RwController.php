<?php

namespace App\Http\Controllers;

use App\Models\rw;
use App\Models\kelurahan;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;

class RwController extends Controller
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
        $rw = Rw::with('kelurahan')->get();
        return view('admin.rw.index',compact('rw'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelurahan = Kelurahan::all();
        return view('admin.rw.create',compact('kelurahan'));
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
                'id_rw' => 'required|max:5|unique:rws',
                'rw' => 'required|unique:rws',
            ],
            [
                'id_rw.required' => 'Id Harus Diisi',
                'id_rw.unique' => 'Id Maksimal 5 Nomor',
                'id_rw.unique' => 'Id Sudah Dipakai',
                'rw.required' =>' nama rw Harus Diisi',
                'rw.unique' => 'Kode Sudah Dipakai',
            ] );
        
        
        
        $rw= new Rw();
        
        $rw->id_rw = $request->id_rw;
        $rw->rw= $request->rw;
        $rw->nama_kelurahan = $request->nama_kelurahan;
        $rw->save();
        return redirect()->route('rw.index')
            ->with(['message'=>'Data Berhasil Dibuat']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rw = Rw::findOrFail($id);
        return view('admin.rw.show',compact('rw'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelurahan = kelurahan::all();
        $rw = Rw::findOrFail($id);
        return view('admin.rw.edit',compact('rw','kelurahan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        
        $rw = Rw::findOrFail($id);
        $rw->id_rw= $request->id_rw;
        $rw->rw = $request->rw;
        $rw->nama_kelurahan= $request->nama_kelurahan;
        $rw->save();
        return redirect()->route('rw.index')
            ->with(['message'=>'Data Berhasil Diedit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rw = Rw::findOrFail($id)->delete();
        return redirect()->route('rw.index')
                        ->with(['message1'=>'Data Berhasil Dihapus']);
    }
}