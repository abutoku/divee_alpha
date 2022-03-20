<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Storegeの読み込み
use Illuminate\Support\Facades\Storage;

//Validatorの読み込み
use Illuminate\Support\Facades\Validator;
//認証の読み込み
use Illuminate\Support\Facades\Auth;
//userモデルの読み込み
use App\Models\User;
//Logモデルの読み込み
use App\Models\Log;
//Bookモデルの読み込み
use App\Models\Book;
//Siterモデルの読み込み
use App\Models\Site;
use Monolog\Handler\NullHandler;



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
        $sites = Site::all();
        //log.create（登録ページ）を表示
        return view('log.create', [
            'sites' => $sites
        ]);
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
            'site_id' => 'required',
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

        //booksテーブルから、生物名とユーザーIDが一致しているものを取得(なければ作成)
        $book = Book::firstOrCreate([
        'fish_name' => $request->name,
        'user_id' => Auth::user()->id ]);

        //画像が有り、無し場合の分岐
        if($request->image_data !== null) {

            $upload_image = $request->file('image_data');

            //画像をpublic直下のuploadsに保存し$pathにパスを取得
            $path = $upload_image->store('uploads', "public");
            $data = $request->merge([
                'user_id' => Auth::user()->id ,
                'image' => $path,
                'book_id' => $book->id ])->all();

            //bookに画像が登録されていない場合は登録
            if ($book->picture == null){
                    $book->picture = $path;
                    $book->save();
            }

        } else {
            // 編集 フォームから送信されてきたデータとユーザIDをマージし，DBにinsertする
            //Auth::user()->idで現在ログインしているユーザの ID を取得することができる
            //Auth::user()には他にもデータが入っている
            $data = $request->merge([
                'user_id' => Auth::user()->id,
                'book_id' => $book->id ])->all();
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
        //ログの画像を取得
        $path = Log::find($id)->image;
        //画像のパスがある場合は、ストレージから削除
        if($path !== 'null'){
                Storage::disk('public')->delete($path);
        }

        //log_tableからidが一致しているものを削除
        $result = Log::find($id)->delete();
        //log.indexへ戻る
        return redirect()->route('log.index');
    }


}
