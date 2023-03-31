<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function show($n): View
    {
        return view('article')->with('numero', $n);
    }
}
