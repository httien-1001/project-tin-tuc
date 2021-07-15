<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\PermissionRole;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.role.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Role $role)
    {

        $rules= [
            'role_name' => 'required|unique:roles,name',
            'permissions'=>'required'
        ];
        $messages=[
            'role_name.required' => 'You must enter name',
            'role_name.unique' => 'Name already exists',
            'permissions.required' => 'You must choose one',
        ];
        $request->validate($rules,$messages);
        $role_id=Role::create(['name'=> $request->role_name,])->id;
        $new_role=Role::where('id',$role_id)->first();
        $new_role->permissions()->attach($request->permissions);
        return redirect()->route('admin.role.index')->with('toast_success', 'Create Role Successfully!');

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
        $already_permissions = PermissionRole::where('role_id',$id)->pluck('permissions_id')->toArray();
        $role=Role::where('id',$id)->first();
        $permissions = Permission::all();
        return view('admin.role.edit',compact('role','permissions', 'already_permissions'));
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
            'permissions'=>'required'
        ];
        $messages=[
            'permissions.required' => 'You must choose one',
        ];
        $request->validate($rules,$messages);
        $role=Role::where('id',$id)->first();
        $role->name = empty($request->name) ? $role->name : $request->name;
        $role->save();
        $role->permissions()->sync($request->permissions);
        return redirect()->route('admin.role.index')->with('toast_success', 'Update role successful');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PermissionRole::where('role_id',$id)->delete();
        Role::where('id',$id)->delete();
        return redirect()->route('admin.role.index')->with('toast_success', 'Delete role successful');
    }
}
