<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

//Models
use App\Models\Site;
use App\Models\Log;
use App\Models\Post;
use App\Models\Book;
use App\Models\Location;


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

    public function fish()
    {
        return view('map.fish',[
            'locations' => [],
        ]);
    }

    //入力された生物名から検索
    public function search(Request $request)
    {

        $searchWord = '%'.$request->search_name.'%';
        $locations = Location::where('name','LIKE',$searchWord)->get();

        return view('map.fish',[
            'locations' => $locations,
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
