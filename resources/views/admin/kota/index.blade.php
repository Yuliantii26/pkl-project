@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Data Kota</h3>
                    <a href="{{route('kota.create')}}" class="btn btn-primary btn-small float-right">
                        Tambah Data</a>
                       
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                        <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Id Provinsi</th>
                                    <th scope="col">kode kota </th>
                                    <th scope="col">Nama Kota</th>
                                    <th scope="col">Nama Provinsi</th>
                                    <th scope="col">Action</th>
 
                                </tr>
                                </thead>
                            <tbody>
                                @php $no=1; @endphp
                                @foreach($kota as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->id_provinsi }}</td>
                                    <td>{{$data->kode_kota}}</td>
                                    <td>{{$data->nama_kota}}</td>
                                    <td>{{$data->provinsi->nama_provinsi}}</td>
                                    <td>
                                        <form action="{{ route('kota.destroy',$data->id)}}" method="POST">
                                            @csrf 
                                            @method('DELETE')
                                            <a href="{{ route('kota.edit', $data->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('kota.show', $data->id)}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> </a>
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