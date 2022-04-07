<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Validator
use Illuminate\Support\Facades\Validator;
//認証
use Illuminate\Support\Facades\Auth;

//Models
use App\Models\Divemap;

class DivemapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('divemap.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('divemap.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // バリデーション
        $validator = Validator::make($request->all(), [
            'map_name' => 'required',
            'map_image' => 'required|file|image',
        ]);

        // バリデーション:エラー
        if ($validator->fails()) {
            return redirect()
                ->route('divemap.create')
                ->withInput()
                ->withErrors($validator);
        }

        //リクエストファイルの画像を取得
        $upload_image = $request->file('map_image');

        //画像をpublic直下のuploadsに保存し$pathにパスを取得
        $path = $upload_image->store('uploads', "public");

        if($path){
            // DBに登録
            $data = $request->merge(['image' => $path])->all();
            $result = Divemap::create($data);
        }

        return redirect()
            ->route('divemap.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
