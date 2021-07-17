<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts=Post::where('status',1)->paginate(10);
        return view('home',compact('posts'));
    }
    public function show($id)
    {
        $detail=Post::where('id',$id)->first();
        $posts_in_same_category=Post::where('category_id',$detail->category_id)->take(10);
        return view('detail',compact('detail','posts_in_same_category'));
    }
}
