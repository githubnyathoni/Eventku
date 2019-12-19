<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order PDF</title>
</head>
<body>
    <h3><strong>Eventku</strong></h3>
    <hr>
    <h4><strong>Pemesanan anda berhasil!</strong></h4>
    <p>Anda telah berhasil melakukan pemesanan untuk event:</p>
    @foreach ($order as $ord)
        <img src="uploads/event/{{$ord->gambar}}" width="720px" alt=""><br>
        <h4><strong>{{$ord->nama}} ({{$ord->promotor}})</strong></h4>
        <p>Tanggal : {{$ord->tanggal}}</p>
        <p>Jam : {{$ord->waktu}} WIB</p>
        <p>Tempat : {{$ord->tempat}}</p>
        <hr>
        <h4><strong>Order Summary (#{{$ord->id_order}})</strong></h4><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(150)->generate('Pembelian Berhasil : {{$ord->name}}')) !!} " align="right">
        <p>Nama : {{$ord->name}} (1 Tiket)</p> 
        <p>Email : {{$ord->email}}</p>
        
    @endforeach
</body>
</html>