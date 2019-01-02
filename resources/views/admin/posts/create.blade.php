@extends('layouts.app')

@section('styles')
	<link href="{{ asset('css/summernote.css') }}" rel="stylesheet">

@stop

@section('scripts')
	<script src="{{ asset('js/summernote.js') }}"></script>
	<script>
		$(document).ready(function() {
 		$('#content').summernote();
	});
</script>

@stop

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">Create New Post</div>
		<div class="panel-body">
			@if(count($errors)>0)
				<ul class="list-group">
					@foreach($errors->all() as $error)
						<li class="list-group-item" style="color:red;">{{$error}}</li>
					@endforeach
				</ul>
			@endif

			<form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" name="title" class="form-control" value=""></input>
				</div>

				<div class="form-group">
					<label for="featured">Featured Image</label>
					<input type="file" name="featured" class="form-control"></input>
				</div>

				<div class="form-group">
					<label for="category">Category</label>
					<select name="category" id="category" class="form-control">
						@foreach($category as $c)
							<option value="{{$c->id}}">{{$c->name}}</option>

						@endforeach
					</select>
				</div>

				<div class="form-group">
					@foreach($tag as $t)
					<label  class="checkbox-inline"><input name="tags[]" type="checkbox" value="{{$t->id}}">{{$t->tag}}</label>
					@endforeach
				</div>

				<div class="form-group">
					<label for="content">Content</label>
					<textarea name="content" id="content" cols="5" rows="5" class="form-control"></textarea>
				</div>

				<div class="formgroup">
					<div class="text-center"><button class="btn btn-success" type="submit">Store Post</button></div>
				</div>
				
			</form>
		</div>
	</div>
@stop