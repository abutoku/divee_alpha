<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class MapController extends Controller
{

    public function view()
    {
        return view('map.view');
    }

    public function post()
    {
        return view('map.post');
    }

}
