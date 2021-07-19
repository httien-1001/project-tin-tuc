<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id',Auth::id())->first();
        /*dd($user->email);*/
        return view('customer.profile',compact('user'));
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
    public function store(Request $request)
    {
        $rules= [
            'profile_image'=>'required',
        ];
        $messages=[
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
            User::where('id',$request->user_id)->update(['cover_image' => $profile_name]);
            return back()->with('success','Update profile successfully');
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
        $rules= [
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ];
        $messages=[
            'current_password.required' => 'You must  enter your current password',
            'new_password.required' => 'You must  enter your new password',
        ];
        $request->validate($rules,$messages);
        User::find(auth()->user()->id)->update(['password'=> bcrypt($request->new_password)]);
        return back()->with('success','Update password successfully');
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
