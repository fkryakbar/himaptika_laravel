<?php

namespace App\Http\Controllers;

use App\Models\BlogsModel;
use App\Models\CommentModel;
use App\Models\SocialModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public static function index()
    {
        return view('dashboard.index', [
            'blogs' => BlogsModel::all(),
            'comment' => CommentModel::all(),
            'social' => SocialModel::all()

        ]);
    }


    public static function login()
    {
        return view('dashboard.login');
    }



    public static function attempt_login(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->with('loginFailed', 'Login Gagal');
    }


    public static function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }


    public static function list_blog()
    {

        return view('dashboard.list_blog', [
            'blogs' => BlogsModel::all()
        ]);
    }

    public static function add_blog()
    {
        return view('dashboard.add_blog');
    }


    public static function submit_blog(Request $request)
    {
        $credentials = $request->validate([
            'slug' => 'unique:blogs|required|max:255',
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'image' => 'file|mimes:jpg,jpeg,png,gif|max:500|required',
            'content' => 'required'
        ]);

        $path =  $request->file('image')->store('storage');

        $check = BlogsModel::create([
            'slug' => $request->slug,
            'title' => $request->title,
            'image_path' => $path,
            'description' => $request->description,
            'content' => $request->content,
            'author' => 'Admin',
            'views' => 0
        ]);

        return redirect('/dashboard/blog')->with('msg', 'Blog berhasil disubmit');
    }

    public static function delete_blog($id)
    {
        $blog = BlogsModel::findOrFail($id);

        Storage::delete($blog->image_path);
        $blog->delete();

        return redirect('/dashboard/blog')->with('msg', 'Blog berhasil dihapus');
    }

    public static function edit_blog($id)
    {
        return view('dashboard.edit_blog', [
            'blog' => BlogsModel::findOrFail($id)
        ]);
    }


    public static function save_blog($id, Request $request)
    {
        if ($request->file('image')) {
            $credentials = $request->validate([
                'title' => ['required', 'max:255'],
                'description' => ['required', 'max:255'],
                'image' => 'file|mimes:jpg,jpeg,png,gif|max:500|required',
                'content' => 'required'
            ]);

            $old_image = BlogsModel::find($id);
            $old_image = $old_image->image_path;
            Storage::delete($old_image);

            $path =  $request->file('image')->store('storage');

            $blog = BlogsModel::find($id);

            $check = $blog->update([
                'title' => $request->title,
                'image_path' => $path,
                'description' => $request->description,
                'content' => $request->content,
                'author' => 'Admin',
                'views' => 0
            ]);
            return redirect('/dashboard/blog')->with('msg', 'Blog berhasil diedit');
        } else {
            $credentials = $request->validate([
                'title' => ['required', 'max:255'],
                'description' => ['required', 'max:255'],
                'content' => 'required'
            ]);

            $blog = BlogsModel::find($id);

            $check = $blog->update([
                'title' => $request->title,
                'description' => $request->description,
                'content' => $request->content,
                'author' => 'Admin',
                'views' => 0
            ]);
            return redirect('/dashboard/blog')->with('msg', 'Blog berhasil diedit');
        }
    }

    public function list_komentar()
    {
        return view('dashboard.list_komentar', [
            'comments' => CommentModel::latest()->get()
        ]);
    }


    public function delete_comment($id)
    {
        CommentModel::findOrFail($id)->delete();
        return redirect('/dashboard/komentar')->with('msg', 'komentar berhasil dihapus');
    }

    public function list_pengumuman()
    {
        return view('dashboard.list_pengumuman', [
            'socials' => SocialModel::latest()->get()
        ]);
    }

    public function submit_pengumuman()
    {
        return view('dashboard.submit_pengumuman');
    }

    public static function add_pengumuman(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'link' => 'required|max:255'
        ]);


        SocialModel::create([
            'judul' => $request->judul,
            'link' => $request->link
        ]);
        return redirect('/dashboard/pengumuman')->with('msg', 'Pengumuman berhasil ditambahkan');
    }

    public static function delete_pengumuman($id)
    {
        SocialModel::findOrFail($id)->delete();
        return redirect('/dashboard/pengumuman')->with('msg', 'Pengumuman berhasil dihapus');
    }

    public static function edit_pengumuman($id)
    {
        return view('dashboard.edit_pengumuman', [
            'pengumuman' => SocialModel::findOrFail($id)
        ]);
    }

    public static function save_pengumuman($id, Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'link' => 'required|max:255'
        ]);


        SocialModel::findOrFail($id)->update([
            'judul' => $request->judul,
            'link' => $request->link
        ]);

        return redirect('/dashboard/pengumuman')->with('msg', 'Pengumuman berhasil diedit');
    }
}
