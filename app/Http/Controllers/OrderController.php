<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Order;
use PDF;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $order = new Order();

        $order->id_user= $request->input('id_user');
        $order->id_event= $request->input('id_event');
        $order->save();
        return redirect('home')->with('status', 'Mantap! Tiket kamu sudah berhasil dipesan nih');
    }
    public function index( $id)
    {
        $order = DB::table('orders')
                ->join('events', function ($join) use($id) {
                    $join->on('orders.id_event', '=', 'events.id')
                        ->where('orders.id_order', '=', $id);
                })
                ->join('users', function ($join) use($id) {
                    $join->on('orders.id_user', '=', 'users.id')
                        ->where('orders.id_order', '=', $id);
                })
                ->get();

        return view('order')->with('order', $order);
    }
    public function cetak_pdf($id)
    {
        $order = DB::table('orders')
                ->join('events', function ($join) use($id) {
                    $join->on('orders.id_event', '=', 'events.id')
                        ->where('orders.id_order', '=', $id);
                })
                ->join('users', function ($join) use($id) {
                    $join->on('orders.id_user', '=', 'users.id')
                        ->where('orders.id_order', '=', $id);
                })
                ->get();
        $pdf = PDF::loadview('order_pdf',['order'=>$order]);
        set_time_limit(300);
        return $pdf->download('Eventku - Tiket.pdf');
    }
}
