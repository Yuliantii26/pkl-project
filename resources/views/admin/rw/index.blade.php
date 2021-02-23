@extends('layouts.master')
@section('content')

    <div class = "container">
      <div class = "row justify-content-center">
        <div class = "col-md-12">
         <div class = "card">
          <div class = "card-header">
            <h3>  Data Rw</h3>
              <a href="{{route('rw.create')}}" class="btn btn-primary btn-small float-right">Tambah Data</a>
          </div>
          <div class="card-body">
             <div class="table-responsive">
                <table class="table">
                <thead>
                <tr>
                     <th scope="col">No</th>
                     <th scope="col">Id Rw</th>
                     <th scope="col"> Rw</th>
                     <th scope="col">Nama Kelurahan</th>
                     <th scope="col">Action</th>
                </tr>
                </thead>
                @php $no=1;
                @endphp
                @foreach($rw as $data)

                    <tr>
                        <th scope="row">{{$no++}}</th>
                        <td>{{$data->id_rw}}</td>
                        <td>{{$data->rw}}</td>
                        <td>{{$data->kelurahan->nama_kelurahan}}</td>
                     <td>
                     <form action="{{route('rw.destroy',$data->id)}}" method="POST">
                              @csrf @method('delete')
                              <a href="{{route('rw.edit',$data->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                              <a href="{{route('rw.show',$data->id)}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin ? ')"><img src="https://img.icons8.com/metro/15/000000/trash.png"/></button>
                         
                              
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