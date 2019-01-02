<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\setting;
use App\category;
use App\post;
use App\Tag;

class FrontEndController extends Controller
{
    public function index(){

    	$max_category_id=post::select('category_id', DB::raw('count(*) as total'))->groupBy('category_id')->orderBy('total','desc')->first();

    	$max_category_id=$max_category_id->category_id;
    	$maxcat_name=category::where('id',$max_category_id)->first()->name;


    	

    	return view('welcome')
    				->with('title',setting::first())
    				->with('categories',category::all()->take(5))
    				->with('first_post',post::orderBy('created_at','desc')->first())
    				->with('second_post',post::orderBy('created_at','desc')->skip(1)->take(2)->get())
    				->with('maxcat_post',post::where('category_id',$max_category_id)->orderBy('created_at','desc')->get())
    				->with('maxcat_name',$maxcat_name);	

    }

    public function singlePost($slug){

    		$post=post::where('slug',$slug)->first();

    		$next_id=post::where('id','>',$post->id)->min('id');
    		$prev_id=post::where('id','<',$post->id)->max('id');



    		return view('single')->with('post',$post)
    							->with('title',setting::first())
    							->with('categories',category::all()->take(5))
    							->with('next',post::find($next_id))
    							->with('prev',post::find($prev_id));



    }


    Public function categoryPost($id){

    	$category=category::find($id);

    	return view('category')->with('category',$category)
    						   ->with('title',setting::first())
    						   ->with('categories',category::all()->take(5));

    }

        Public function tagPost($id){

    	$tag=Tag::find($id);
    		
    	return view('tag')->with('tag',$tag)
    						   ->with('title',setting::first())
    						   ->with('categories',category::all()->take(5));

    }
}
