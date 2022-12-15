<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GebyarController extends Controller
{
    public static function index()
    {
        return view('blog.gm');
    }
}
