@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br>
            @foreach($events as $evt)
            <div class="card">
                <img src="uploads/event/{{$evt->gambar}}" height="300px" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><strong>{{$evt->nama}}</strong></h5>
                    <p class="card-text">{{ Str::limit($evt->deskripsi, 400) }}</p>
                    <a href="detail/{{$evt->id}}" class="btn btn-primary stretched-link float-right">Read More</a>
                    <p class="card-text"><small class="text-muted">Last updated : {{$evt->updated_at}}</small></p>
                </div>
            </div>
            <br>
            @endforeach
        </div>
    </div>
</div>
@endsection