@extends('layouts.app')

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">Create New Post</div>
		<div class="panel-body">
			@include('includes.errors')

			<form action="{{route('category.update',['id'=>$category->id])}}" method="post" enctype="multipart/form-data">
				{{csrf_field()}}
			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" name="title" class="form-control" value="{{$category->name}}"></input>
			</div>

			<div class="formgroup">
						<div class="text-center"><button class="btn btn-success" type="submit">Store Post</button></div>
					</div>		
			</form>
		</div>
	</div>
@stop