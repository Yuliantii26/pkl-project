@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                   @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
            <div class="card">
                <div class="card-header">
                    <h3>Data Kelurahan</h3>
                    <a href="{{route('kelurahan.create')}}" class="btn btn-primary float-right">Tambah Data</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col">Id kelurahan</th>
                                <th scope="col">Nama kelurahan</th>  
                                <th scope="col">Nama kecamatan</th> 
                                <th scope="col">Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            @php $no=1; @endphp
                                @foreach($kelurahan as $data)
                                <tr>
                                    <td scope ="row">{{$no++}}</td>
                                    <td>{{$data->id_kelurahan}}</td>
                                    <td>{{$data->nama_kelurahan}}</td>
                                    <td>{{$data->kecamatan->nama_kecamatan}}</td>
                                    <td>
                                        <form action="{{route('kelurahan.destroy',$data->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('kelurahan.edit', $data->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('kelurahan.show', $data->id)}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> </a>
                                            <button type="submit" class="btn btn-danger btn-sm"><img src="https://img.icons8.com/metro/15/000000/trash.png"/></i></button>
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