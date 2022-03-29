<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Validator
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
}
