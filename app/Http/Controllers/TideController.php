<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;
use Carbon\Carbon;

class TideController extends Controller
{
    public function info(){

        //今日の日付を取得
        $today = Carbon::now()->format("Y-m-d");

        //値をセット
        $pc = 40;
        $hc = 19;
        $year = Carbon::now()->format("Y");
        $month = Carbon::now()->format("m");
        $day = Carbon::now()->format("d");

        $client = new Client();
        $response = $client->post("https://api.tide736.net/get_tide.php?pc={$pc}&hc={$hc}&yr={$year}&mn={$month}&dy={$day}&rg=day");

        //情報を受け取り
        $res = $response->getBody();
        $res = json_decode($res, true);

        //潮の情報のみ取得
        $tide = $res['tide']['chart']["{$today}"];

        return view('tide.info',[
            'tide' => $tide
        ]);
    }
}
