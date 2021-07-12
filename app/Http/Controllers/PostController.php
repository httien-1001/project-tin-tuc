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
            $posts=Post::paginate(10);
        } else {
            $posts=Post::where('user_id',Auth::id())->paginate(10);
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
    public function store(Request $request)
    {$this->validate($request,
        [
            //Kiểm tra giá trị rỗng
            'post_title' => 'required',
            'post_content' => 'required',
            'profile_image' => 'required'
        ],
        [
            //Tùy chỉnh hiển thị thông báo
            'post_title.required' => 'You must enter title',
            'post_content.required' => 'You must enter content',
            'profile_image.required' => 'You must choose cover picture for the post',
        ]
    );
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
            $flag = Post::create([
                'user_id'=> $request->user_id,
                'title'=> $request->post_title,
                'content'=> $request->post_content,
                'cover_image' => $profile_name
            ]);
            if($flag){
                return redirect()->route('admin.post.index')->with('toast_success', 'New Post Created Successfully!');
            }
        }
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
        $flag_1=Post::where('id',$id)->update([
            'user_id'=> $request->user_id,
            'title'=> $request->post_title,
            'content'=> $request->post_content,
        ]);
        if($flag_1){
            return redirect()->route('admin.post.index')->with('toast_success', 'Update Post Successfully!');
        } else {
            return redirect()->route('admin.post.index')->with('toast_success', 'Error Occurs');

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
