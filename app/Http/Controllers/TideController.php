<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Weidner\Goutte\GoutteFacade as GoutteFacade;
use GuzzleHttp\Client;
use Carbon\Carbon;

//Model
use App\Models\Setdata;

class TideController extends Controller
{
    public function info(){

        //今日の日付を取得
        $today = Carbon::now()->format("Y-m-d");

        //データを取得
        $data = Setdata::find(1);

        //apiのパラメーターをセット
        $pc = $data->pc;
        $hc = $data->hc;
        $year = Carbon::now()->format("Y");
        $month = Carbon::now()->format("m");
        $day = Carbon::now()->format("d");

        $client = new Client();
        $response = $client->post("https://api.tide736.net/get_tide.php?pc={$pc}&hc={$hc}&yr={$year}&mn={$month}&dy={$day}&rg=day");

        //情報を受け取り
        $res = $response->getBody();
        $res = json_decode($res, true);

        //潮の情報を取得
        $tide = $res['tide']['chart']["{$today}"];
        //ポイント名
        $name = $data->site_name;
        //現在の水温
        $temp = $data->temp;
        //グラフのデータセット
        $num = [
            $data->jan,
            $data->feb,
            $data->mar,
            $data->apr,
            $data->may,
            $data->jun,
            $data->jul,
            $data->aug,
            $data->sep,
            $data->aug,
            $data->nov,
            $data->dec,
        ];

        return view('tide.info',[
            'tide' => $tide,
            'name' => $name,
            'temp' => $temp,
            'num' => $num,
        ]);
    }

    public function change(){
    //
    }


}
