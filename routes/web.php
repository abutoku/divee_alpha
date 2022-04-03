<?php

use Illuminate\Support\Facades\Route;

use Carbon\Carbon;

//Controller
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TideController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SetdataController;
use App\Http\Controllers\BuddyController;
use App\Http\Controllers\SettingController;

//認証
use Illuminate\Support\Facades\Auth;

//Model
use App\Models\Location;
use App\Models\Buddy;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//ユーザー認証されていないと表示されない設定
Route::group(['middleware' => 'auth'], function () {

Route::get('/', function () {
    return redirect('dashboard');
});

Route::get('/dashboard', function () {
    //未読通知
    $notice = Buddy::where('buddy_id',Auth::user()->id)
                    ->where('is_checked',false)
                    ->count();

    return view('dashboard',[
        'notice' => $notice,
    ]);
})->middleware(['auth'])->name('dashboard');

//Postにfavorit追加のルート
Route::post('post/{post}/favorites', [FavoriteController::class, 'store'])->name('favorites');
//Postのfavorit解除のルート
Route::post('post/{post}/unfavorites', [FavoriteController::class, 'destroy'])->name('unfavorites');

//my log のルート
Route::get('/post/mypage', [PostController::class, 'mydata'])->name('post.mypage');

Route::resource('post', PostController::class);

//ステータス画面切り替え
Route::get('/profile/{profile}/list', [ProfileController::class,'list'])
->name('profile.list');

Route::get('/profile/{profile}/cover', [ProfileController::class,'cover'])
->name('profile.cover');

Route::patch('/profile/{profile}/cover', [ProfileController::class,'coverchange'])
->name('profile.coverchange');

Route::resource('profile', ProfileController::class);

//サムネイル変更のルート
Route::post('picture/{picture}/change', [PictureController::class,'change'])
->name('picture.change');

Route::resource('picture', PictureController::class);

//comment storeへのルート
Route::post('post/{post}/comment', [CommentController::class,'store'])
->name('comment.store');
//comment destroyへのルート
Route::delete('comment/{comment}', [CommentController::class,'destroy'])
->name('comment.destroy');

Route::resource('log', LogController::class);

//図鑑MEMO更新
Route::get('book/{book}/memo', [BookController::class,'memo'])
->name('book.memo');

//図鑑画像変更のルート
Route::post('book/{book}/change', [BookController::class,'change'])
->name('book.change');


Route::resource('book', BookController::class);

Route::resource('site', SiteController::class);

Route::resource('setdata', SetdataController::class);

Route::resource('buddy', BuddyController::class);

//Map画面表示のルート（生物）
Route::get('/map/site', [MapController::class,'site'])->name('map.site');
//Map画面表示のルート（投稿記事）
Route::get('/map/post', [MapController::class,'post'])->name('map.post');
//Mapから選択されたポイントのログを探す
Route::post('/map/getSiteLog',[MapController::class,'getSiteLog'])->name('map.getSiteLog');
//Mapから選択されたポイントのログの一覧
Route::get('/map/show', [MapController::class,'show'])->name('map.show');
//生物名検索ページ
Route::get('/map/fish',[MapController::class,'fish'])->name('map.fish');
//生物名で検索
Route::post('/map/search',[MapController::class,'search'])->name('map.search');

//海況ページ
Route::get('/tide/info',[TideController::class,'info'])->name('tide.info');
//海況ページ、ポイント変更
Route::post('/tide/change',[TideController::class,'change'])->name('tide.change');
//設定画面
Route::get('/setting/index',[SettingController::class,'index'])->name('setting.index');
//スタッフメニュー
Route::get('/admin/index',[AdminController::class,'index'])->name('admin.index');

});
//ユーザー認証ここまで


Route::get('/', function () {
    //3日以内の投稿を取得
    $nearday = Carbon::today()->subDay(3);
    $newposts = Location::whereDate('created_at','>=',$nearday)->get();
    return view('welcome',[
        'newposts' => $newposts,
    ]);
});


require __DIR__.'/auth.php';
