@extends('layouts/master')
@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class = "col-md-10">
        <div class = "card">
           <div class = "card header">
             <h5><b>Tambah Data Kecamatan</b></h5>
           </div>
           <div class="card-body">

                <form action="{{route('kecamatan.store')}}" method="POST">
                @csrf
                <div class="form-group">
                   <label for="">Id Kota</label>
                   <select class ="form-control" name="id_kota" required>
                   @foreach($kota as $data)
                   <option value="{{$data->id}}"->{{$data->nama_kota}}</option>
                   @endforeach
                   </select>
                </div>
                   <div class="form-group">
                   <label for="">kode Kecamatan</label>
                   <input type="number" name="kode_kecamatan" class="form-control" required>
                   </div>
                   <div class="form-group">
                   <label for="">Nama Kecamatan</label>
                   <input type="text" name="nama_kecamatan" class="form-control" required>
                </div>
                   <div class="form-group">
                   <button type = "submit" class="btn btn-primary">Submit</button>
                   </div>
                </form>
           </div>
        </div>
      </div>
   </div>
</div>
@endsection