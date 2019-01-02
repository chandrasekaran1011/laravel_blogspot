<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/vpost/{slug}', 'FrontEndController@singlePost')->name('post.single');

Route::get('/category/{id}', 'FrontEndController@categoryPost')->name('category.single');

Route::get('/tag/{id}', 'FrontEndController@tagPost')->name('tag.single');

Route::get('/results', function(){

		$post=App\post::where('title','like','%'.request('query').'%')->get();

		return view('results')->with('posts',$post)
								->with('title',App\setting::first())
    							->with('categories',App\category::all()->take(5))
    							->with('query',request('query'));

});




Auth::routes();

Route::get('/', 'FrontEndController@index')->name('index');


Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){

	Route::get('/home', function () {
    return view('home');
	})->name('home');


	Route::get('/post/create/',[
		'uses'=>'postsController@create',
		'as'=>'post.create'
	]);

	Route::post('/post/store/',[
		'uses'=>'postsController@store',
		'as'=>'post.store'
	]);

	Route::get('/category/create/',[
		'uses'=>'CategoryController@create',
		'as'=>'category.create'
	]);

	Route::post('/category/store/',[
		'uses'=>'CategoryController@store',
		'as'=>'category.store'
	]);

	Route::get('/category',[
		'uses'=>'CategoryController@index',
		'as'=>'category.index'
	]);

	Route::get('/category/edit/{id}',[
		'uses'=>'CategoryController@edit',
		'as'=>'category.edit'
	]);

	Route::get('/category/delete/{id}',[
		'uses'=>'CategoryController@destroy',
		'as'=>'category.delete'
	]);

	Route::post('/category/update/{id}',[
		'uses'=>'CategoryController@update',
		'as'=>'category.update'
	]);

	Route::get('/posts',[
		'uses'=>'postsController@index',
		'as'=>'posts'
	]);

	Route::get('/posts/delete/{id}',[
		'uses'=>'postsController@destroy',
		'as'=>'posts.delete'
	]);

	Route::get('/posts/edit/{id}',[
		'uses'=>'postsController@edit',
		'as'=>'posts.edit'
	]);

	Route::get('/posts/trashed',[
		'uses'=>'postsController@trashed',
		'as'=>'posts.trashed'
	]);

	Route::get('/posts/kill/{id}',[
		'uses'=>'postsController@kill',
		'as'=>'posts.kill'
	]);

	Route::get('/posts/restore/{id}',[
		'uses'=>'postsController@restore',
		'as'=>'posts.restore'
	]);	

	Route::post('/post/update/{id}',[
		'uses'=>'postsController@update',
		'as'=>'post.update'
	]);

	Route::get('/tags/create/',[
		'uses'=>'TagController@create',
		'as'=>'tags.create'
	]);

	Route::get('/tags',[
		'uses'=>'TagController@index',
		'as'=>'tags'
	]);

	Route::post('/tags/store',[
		'uses'=>'TagController@store',
		'as'=>'tags.store'
	]);


	Route::get('/tags/edit/{id}',[
		'uses'=>'TagController@edit',
		'as'=>'tags.edit'
	]);

	Route::get('/tags/delete/{id}',[
		'uses'=>'TagController@destroy',
		'as'=>'tags.delete'
	]);
	Route::post('/tags/update/{id}',[
		'uses'=>'TagController@update',
		'as'=>'tags.update'
	]);


	/*****Users********/
	Route::get('/users',[
		'uses'=>'UserController@index',
		'as'=>'users'
	]);

	Route::get('/users/create',[
		'uses'=>'UserController@create',
		'as'=>'users.create'
	]);

	Route::post('/users/store',[
		'uses'=>'UserController@store',
		'as'=>'users.store'
	]);

	Route::get('/users/admin/{id}',[
		'uses'=>'UserController@admin',
		'as'=>'users.admin'
	]);

	Route::get('/users/not_admin/{id}',[
		'uses'=>'UserController@not_admin',
		'as'=>'users.not_admin'
	]);

	Route::get('/users/profile/',[
		'uses'=>'ProfileController@index',
		'as'=>'users.profile'
	]);

	Route::post('/users/update',[
		'uses'=>'ProfileController@update',
		'as'=>'users.update'
	]);

	Route::get('/setting/update',[
		'uses'=>'SettingController@update',
		'as'=>'setting.update'
	])->middleware('admin');

	Route::post('/setting/edit',[
		'uses'=>'SettingController@edit',
		'as'=>'setting.edit'
	])->middleware('admin');



});