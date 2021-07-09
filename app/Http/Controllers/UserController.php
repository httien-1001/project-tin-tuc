<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateUserRequest;
use App\Models\Comments;
use App\Models\Post;
use App\Models\Role;
use App\Models\UserRole;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=User::where('id', '!=', 1)->paginate(30);
        $roles = Role::where('id', '!=', 1)->get();
        return view('admin.user.index',compact('data','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        //
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
    public function edit(User $user)
    {
        $already_role=$user->getRoles()->pluck('name','id')->toArray();
        $data = User::find($user->id);
        $role = Role::where('id', '!=', 1)->get();
        return view('admin.user.edit',compact('data','role','already_role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        UserRole::where('user_id',$user->id)->delete();
        $user->update($request->only('name','email'));

        if(is_array($request->role)){
            foreach($request->role as $role_id){
//                UserRole::where('user_id',$user->id)->delete();
                UserRole::create([
                    'user_id'=>$user->id,
                    'role_id'=>$role_id,]);
            }
        }
        return redirect()->route('admin.user.index')->with('toast_success', 'Update Permissions Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('user_id',$id)->delete();
        Comments::where('user_id',$id)->forceDelete();
        UserRole::where('user_id',$id)->delete();
        User::where('id',$id)->delete();
        return redirect()->route('admin.user.index')->with('toast_success', 'Delete User Successfully!');
    }
}
