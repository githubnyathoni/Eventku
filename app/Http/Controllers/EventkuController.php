<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EventkuController extends Controller
{
    public function index($id)
    {
        $detail = DB::table('orders')
        ->join('events', function ($join) use($id) {
            $join->on('orders.id_event', '=', 'events.id')
                ->where('orders.id_event', '=', $id);
        })
        ->join('users', function ($join) use($id) {
            $join->on('orders.id_user', '=', 'users.id')
                ->where('orders.id_event', '=', $id);
        })
        ->select('users.*','orders.created_at as tanggal_order','events.*')
        ->get();
        if(count($detail)==0)
        {
            $detail = \App\Event::where('id', $id)->get();
            return view('eventku')->with('detail',$detail);
        }
        else
        {
            return view('eventku')->with('detail', $detail);
        }
        
    }
}
