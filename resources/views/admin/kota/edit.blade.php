@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Data Kota
                </div>
                <div class="card-body">
                    <form action="{{route('kota.update',$kota->id)}}" method="post">
                    <!-- <input type="hidden" name="_method" value="PUT"> -->
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">id Provinsi</label>
                            <select name="id_provinsi" class="form-control">
                            @foreach($provinsi as $data)
                            <option value="{{$data->id}}"
                            {{$data->id == $kota->id_provinsi ? "selected": ""}}>{{$data->nama_provinsi}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Kode Kota</label>
                            <input type="text" name="kode_kota" class="form-control" value="{{$kota->kode_kota}}">
                            @if($errors->has('kode_kota'))
                                <span class="text-danger">{{$errors->first('kode_kota')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Kota</label>
                            <input type="text" name="nama_kota" class="form-control" value="{{$kota->nama_kota}}">
                            @if($errors->has('nama_kota'))
                                <span class="text-danger">{{$errors->first('nama_kota')}}</span>
                            @endif  
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