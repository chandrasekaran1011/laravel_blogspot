<?php

namespace App\Http\Controllers;

Use Session;

use Illuminate\Http\Request;

Use App\category;



class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $cat=category::all();

        return view('admin.category.index')->with('categories',category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.CreateCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,['title'=>'required']);
        

        $category=new category();
        $category->name=$request->title;
        $category->save();

        Session::flash('success','Category Successfully created');

        return redirect(route('category.index'));
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
        
        $category=new category;
        //$category=$category::find($id);

        return view('admin.category.edit')->with('category',$category::find($id));
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
        $category=new category;
        $category=$category::find($id);
        $category->name=$request->title;

        $category->save();

        Session::flash('success','Category Successfully edited');

        return redirect(route('category.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=new category;
        $category=$category::find($id);
        $category->delete(); 

        Session::flash('success','Category Successfully deleted');
        return redirect(route('category.index'));


    }
}
