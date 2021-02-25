@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Tambah Data Kelurahan
                </div>
                <div class="card-body">
                    <form action="{{route('kelurahan.update',$kelurahan->id)}}" method="post">
                    <!-- <input type="hidden" name="_method" value="PUT"> -->
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Id Kelurahan</label>
                            <input type="text" name="id_kelurahan" class="form-control" value="{{$kelurahan->id_kelurahan}}" required>
                            
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kelurahan</label>
                            <input type="text" name="nama_kelurahan" class="form-control" value="{{$kelurahan->nama_kelurahan}}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kecamatan</label>
                            <select name="id_kecamatan" class="form-control">
                            @foreach($kecamatan as $data)
                            <option value="{{$data->id}}"
                            {{$data->id == $kelurahan->id_kecamatan ? "selected": ""}}>{{$data->nama_kecamatan}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah anda yakin?')">Simpan</button>
                        </div>
                
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection