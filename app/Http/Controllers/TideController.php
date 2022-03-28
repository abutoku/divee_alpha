<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TideController extends Controller
{
    public function info(){

        $year = 2022;
        $pc = 40;

        $client = new Client();
        $response = $client->post("https://api.tide736.net/get_tide.php?pc={$pc}&hc=19&yr={$year}&mn=03&dy=28&rg=day");
        $res = $response->getBody();
        $res = json_decode($res, true);
        dd($res['tide']);

        return view('tide.info',[
            'res' => $res
        ]);
    }
}
