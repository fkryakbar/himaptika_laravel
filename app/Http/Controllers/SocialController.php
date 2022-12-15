<?php

namespace App\Http\Controllers;

use App\Models\SocialModel;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public static function index()
    {
        return view('blog.social', ['data' => SocialModel::latest()->get()]);
    }
}
