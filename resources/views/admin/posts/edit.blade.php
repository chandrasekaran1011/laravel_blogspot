@extends('layouts.app')

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">Edit Post => {{$posts->title}}</div>
		<div class="panel-body">
			
			@include('includes.errors')

			<form action="{{route('post.update',['id'=>$posts->id])}}" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" name="title" class="form-control" value="{{$posts->title}}"></input>
				</div>

				<div class="form-group">
					<label for="featured">Featured Image</label>
					<input type="file" name="featured" class="form-control"></input>
				</div>

				<div class="form-group">
					<label for="category">Category</label>
					<select name="category" id="category" class="form-control">
						@foreach($category as $c)

							<option value="{{$c->id}}"
							@if($posts->category->id==$c->id)
								selected

							@endif
								>{{$c->name}}</option>

						@endforeach
					</select>
				</div>
				
				<div class="form-group">
					@foreach($tag as $t)
					<label  class="checkbox-inline"><input name="tags[]" type="checkbox" value="{{$t->id}}" 
						@foreach($posts->tags as $tg)
								@if($tg->id==$t->id)
									checked
								@endif
						@endforeach

						>{{$t->tag}}</label>
					@endforeach
				</div>


				<div class="form-group">
					<label for="content">Content</label>
					<textarea name="content" id="content" cols="5" rows="5" class="form-control">{{$posts->content}}</textarea>
				</div>

				<div class="formgroup">
					<div class="text-center"><button class="btn btn-success" type="submit">Update Post</button></div>
				</div>
				
			</form>
		</div>
	</div>
@stop