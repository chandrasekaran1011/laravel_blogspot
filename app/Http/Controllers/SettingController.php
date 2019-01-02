<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\setting;
use Session;

class SettingController extends Controller
{
    public function update(Request $request)
    {

    	$setting=setting::first();

    	return view('admin.setting.setting')->with('setting',$setting);
    }

    public function edit(Request $request){

    	$setting=setting::first();

    	$this->validate($request,[
    		'site_name'=>'required',
    		'address'=>'required',
    		'contact_email'=>'required|email',
    		'contact_number'=>'required'


    	]);

    	$setting->site_name=$request->site_name;
    	$setting->address=$request->address;
    	$setting->contact_number=$request->contact_number;
    	$setting->contact_email=$request->contact_email;

    	$setting->save();

    	Session::flash('success','Settings edited');
    	return redirect(route('setting.update'));
    	
    }
}
