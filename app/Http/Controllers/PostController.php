<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;

use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    //
    public function index()
   {

         $categories = Category::all();
       //$posts = Post::latest()->approved()->published()->paginate(6);
       $posts = Post::latest()->paginate(3);
       return view('posts',compact('posts','categories'));
   }
   public function details($slug)
   {
      // $post = Post::where('slug',$slug)->approved()->published()->first();
      $post = Post::where('slug',$slug)->first();
      $categories = Category::all();

       $blogKey = 'blog_' . $post->id;

       if (!Session::has($blogKey)) {
           $post->increment('view_count');
           Session::put($blogKey,1);
       }

       //$randomposts = Post::approved()->published()->take(3)->inRandomOrder()->get();
       $randomposts = Post::take(3)->inRandomOrder()->get();
       return view('post',compact('post','randomposts', 'categories'));

   }

   public function postByCategory($slug)
   {
       $category = Category::where('slug',$slug)->first();
       //$posts = $category->posts()->approved()->published()->get();
       $posts = $category->posts()->get();
       return view('category',compact('category','posts'));
   }

   public function postByTag($slug)
   {
       $tag = Tag::where('slug',$slug)->first();
       //$posts = $tag->posts()->approved()->published()->get();
       $posts = $tag->posts()->get();
       return view('tag',compact('tag','posts'));
   }

}
