@extends('layouts.app')

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">Create User</div>
		<div class="panel-body">
			@if(count($errors)>0)
				<ul class="list-group">
					@foreach($errors->all() as $error)
						<li class="list-group-item" style="color:red;">{{$error}}</li>
					@endforeach
				</ul>
			@endif

			<form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" class="form-control" value=""></input>
				</div>

				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" name="email" class="form-control" value=""></input>
				</div>

			
				<div class="formgroup">
					<div class="text-center"><button class="btn btn-success" type="submit">Add User</button></div>
				</div>
				
			</form>
		</div>
	</div>
@stop