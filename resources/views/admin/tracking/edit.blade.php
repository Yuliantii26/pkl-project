@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data tracking
                </div>
                <div class="card-body">
                    <form action="{{route('tracking.update',$tracking->id)}}" method="post">
                        @csrf @method('put')
                        <div class="row">
                            <div class="col">
                                @livewire('dropdowns',['selectedRw'=>$tracking->id_rw,'selectedKelurahan'=>$tracking->rw->id_kelurahan,
                                            'selectedKecamatan'=>$tracking->rw->kelurahan->id_kecamatan,
                                            'selectedKota'=>$tracking->rw->kelurahan->kecamatan->id_kota,
                                            'selectedProvinsi'=>$tracking->rw->kelurahan->kecamatan->kota->id_provinsi])
                            </div>
                            <div class="col">
                                
                                <div class="form-group">
                                    <label for="">positif</label>
                                    <input type="text" name="positif" class="form-control" value="{{$tracking->positif}}" required>
                                   
                                </div>
                                <div class="form-group">
                                    <label for="">sembuh</label>
                                    <input type="text" name="sembuh" class="form-control" value="{{$tracking->sembuh}}" required>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="">meninggal</label>
                                    <input type="text" name="meninggal" class="form-control" value="{{$tracking->meninggal}}" required>
                                   
                                </div>
                                <div class="form-group">
                                    <label for="">tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" value="{{$tracking->tanggal}}" required>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection