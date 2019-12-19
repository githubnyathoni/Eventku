<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListEventController extends Controller
{
    //
    public function index()
    {
        $events = \App\Event::all();
        return view('list',['events' => $events]);
    }
}
