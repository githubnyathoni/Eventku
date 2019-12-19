@extends('layouts.app')

@section('scripts')
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
		<div class="toast-body">Mantap! Tiket kamu berhasil dipesan.</div>
	</div>
</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                    <img src="img\event1.jpg" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Buat Event</h5>
                        <p class="card-text">Disini kamu bisa buat event sesuai hati kamu. Uyeee</p>
                        <a href="/buat" class="btn btn-primary stretched-link float-right">Buat Event</a>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                    <img src="img\event3.jpg" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">My Event</h5>
                        <p class="card-text">Disini kamu bisa melihat event yang sudah kamu buat. Uyeee</p>
                        <a href="/myevent" class="btn btn-primary stretched-link float-right">My Event</a>
                        <p class="card-text"><small class="text-muted">Last updated 2 weeks ago</small></p>
                    </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                    <img src="img\event2.jpg" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">List Event</h5>
                        <p class="card-text">Disini kamu bisa melihat list berbagai event menarik yang akan hadir di kota-kota favorit.</p>
                        <a href="/list" class="btn btn-primary stretched-link float-right">List Event</a>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
