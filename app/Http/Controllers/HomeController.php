<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     /*
    public function __construct()
    {
        $this->middleware('auth');
    }
    */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categories = Category::all();
      //$tags = Tag::all();
      //$posts = Post::latest()->approved()->published()->take(6)->get();
      $posts = Post::latest()->take(6)->get();
      return view('welcome',compact('categories','posts'));
    }

}
