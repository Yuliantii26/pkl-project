@extends('layouts.master')

@section('content')
<div class = "container">
    <div class = "row">
        <div class = "col-md-12">
            <div class = "card">
               <div class = "card-header">
                    Edit Data Rw
               </div>
               <div class="card-body">
                   <form action="{{route('rw.update',$rw->id)}}" method="post">
                      @csrf @method('put')
                    <div class='form-group'>
                         <label for="">Id Rw</label>
                         <input type="text" name="id_rw" class="form-control" value="{{$rw->id_rw}}" required>
                    
                    </div>
                    <div class='form-group'>
                         <label for="">Rw</label>
                         <input type="number" name="rw" class="form-control" value="{{$rw->rw}}" required>
                         @if($errors->has('rw'))
                                <span class="text-danger">{{$errors->first('rw')}}</span>
                            @endif
                    </div>
                    <label>Nama Kelurahan</label>
                    <select name="nama_kelurahan" class="form-control" required>
                        @foreach ($kelurahan as $data)
                        <option value="{{$data->id}}" {{$data->id == $rw->nama_kelurahan ? 'selected' : ''}} >{{$data->nama_kelurahan}}</option>
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