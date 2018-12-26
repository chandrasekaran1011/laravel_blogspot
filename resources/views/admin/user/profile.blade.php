@extends('layouts.app')

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">Edit User</div>
		<div class="panel-body">
			@if(count($errors)>0)
				<ul class="list-group">
					@foreach($errors->all() as $error)
						<li class="list-group-item" style="color:red;">{{$error}}</li>
					@endforeach
				</ul>
			@endif

			<form action="{{route('users.update')}}" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" class="form-control" value="{{Auth::user()->name}}"></input>
				</div>

				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" name="email" class="form-control" value="{{Auth::user()->email}}"></input>
				</div>


				<div class="form-group">
					<label for="pass">New Password</label>
					<input type="password" name="pass" class="form-control" value="" </input>
				</div>

				<div class="form-group">
					<label for="avatar">Upload a file</label>
					<input type="file" name="avatar" class="form-control" value=""></input>
				</div>

				<div class="form-group">
					<label for="facebook">Facebook Profile</label>
					<input type="text" name="facebook" class="form-control" value="{{Auth::user()->profile->facebook}}"></input>
				</div>

				<div class="form-group">
					<label for="youtube">Youtube Profile</label>
					<input type="text" name="youtube" class="form-control" value="{{Auth::user()->profile->youtube}}"></input>
				</div>

				<div class="form-group">
					<label for="about">About</label>
					<textarea class="form-control" id="about" name="about" cols="6" rows="6" >{{Auth::user()->profile->about}}</textarea>
				</div>
			
				<div class="formgroup">
					<div class="text-center"><button class="btn btn-success" type="submit">Edit User</button></div>
				</div>
				
			</form>
		</div>
	</div>
@stop