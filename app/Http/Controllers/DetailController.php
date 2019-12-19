<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
class DetailController extends Controller
{
    public function index($id)
    {
        $events = \App\Event::where('id', $id)->get();
        $order = \App\Order::where('id_user',Auth::user()->id)
                            ->where('id_event',$id)
                            ->get();
        return view('detail')->with('events', $events)->with('order', $order);
    }
}
