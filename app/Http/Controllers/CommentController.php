<?php

namespace App\Http\Controllers;

use App\Models\CommentModel;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public static function PostComment(Request $request)
    {
        $slug = $request->path();
        $slug = explode('/', $slug);
        $slug = $slug[1];


        $request->validate([
            'name' => 'required',
            'comment' => 'required',
        ]);

        CommentModel::create([
            'slug' => $slug,
            'name' => $request->name,
            'comment' => $request->comment
        ]);

        return redirect('/blog/' . $slug);
    }
}
