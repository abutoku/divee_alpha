<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Siterモデルの読み込み
use App\Models\Site;

class MapController extends Controller
{

    public function view()
    {
        $sites = Site::all();
        return view('map.view', [
            'sites' => $sites
        ]);
    }

    public function post()
    {
        return view('map.post');
    }

}
