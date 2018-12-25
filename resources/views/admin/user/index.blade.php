@extends('layouts.app')

@section('content')
	
	<div class="panel panel-default">
		<div class="panel-heading">Users</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Image</th>
						<th>Name</th>
						<th>Permissions</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
				
					@foreach($users as $user)
						<tr>
							<td><img src="{{asset($user->profile->avatar)}}" alt="Image Not displayed" style="max-width:90px;max-height:50px;" /></td>
							<td>{{$user->name}}</td>
							<td>
								@if($user->admin)
									<a href="{{route('users.not_admin',['id'=>$user->id])}}" class="btn btn-xs btn-danger">Remove Admin rights</a>
								
								@else
									<a href="{{route('users.admin',['id'=>$user->id])}}" class="btn btn-xs btn-success">Make Admin</a>
								
								@endif


							</td>
							<td><a href="" class="btn btn-danger">Trash</a></td>
						</tr>
						
					@endforeach		
					
				</tbody>	
				
			</table>
		</div>
	</div>
@endsection