@extends('layouts.app')
@section('scripts')
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<style>
    .bs-example{
        margin: 20px;
    }
</style>
<script>
$(document).ready(function(){
    $(".toast").toast();
});
</script>
@endsection
@section('content')
@if (session('status'))
<div class="bs-example">
	<div style="position: relative; min-height: 300px;">
			<!-- Position toasts -->
	<div style="position: absolute; top: 0; right: 0; min-width: 200px;">    
	<div class="toast fade show">
		<div class="toast-header">
			<strong class="mr-auto"><i class="fa fa-globe"></i>Eventku</strong>
			<small class="text-muted">Barusan</small>
			<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
		</div>
		<div class="toast-body"> Mantap! Event anda berhasil diupdate.</div>
	</div>
</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>My Event</h2>
            <br>
            <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tempat</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            @foreach($events as $evt)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td><a href="eventku/{{$evt->id}}">{{$evt->nama}}</a></td>
                    <td>{{$evt->tempat}}</td>
                    <td>{{$evt->tanggal}}</td>
                    <td><a href="myevent/edit/{{$evt->id}}" class="btn btn-success btn-sm" role="button"><i class="far fa-edit"></i> Edit</a> 
                        <a href="myevent/delete/{{$evt->id}}" onclick="return confirm('Apakah anda sudah yakin?')" class="btn btn-danger btn-sm" role="button"><i class="far fa-trash-alt"></i> Delete</a></td>
                </tr>
            @endforeach
            </table>
        </div>
    </div>
</div>
@endsection