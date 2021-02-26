@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   <h3> Data Tracking</h3>
                    <a href="{{route('tracking.create')}}"
                       class="btn btn-primary float-right">
                        Tambah Data
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Lokasi</th>
                                <th scope="col">Jumlah Positif</th>
                                <th scope="col">Jumlah Sembuh</th>
                                <th scope="col">Jumlah Meninggal</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            
                            @php $no=1; @endphp
                            @foreach($tracking as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>
                                    Provinsi : {{$data->rw->kelurahan->kecamatan->kota->provinsi->nama_provinsi}}<br>
                                    Kota : {{$data->rw->kelurahan->kecamatan->kota->nama_kota}}<br>
                                    Kecamatan : {{$data->rw->kelurahan->kecamatan->nama_kecamatan}}<br>
                                    kelurahan : {{$data->rw->kelurahan->nama_kelurahan}}
                                   
                                </td>
                                
                                <td alighn="center"><br>{{$data->positif}}</td>
                                <td alighn="center"><br>{{$data->sembuh}}</td>
                                <td alighn="center"><br>{{$data->meninggal}}</td>
                                <td alighn="center"><br>{{$data->tanggal}}</td>
                                <td alighn="center"><br>
                                
                                <form action="{{route('tracking.destroy',$data->id)}}" method="POST">
                              @csrf @method('delete')
                              <a href="{{route('tracking.edit',$data->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
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