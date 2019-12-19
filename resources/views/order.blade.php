@extends('layouts.app')
@section('scripts')
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($order as $ord)
            <div class="card">
                <img src="\uploads/event/{{$ord->gambar}}" class="card-img-top">
                <div class="card-body">
                    <h3><strong>Pemesanan anda berhasil!</strong></h3>
                    <p>Anda telah berhasil melakukan pemesanan untuk event:</p>
                    <h6><strong>{{$ord->nama}}</strong><i class="far fa-calendar-alt text-secondary float-right"> {{$ord->tanggal}} {{$ord->waktu}}</i></h6>
                    <i class="fas fa-users"></i> {{$ord->promotor}}<br>
                    <i class="fas fa-map-marker-alt"></i> {{$ord->tempat}}<br>
                    <hr>
                    <h6><strong>Order Summary</strong><p class="text-secondary float-right">Order #{{$ord->id_order}}</p></h6>
                    <i class="fas fa-ticket-alt ticket-secondary"></i> 1 Free Ticket<br>
                    <i class="fas fa-user-circle"></i> {{$ord->name}} <br>
                    <i class="fas fa-envelope"></i> {{$ord->email}} <br>
                    <br>
                    <div class="row">
                        <div class="col text-center">
                            <a href="/order/{{$ord->id_order}}/cetak_pdf" class="btn btn-info" role="button"><i class="far fa-file-pdf"></i> Cetak PDF</a>
                        </div>
                    </div>
            </div>
            <br>
            @endforeach
        </div>
    </div>
</div>
@endsection