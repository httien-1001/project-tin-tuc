<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if (Auth::check()){
            $user=User::where('id',Auth::id())->first();
            foreach ($user->roles as $role){
                if($role->name=='Admin') return redirect()->route('admin.index');
            }
        }
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
