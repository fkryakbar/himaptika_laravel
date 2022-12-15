<?php

namespace App\Http\Controllers;

use App\Models\BlogsModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $data = BlogsModel::latest()->limit(3)->get();
        return view('blog.home', [
            'data' => $data
        ]);
    }
}
