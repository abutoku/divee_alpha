<?php

use Illuminate\Support\Facades\Route;

//Loginコントローラーの読み込み
use App\Http\Controllers\Auth\LoginController;
//Profileコントローラーの読み込み
use App\Http\Controllers\ProfileController;
//Postコントローラーの読み込み
use App\Http\Controllers\PostController;
//Profileコントローラーの読み込み
use App\Http\Controllers\PictureController;
//Commentコントローラーの読み込み
use App\Http\Controllers\CommentController;
//Favoriteコントローラーの読み込み
use App\Http\Controllers\FavoriteController;
//Logコントローラーの読み込み
use App\Http\Controllers\LogController;
//Bookコントローラーの読み込み
use App\Http\Controllers\BookController;
//Mapコントローラーの読み込み
use App\Http\Controllers\MapController;
//Mapコントローラーの読み込み
use App\Http\Controllers\SiteController;


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
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Postにfavorit追加のルート
Route::post('post/{post}/favorites', [FavoriteController::class, 'store'])->name('favorites');
//Postのfavorit解除のルート
Route::post('post/{post}/unfavorites', [FavoriteController::class, 'destroy'])->name('unfavorites');

//my log のルート
Route::get('/post/mypage', [PostController::class, 'mydata'])->name('post.mypage');
//Postコントローラーのルート
Route::resource('post', PostController::class);

//Profileコントローラーのルート
Route::resource('profile', ProfileController::class);

//サムネイル変更のルート
Route::post('picture/{picture}/change', [PictureController::class,'change'])
->name('picture.change');
//Pictureコントローラーのルート
Route::resource('picture', PictureController::class);

//comment storeへのルート
Route::post('post/{post}/comment', [CommentController::class,'store'])
->name('comment.store');
//comment destroyへのルート
Route::delete('comment/{comment}', [CommentController::class,'destroy'])
->name('comment.destroy');

//Logコントローラーのルート
Route::resource('log', LogController::class);
//Bookコントローラーのルート
Route::resource('book', BookController::class);
//Siteコントローラーのルート
Route::resource('site', SiteController::class);

//Map画面表示のルート（生物）
Route::get('/map/view', [MapController::class, 'view'])->name('map.view');
//Map画面表示のルート（投稿記事）
Route::get('/map/post', [MapController::class, 'post'])->name('map.post');



});//ユーザー認証ここまで


Route::get('/', function () {
    return view('welcome');
});


require __DIR__.'/auth.php';
