<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
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

//        if(Auth::user()->isAdmin()){
            $posts=Post::paginate(20);
//        } else {
//            $posts=Post::where('user_id',Auth::id())->paginate(10);
//        }
        return view('admin.post.index',compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules= [
            'post_title'=>'required',
            'post_description'=>'required',
            'post_content'=>'required',
            'profile_image'=>'required',
        ];
        $messages=[
            'post_title.required' => 'You must  enter this field',
            'post_description.required' => 'You must  enter this field',
            'post_content.required' => 'You must  enter this field',
            'profile_image.required' => 'You must  enter this profile image',
        ];
        $request->validate($rules,$messages);
        if($request->hasFile('profile_image')){
            $this->validate($request,
                [
                    'profile_image' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ],
                [
                    'profile_image.mimes' => 'Only accept file type .jpg .jpeg .png .gif',
                    'profile_image.max' => 'Size of picture must smaller than 2MB',
                ]
            );

            $profile_image = $request->file('profile_image');
            $profile_name=time().'_'.$profile_image->getClientOriginalName();
            $destinationPath = public_path('uploads');
            $profile_image->move($destinationPath, $profile_name);
        }

        $flag = Post::create([
            'user_id'=> $request->user_id,
            'category_id'=> $request->category_id,
            'title'=> $request->post_title,
            'content'=> $request->post_content,
            'description'=> $request->post_description,
            'cover_image' => $profile_name,
            'status' => $request->status
        ]);
        if($flag){
            return redirect()->route('admin.post.index')->with('success', 'New Post Created Successfully!');
        }
        return redirect()->back()->with('success ', 'Error');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        if(Auth::id()==$post->user_id){
            return view('admin.post.edit',compact('post','categories'));
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
        $rules= [
            'post_title'=>'required',
            'post_description'=>'required',
            'post_content'=>'required',
        ];
        $messages=[
            'post_title.required' => 'You must  enter this field',
            'post_description.required' => 'You must  enter this field',
            'post_content.required' => 'You must  enter this field',
        ];
        $request->validate($rules,$messages);
        if($request->hasFile('cover_image')){
            $old_file = Post::where('id',$id)->get()->pluck('cover_image');
            if($old_file[0] != null && file_exists(public_path('uploads/'.$old_file))){
                unlink(public_path('uploads/'.$old_file));
            }
            $profile_image = $request->file('cover_image');
            $profile_name=time().'_'.$profile_image->getClientOriginalName();
            $destinationPath = public_path('uploads');
            $profile_image->move($destinationPath, $profile_name);
            Post::where('id',$id)->update([
                'cover_image' => $profile_name]);
        }
        Post::where('id',$id)->update([
            'user_id'=> $request->user_id,
            'category_id' => $request-> category_id,
            'title'=> $request->post_title,
            'content'=> $request->post_content,
            'description'=> $request->post_description,
            'status' => $request->status
        ]);

            return redirect()->route('admin.post.index')->with('success', 'Update Post Successfully!');
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
        return redirect()->route('admin.post.index')->with('success', 'Delete Post Successfully!');
    }
}
