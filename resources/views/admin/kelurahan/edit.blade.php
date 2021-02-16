@extends('layouts.master')

@section('content')
<div class = "container">
    <div class = "row">
        <div class = "col-md-12">
            <div class = "card">
               <div class = "card-header">
                    Edit Data Kelurahan
               </div>
               <div class="card-body">
                   <form action="{{route('kelurahan.update',$kelurahan->id)}}" method="POST">
                      @csrf @method('put')
                    <div class='form-group'>
                         <label for="">id kelurahan</label>
                         <input type="text" name="id_kelurahan" class="form-control" value="{{$kelurahan->id_kelurahan}}" required>
                    </div>
                    <div class='form-group'>
                         <label for="">Nama kelurahan</label>
                         <input type="text" name="nama_kelurahan" class="form-control" value="{{$kelurahan->nama_kelurahan}}" required>
                         @if($errors->has('nama_kelurahan'))
                                <span class="text-danger">{{$errors->first('nama_kelurahan')}}</span>
                            @endif
                    </div>
                    <label>Nama Kecamatan</label>
                    <select name="id_kecamatan" class="form-control" required>
                        @foreach ($kecamatan as $data)
                        <option value="{{$data->id}}" {{$data->id == $kelurahan->id_kecamatan ? 'selected' : ''}} >{{$data->nama_kecamatan}}</option>
                        @endforeach
                    </select>
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