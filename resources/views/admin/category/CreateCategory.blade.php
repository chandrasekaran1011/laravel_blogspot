@extends('layouts.app')

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">Create New Category</div>
		<div class="panel-body">
			@if(count($errors)>0)
				<ul class="list-group">
					@foreach($errors->all() as $error)
						<li class="list-group-item" style="color:red;">{{$error}}</li>
					@endforeach
				</ul>
			@endif

			<form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
				{{csrf_field()}}
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" name="title" class="form-control"></input>
				</div>
				
				<div class="formgroup">
					<div class="text-center"><button class="btn btn-success" type="submit">Store Category</button></div>
				</div>		
			</form>
		</div>
	</div>
@stop