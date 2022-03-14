<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Validatorの読み込み
use Illuminate\Support\Facades\Validator;
//認証の読み込み
use Illuminate\Support\Facades\Auth;
//userモデルの読み込み
use App\Models\User;
//Logモデルの読み込み
use App\Models\Log;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //log.index（一覧ページ）を表示
        return view('log.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //log.create（登録ページ）を表示
        return view('log.create');
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
            'date' => 'required',
            'name' => 'required',
            'divesite' => 'required',
            'temp' => 'required',
            'depth' => 'required',
        ]);

        // バリデーション:エラー
        if ($validator->fails()) {
            return redirect()
                ->route('log.create')
                ->withInput()
                ->withErrors($validator);
        }

        // dd($request->image);



        // 編集 フォームから送信されてきたデータとユーザIDをマージし，DBにinsertする
        //Auth::user()->idで現在ログインしているユーザの ID を取得することができる
        //Auth::user()には他にもデータが入っている
        $data = $request->merge(['user_id' => Auth::user()->id])->all();
        // 戻り値は挿入されたレコードの情報
        // create()は最初から用意されている関数
        if($request->image !== null) {
            $upload_image = $request->file('image');
            //画像をpublic直下のuploadsに保存し$pathにパスを取得
            $path = $upload_image->store('uploads', "public");
            // $data->image = $path;
        }
        
        dd($data);
        $result = Log::create($data);

        // ルーティング「log.index」にリクエスト送信（一覧ページに移動）
        return redirect()->route('log.index');
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
