<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Event;
use Auth;

class MyEventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $events = \App\Event::where('id_user',Auth::user()->id)->get();
        return view('myevent',['events' => $events]);
    }

    public function delete($id)
    {
        $events = \App\Event::where('id',$id)->delete();
        return redirect('/myevent');
    }
    public function edit($id)
    {
        $events = \App\Event::where('id',$id)->get();
        return view('edit')->with('events',$events);
    }
    public function update(Request $request)
    {
        $event = \App\Event::find($request->input('id'));
        
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
        }
        else{
            return $request;
            $event->gambar = '';
        }
        $event->save();
        return redirect('myevent')->with('status', 'Mantap! Event kamu sudah berhasil dibuat nih');
    }
}
