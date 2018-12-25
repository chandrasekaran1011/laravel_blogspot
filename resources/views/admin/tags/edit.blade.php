@extends('layouts.app')

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">Create New Tag</div>
		<div class="panel-body">
			@include('includes.errors')

			<form action="{{route('tags.update',['id'=>$tags->id])}}" method="post" enctype="multipart/form-data">
				{{csrf_field()}}
				<div class="form-group">
					<label for="tag">Tag</label>
					<input type="text" name="tag" class="form-control" value="{{$tags->tag}}"></input>
				</div>
				
				<div class="formgroup">
					<div class="text-center"><button class="btn btn-success" type="submit">Store Tag</button></div>
				</div>		
			</form>
		</div>
	</div>
@stop