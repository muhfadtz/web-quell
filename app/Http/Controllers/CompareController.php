<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompareController extends Controller
{
    //

    public function index(Request $request)
    {
        return view('compare')->with('title', 'compare');
    }
}
