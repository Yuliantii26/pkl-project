@extends('layouts.master')
@section('content')
<div class="container">
  <div class="row justify-content-center">
     <div class="col-md-10">
       <div class="card">
          <div class="card-header">Data Kelurahan</div>
          <div class="card-body">
          <form action="{{route('kelurahan.store')}}" method="POST">
            @csrf
            <div class="form-group">
                 <label for="" class="form-label">id kelurahan</label>
                 <input type="text" name="id_kelurahan" class="form-control">
                 
            </div>
            <div class="form-group">
               <label for="">Nama kelurahan</label>
               <input type="text" name="nama_kelurahan" class="form-control">
              
               </div>
               <label for="">Nama Kecamatan</label>
               <select name="id_kecamatan" class="form-control">
                    @foreach($kecamatan as $data)
                    <option value="{{$data->id}}">{{$data->nama_kecamatan}}</option>
                    @endforeach
               </select>

            </div>
            
            <div class="form-group">  
            <button type="submit" class="btn btn-primary">simpan</button>
            </div>
          </form>
          </div>
       </div>
     </div>
  </div>
</div>
@endsection