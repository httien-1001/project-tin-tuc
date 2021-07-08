<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Comments;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserRole;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        if(Auth::user()->isAdmin()){
            $posts=Post::all();
        } else {
            $posts=Post::where('user_id',Auth::id())->get();
        }
        return view('admin.post.index',compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        if ($request->file('cover_image')){
            $file_name = $request->file('cover_image')->getClientOriginalName();
            $request->file('cover_image')->move(public_path('/uploads'),$file_name);
        }
        $flag=Post::create([
            'user_id'=> $request->user_id,
            'title'=> $request->post_title,
            'content'=> $request->post_content,
            'cover_image' => $file_name
        ]);
        if($flag){
            return redirect()->route('admin.post.index')->with('toast_success', 'New Post Created Successfully!');
        }
        return redirect()->route('admin.post.index')->with('toast_error ', 'Error');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post_id=$id;
        return view('admin.post.index',compact('post_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Post::find($id);
        if(Auth::id()==$data->user_id){
            return view('admin.post.edit',compact('data'));
        }
        return abort('403');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*if ($request->file('cover_image')->isValid()){
            $file_name = $request->file('cover_image')->getClientOriginalName();
            $request->file('cover_image')->move(public_path('/uploads'),$file_name);
        }*/
        $flag=Post::where('id',$id)->update([
            'user_id'=> $request->user_id,
            'title'=> $request->post_title,
            'content'=> $request->post_content,
            /*'cover_image' => $file_name*/
        ]);
        if($flag){
            return redirect()->route('admin.post.index')->with('toast_success', 'Update Post Successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('id',$id)->delete();
        return redirect()->route('admin.post.index')->with('toast_success', 'Delete Post Successfully!');
    }
}
