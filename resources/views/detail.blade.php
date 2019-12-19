@extends('layouts.app')
@section('scripts')
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($events as $evt)
            <div class="card">
                <img src="\uploads/event/{{$evt->gambar}}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><strong>{{$evt->nama}}</strong><i class="far fa-calendar-alt float-right text-secondary"> {{$evt->tanggal}} {{$evt->waktu}}</i></h5>
                    <i class="fas fa-users text-secondary"></i> {{$evt->promotor}}<br>
                    <i class="fas fa-map-marker-alt text-secondary"></i> {{$evt->tempat}}
                    <hr>
                    <p align="justify" class="card-text mt-3">{{$evt->deskripsi}}</p>
                        @if ($order->isEmpty())
                            @if($evt->id_user == Auth::user()->id)
                                <div class="row">
                                    <div class="col text-center">
                                        <a href="/eventku/{{$evt->id}}" class="btn btn-success" role="button" aria-disabled="true">Detail</a>
                                    </div>
                                </div>
                            @else
                            <form action="{{ route('addorder') }}" method="POST" enctype="multipart/form-data">
                                {{{ csrf_field() }}}
                            <input type="hidden" name="id_user" class="form-control" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="id_event" class="form-control" value="{{ $evt->id }}">
                            <div class="row">
                                <div class="col text-center">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        Daftar
                                    </button>
                                      
                                      <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Eventku</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda sudah yakin?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Daftar</button>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            </form>
                            @endif
                        @else
                            @foreach ($order as $ord)
                                <div class="row">
                                    <div class="col text-center">
                                        <a href="/order/{{$ord->id_order}}" class="btn btn-success" role="button" aria-disabled="true">Sudah Terdaftar</a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                </div>
            </div>
            <br>
            @endforeach
        </div>
    </div>
</div>
@endsection