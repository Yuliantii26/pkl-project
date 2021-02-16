@extends('layouts/master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Edit Kota</div>
                <div class="card-body">
                    <form action="{{route('kota.update',$kota->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Kode Kota</label>
                            <input type="text" name="kode_kota" value="{{$kota->kode_kota}}" class="form-control" required>
                            @if($errors->has('kode_kota'))
                                <span class="text-danger">{{$errors->first('kode_kota')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kota</label>
                            <input type="text" name="nama_kota" value="{{$kota->nama_kota}}" class="form-control" required>
                            @if($errors->has('nama_kota'))
                                <span class="text-danger">{{$errors->first('nama_kota')}}</span>
                            @endif 
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Provinsi</label>
                            <select class="form-control" name="id_provinsi" id="exampleFormControlSelect1">
                                @foreach($provinsi as $data)
                                <option value="{{$data->id}}"
                                    @if($data->nama_provinsi == $kota->provinsi->nama_provinsi)
                                    selected
                                @endif
                                >
                                {{$data->nama_provinsi}}
                                </option>
                                @endforeach
                            </select>
                        </div> 
                        <div class='form-group'>
                        <a href="{{url()->previous()}}" class="btn btn-primary">Simpan</a>
                    </div>
                    </form>                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection