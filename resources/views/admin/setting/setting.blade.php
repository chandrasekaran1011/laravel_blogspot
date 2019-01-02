@extends('layouts.app')

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">Edit Blog Settings</div>
		<div class="panel-body">
			@include('includes.errors')

			<form action="{{route('setting.edit')}}" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
				<div class="form-group">
					<label for="name">Site Name</label>
					<input type="text" name="site_name" class="form-control" value="{{$setting->site_name}}"></input>
				</div>

				<div class="form-group">
					<label for="email">Contact Email</label>
					<input type="email" name="contact_email" class="form-control" value="{{$setting->contact_email}}"></input>
				</div>

				<div class="form-group">
					<label for="number">Contact Number</label>
					<input type="number" name="contact_number" class="form-control" value="{{$setting->contact_number}}"></input>
				</div>

				<div class="form-group">
					<label for="address">Address</label>
					<input type="text" name="address" class="form-control" value="{{$setting->address}}"></input>
				</div>

			
				<div class="formgroup">
					<div class="text-center"><button class="btn btn-success" type="submit">Update Setting</button></div>
				</div>
				
			</form>
		</div>
	</div>
@stop