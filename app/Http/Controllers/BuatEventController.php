<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Event;

class BuatEventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('buat');
    }

    public function store(Request $request)
    {
        $event = new Event();
        
        $event->id_user= $request->input('id_user');
        $event->nama = $request->input('nama');
        $event->deskripsi = $request->input('deskripsi');
        $event->promotor = $request->input('promotor');
        $event->tanggal = $request->input('tanggal');
        $event->waktu = $request->input('waktu');
        $event->tempat = $request->input('tempat');
        $event->gambar = $request->input('gambar');

        if($request->hasfile('gambar')){
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/event',$filename);
            $event->gambar = $filename;
        }else{
            return $request;
            $event->gambar = '';
        }
        $event->save();
        return redirect('buat')->with('status', 'Mantap! Event kamu sudah berhasil dibuat nih');
    }
}
