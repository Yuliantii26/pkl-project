@extends('layouts.master')
@section('content')
    <div class = "container">
      <div class = "row">
        <div class = "col-md-12">
         <div class = "card">
          <div class = "card-header">
              Data Provinsi
              <a href="{{route('provinsi.create')}}" class="btn btn-primary btn-small float-right">Tambah Data</a>
          </div>
          <div class="card-body">
             <div class="table-responsive">
                <table class="table">
                <tr>
                     <th>No</th>
                     <th>Kode Provinsi</th>
                     <th>Nama Provinsi</th>
                     <th>Aksi</th>
                </tr>
                @php $no = 1; @endphp
                @foreach($provinsi as $data)
                <tr> 
                     <td>{{$no++}}</td>
                     <td>{{$data->kode_provinsi}}</td>
                     <td>{{$data->nama_provinsi}}</td>
                     <td>
                     <form action="{{route('provinsi.destroy',$data->id)}}" method="POST">
                              @csrf @method('delete')
                              <a href="{{ route('provinsi.edit', $data->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                              <a href="{{ route('provinsi.show', $data->id)}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> </a>
                              <button type="submit" class="btn btn-danger btn-sm"><img src="https://img.icons8.com/metro/15/000000/trash.png"/></i></button>
                     </form>
                     </td>
                </tr>
                @endforeach
                </table>
             </div>
          </div> 
         </div>
        </div>
      </div>
    </div>
@endsection