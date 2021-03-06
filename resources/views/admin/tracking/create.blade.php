@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data tracking
                </div>
                <div class="card-body">
                    <form action="{{route('tracking.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col">
                            @livewireStyles
                                @livewire('dropdowns')
                                @livewireScripts
                            </div>
                            <div class="col">
                                
                                <div class="form-group">
                                    <label for="">positif</label>
                                    <input type="text" name="positif" class="form-control" >
                                    @if($errors->has('positif'))
                                <span class="text-danger">{{$errors->first('positif')}}</span>
                            @endif
                                </div>
                                <div class="form-group">
                                    <label for="">sembuh</label>
                                    <input type="text" name="sembuh" class="form-control" >
                                    @if($errors->has('sembuh'))
                                <span class="text-danger">{{$errors->first('sembuh')}}</span>
                            @endif
                                </div>
                                <div class="form-group">
                                    <label for="">meninggal</label>
                                    <input type="text" name="meninggal" class="form-control" >
                                    @if($errors->has('meninggal'))
                                <span class="text-danger">{{$errors->first('meninggal')}}</span>
                            @endif
                                </div>
                                <div class="form-group">
                                    <label for="">tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" >
                                     @if($errors->has('tanggal'))
                                <span class="text-danger">{{$errors->first('tanggal')}}</span>
                            @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection