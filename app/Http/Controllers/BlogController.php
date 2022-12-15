<?php

namespace App\Http\Controllers;

use App\Models\BlogsModel;
use App\Models\CommentModel;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public static function curl($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $res = curl_exec($curl);
        curl_close($curl);
        return json_decode($res, 1);
    }

    public static function index(Request $request)
    {
        $video = self::curl('https://www.googleapis.com/youtube/v3/search?key=AIzaSyBaGbmB-4iq7hgRiAw2Ammrd2lBtM_jkeo&channelId=UCyH0YbfXsGONS1qxVLnkUMA&maxResults=1&order=date&part=snippet');

        if (isset($video["items"][0]['id']['videoId'])) {
            $videoid = $video["items"][0]['id']['videoId'];
        } else {
            $videoid = 'pdyaUJPcK_Q';
        }
        $data = BlogsModel::latest()->paginate(5);

        if (isset($request->search)) {
            $data = BlogsModel::where('slug', 'LIKE', '%' . $request->search . '%')->orWhere('title', 'LIKE', '%' . $request->search . '%')->orWhere('content', 'LIKE', '%' . $request->search . '%')->paginate(5);
        }




        return view('blog.blog', [
            'blogs' => $data,
            'videoid' => $videoid,
            'random_blogs' => BlogsModel::all()->random(4)
        ]);
    }


    public static function getslug($slug)
    {
        $video = self::curl('https://www.googleapis.com/youtube/v3/search?key=AIzaSyBaGbmB-4iq7hgRiAw2Ammrd2lBtM_jkeo&channelId=UCyH0YbfXsGONS1qxVLnkUMA&maxResults=1&order=date&part=snippet');

        if (isset($video["items"][0]['id']['videoId'])) {
            $videoid = $video["items"][0]['id']['videoId'];
        } else {
            $videoid = 'pdyaUJPcK_Q';
        }
        $blog = BlogsModel::where('slug', '=', $slug)->get();

        return view('blog.view_blog', [
            'random_blogs' => BlogsModel::all()->random(4),
            'videoid' => $videoid,
            'blog' => $blog,
            'comments' => CommentModel::where('slug', '=', $slug)->orderBy('id', 'desc')->get()
        ]);
    }
}
