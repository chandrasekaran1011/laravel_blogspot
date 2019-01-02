<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use User;
use Auth;
use Profile;
use Session;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('admin.user.profile')->with('users',Auth::user());
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request)
    {
       $user=Auth::User();
       $this->validate($request,[
        'name'=>'required',
        'email'=>'|required|email|unique:users,email,'.$user->id,
        'facebook'=>'required|url',
        'youtube'=>'required|url',

       ]);

      

        if($request->has('password')){
             $this->validate($request,[

             'password'=>'alpha_dash|min:8'
             ]);
        


            $user->password=bcrypt($request->password);

        }


       if($request->hasFile('avatar')){

        $avatar=$request->avatar;
        $new_name=time().$avatar->getClientOriginalName();

        $avatar->move('/uploads/avatars',$new_name);

        $user->profile->avatar='/uploads/avatars'.$new_name;

        $user->profile->save();
        }

    $user->name=$request->name;
    $user->email=$request->email;
    $user->profile->about=$request->about;
    $user->profile->facebook=$request->facebook;
    $user->profile->youtube=$request->youtube;


    $user->save();
    $user->profile->save();

    Session::flash('success','Profile edited');

    return redirect(route('home'));

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
