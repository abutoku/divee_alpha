<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuddyController extends Controller
{
    //
    public function index()
    {
        return view('buddy.index');
    }
}
