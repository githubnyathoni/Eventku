@extends('layouts.app')

@section('scripts')
	<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
	<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( ".datepicker" ).datepicker({
                changeMonth: true,
                changeYear: true
            });
        });
	</script>
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
				<div class="card-header">Update Event</div>
					<div class="card-body">
						<form action="{{ route('update') }}" method="POST" enctype="multipart/form-data">
							{{{ csrf_field() }}}
                            @foreach($events as $evt)
                            <input type="hidden" name="id" class="form-control" value="{{$evt->id}}">
							<div class="form-group">
								<label>Nama Acara</label>
								<input type="text" name="nama" id="validationTooltip01" class="form-control" value="{{$evt->nama}}" required>
							</div>
							<div class="form-group">
								<label>Deskripsi</label>
								<textarea name="deskripsi" class="form-control" rows="3" required>{{$evt->deskripsi}}</textarea>
							</div>
							<div class="form-group">
								<label>Promotor</label>
								<input name="promotor" type="text" class="form-control" value="{{$evt->promotor}}" required>
							</div>
							<div class="form-group">
								<label>Tanggal</label>
								<input class="form-control" name="tanggal" type="date" value="{{$evt->tanggal}}" required>
							</div>
							<div class="form-group">
								<label>Waktu</label>
								<input name="waktu" id="timepicker" value="{{$evt->waktu}}" required/>
								<script>
									$('#timepicker').timepicker({
										uiLibrary: 'bootstrap4'
									});
								</script>
							</div>
							<div class="form-group">
								<label>Tempat</label>
								<input type="text" name="tempat" class="form-control" value="{{$evt->tempat}}" required>
							</div>
							<label>Gambar</label>
							<div class="input-group">
								<div class="custom-file">
									<input accept="image/*" type="file" name="gambar" class="custom-file-input" required>
									<label class="custom-file-label">Pilih File</label>
								</div>
							</div>
                            <br>
                            @endforeach
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
								Submit
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
											<button type="submit" class="btn btn-primary">Submit</button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
            	</div>
            </div>
        </div>
    </div>
</div>
@endsection