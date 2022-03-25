<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

//Siteモデルの読み込み
use App\Models\Site;
//Logモデルの読み込み
use App\Models\Log;
//Postモデルの読み込み
use App\Models\Post;


class MapController extends Controller
{

    public function site()
    {
        $sites = Site::all();
        return view('map.site',[
            'sites' => $sites,
        ]);
    }

    //選択されたポイントのログを探す
    public function getSiteLog(Request $request)
    {
        $logs = Log::where('site_id',$request->siteid)->get();
        return view('map.show',[
            'logs' => $logs,
        ]);
    }

    public function post()
    {
        $posts = Post::all();
        return view('map.post',[
            'posts' => $posts,
        ]);
        
    }

}
