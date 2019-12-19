@extends('layouts.app')
@section('scripts')
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($detail->slice(0,1) as $det)
            <div class="card">
                <img src="\uploads/event/{{$det->gambar}}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><strong>{{$det->nama}}</strong><i class="far fa-calendar-alt float-right text-secondary"> {{$det->tanggal}} {{$det->waktu}}</i></h5>
                    <i class="fas fa-users text-secondary"></i> {{$det->promotor}}<br>
                    <i class="fas fa-map-marker-alt text-secondary"></i> {{$det->tempat}}
                    <hr>
            @endforeach
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Deskripsi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Peserta</a>
                        </li>
                    </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"><p align="justify" class="card-text mt-3">{{$det->deskripsi}}</p></div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Tanggal</th>
                                        </tr>
                                    </thead>
                                    @foreach($detail as $det)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$det->name}}</td>
                                            <td>{{$det->email}}</td>
                                            <td>{{$det->tanggal_order}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
                        </div>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
@endsection