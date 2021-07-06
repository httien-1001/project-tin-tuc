<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Post::simplePaginate(50);
        return view('admin.post.index',compact('data'));
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
        /*$validator = Validator::make($request->all(), [
                'post_title' => 'required',
                'post_content' => 'required',
                'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]
        );*/
        if ($request->file('cover_image')->isValid()){
            $file_name = $request->file('cover_image')->getClientOriginalName();
            $request->file('cover_image')->move(public_path('/uploads'),$file_name);
        }

        /*if ($validator->fails()) {
            return back()->with('errors', $validator->messages()->all()[0])->withInput();

        }*/
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
