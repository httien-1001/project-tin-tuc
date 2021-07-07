<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Route;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Role::simplePaginate(10);
        return view('admin.role.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $routes = [];
        foreach (Route::getRoutes() as $route){
            $name = $route ->getName();
            $check_include_admin = strpos($name,'admin');
            $check_include_customer = strpos($name,'customer');
            if($check_include_admin !== false || $check_include_customer !== false){
                array_push($routes, $route->getName());
            }
        }
        return view('admin.role.create',compact('routes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $route = json_encode($request->route);
        Role::create(['name'=> $request->name, 'permissions'=>$route]);
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $routes = [];
        foreach (Route::getRoutes() as $route){
            $name = $route ->getName();
            $check_include_admin = strpos($name,'admin');
            $check_include_customer = strpos($name,'customer');
            if($check_include_admin !== false || $check_include_customer !== false){
                array_push($routes, $route->getName());
            }
        }

        return view('admin.role.edit',compact('id','routes'));
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

        return redirect()->route('admin.role.index')->with('toast_success', 'Update Role Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($id==0 || $id ==1 ){
            return redirect()->route('admin.role.index')->with('toast_error', 'Cannot delete this role');
        }
        Role::where('id',$id)->delete();
            return redirect()->route('admin.role.index')->with('toast_success', 'Delete role successful');
    }
}
