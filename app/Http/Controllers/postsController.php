<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\post;
use App\category;
use App\Tag;
use Auth;

use Session;

class postsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        $post=post::all();
        
        if($post->count()==0){

            Session::flash('info','No Post Found');
            return redirect()->back();
        }
        else{
            $c=category::all()->count();
            $t=Tag::all()->count();
            if($c==0 || $t==0){
                Session::flash('info','No category or Tag Found.');
                return redirect()->back();
             } 
            else{
                return view('admin.posts.index')->with('posts',post::all());
            }
        }
    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       $c=category::all()->count();
       $t=Tag::all()->count();
       if($c==0 || $t==0){
            Session::flash('info','No category or Tag Found.');
            return redirect()->back();
       } 
       else{

            return view('admin.posts.create')->with('category',category::all())
                                             ->with('tag',Tag::all());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id=Auth::id(); 
        $this->validate($request,[
            'title'=>'required',
            'featured'=>'required|image',
            'content'=>'required',
            'category'=>'required',
            'tags'=>'required']);

        
        $featured=$request->featured;
        $new_name=time().$featured->getClientOriginalName();
        $featured->move('uploads/posts/',$new_name);

        $post=post::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'featured'=>'uploads/posts/'.$new_name,
            'category_id'=>$request->category,
            'user_id'=>$id,
            'slug'=>str_slug($request->title),
            
        ]);

        $post->tags()->attach($request->tags);
       
     
        Session::flash('success','Your post is added');

        return view('home');



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
       $post=post::find($id);


       return view('admin.posts.edit')->with('posts',$post)->with('category',category::all())->with('tag',Tag::all());
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
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
            'category'=>'required',
            'tags'=>'required'
        ]);

        $post=post::find($id);

        if($request->hasFile('featured')){
            $featured=$request->featured;
            $new_name=time().$featured->getClientOriginalName();
            $featured->move('uploads/posts/',$new_name);
            $post->featured='uploads/posts/'.$new_name;
        }

        $post->title=$request->title;
        $post->content=$request->content;
        $post->category_id=$request->category;


        $post->save();

        $post->tags()->sync($request->tags);

        Session::flash('success','Post Successfully Updated');
        return redirect(route('posts'));



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $post=post::find($id);
        $post->delete(); 

        Session::flash('success','Post Successfully Trashed');
        return redirect(route('posts'));

    }

    public function trashed(){

        $posts=post::onlyTrashed()->get();

        if($posts->count()!=0){
            return view('admin.posts.trashed')->with('posts',$posts);
        }
        else{
            Session::flash('info','No Trash Post');
            return redirect('/home');
        }
    }

    public function kill($id){

        $post=post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();

        Session::flash('success','Posts Successfully deleted');
        return redirect(route('posts.trashed'));
    }

    public function restore($id)
    {
       
        $post=post::withTrashed()->where('id',$id)->first();
        $post->restore();

        Session::flash('success','Post Restored Successfully');
        return redirect(route('posts'));

    }    
}


