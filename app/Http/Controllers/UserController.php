<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comments;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::all();
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
    public function edit($id)
    {
        $user=User::where('id',$id)->first();
        $roles=Role::all();
        $already_roles=UserRole::where('user_id',$id)->pluck('role_id')->toArray();
        return view('admin.user.edit',compact('user','roles','already_roles'));
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
            'roles'=>'required'
        ];
        $messages=[
            'roles.required' => 'You must choose one',
        ];
        $request->validate($rules,$messages);
        $user=User::where('id',$id)->first();
        $user->name = empty($request->name) ? $user->name : $request->name;
        $user->save();
        $user->roles()->sync($request->roles);
        return redirect()->route('admin.user.index')->with('success', 'Update user successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Post::where('user_id',$id)->first() ||Comments::where('user_id',$id )->first()){
            return redirect()->route('admin.role.index')->with('success', 'Cannot delete this user successful');
        }
        UserRole::where('user_id',$id)->delete();
        User::where('id',$id)->delete();
        return redirect()->route('admin.user.index')->with('success', 'Delete user successful');
    }
}
