<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Storege
use Illuminate\Support\Facades\Storage;

//Validator
use Illuminate\Support\Facades\Validator;
//認証
use Illuminate\Support\Facades\Auth;

//Model
use App\Models\User;
use App\Models\Log;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //----3/24 livewire 移行----------------------------------------------

        // Userモデルに定義したmybooks関数を実行し、結果を$booksに受け取る
        // $books = User::find(Auth::user()->id)->mybooks;
        // return view('book.index', [
        //     'books' => $books
        // ]);
        return view('book.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    //生物名リアルタイム検索
    // public function search(Request $request)
    // {
    //     $books = Book::where('user_id',Auth::user()->id)
    //         ->where('fish_name', 'like', '%'.$request->searchword.'%')->get();
    //     return response()->json($books);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        
        //logからuser_idとbook_idが一致しているものを取得
        $logs = Log::where('user_id',Auth::user()->id)
                    ->where('book_id',$id)->get();

        return view('book.show', [
            'book' => $book,
            'logs' => $logs,
        ]);

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
