<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Category;

use App\Tag;

use Illuminate\Support\Facades\Session;

class PostController extends Controller
{

    public function index()
    {
       $posts = Post::latest()->approved()->published()->paginate(6);
        return view('posts',compact('posts'));
    }






    public function details($slug)
    {

   $post=Post::where('slug',$slug)->first();
//   ....................view count using session.................
        $blogKey = 'blog_'. $post->id;
        if (!Session::has($blogKey)) {
            $post->increment('view_count');
            Session::put($blogKey,1);
        }
        $randoposts = Post::approved()->published()->take(3)->inRandomOrder()->get();
        return view('post',compact('post','randoposts'));

    }
//


    public function postByCategory($slug)
    {
        $category = Category::where('slug',$slug)->first();
        $posts = $category->posts()->approved()->published()->get();
        return view('category',compact('category','posts'));
    }

    public function postByTag($slug)
    {
        $tag = Tag::where('slug',$slug)->first();
        $posts = $tag->posts()->approved()->published()->get();
        return view('tag',compact('tag','posts'));
    }
}
