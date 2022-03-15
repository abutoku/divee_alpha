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
        // Userモデルに定義したmylogs関数を実行する．
        //結果を$logsに受け取る
        $logs = User::find(Auth::user()->id)->mylogs;
        //$logsをlog.indexに渡す
        return view('log.index', [
            'logs' => $logs
        ]);
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

        //画像が有り、無し場合の分岐

        if($request->image_data !== null) {

            $upload_image = $request->file('image_data');
            //画像をpublic直下のuploadsに保存し$pathにパスを取得
            $path = $upload_image->store('uploads', "public");
            $data = $request->merge(['user_id' => Auth::user()->id ,'image' => $path ])->all();

        } else {
            // 編集 フォームから送信されてきたデータとユーザIDをマージし，DBにinsertする
            //Auth::user()->idで現在ログインしているユーザの ID を取得することができる
            //Auth::user()には他にもデータが入っている
            $data = $request->merge(['user_id' => Auth::user()->id])->all();
        }

        // 戻り値は挿入されたレコードの情報
        // create()は最初から用意されている関数
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
