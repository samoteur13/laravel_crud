<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function create() : View
    {
        return view('infos');
    }

    
}
