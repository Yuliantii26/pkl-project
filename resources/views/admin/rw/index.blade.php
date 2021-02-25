@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Rukun Warga
                    <a href="{{route('rw.create')}}"
                       class="btn btn-primary float-right">
                        Tambah
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Rukun Warga</th>
                                    <th>kelurahan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1; @endphp
                                @foreach($rw as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->nama_rw}}</td>
                                    <td>{{$data->kelurahan->nama_kelurahan}}</td>
                                    <td>
                                    <form action="{{route('rw.destroy',$data->id)}}" method="POST">
                              @csrf @method('delete')
                              <a href="{{ route('rw.edit', $data->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                              <a href="{{ route('rw.show', $data->id)}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> </a>
                              <button type="submit" class="btn btn-danger btn-sm"><img src="https://img.icons8.com/metro/15/000000/trash.png"/></i></button>
                                   </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

