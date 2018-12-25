@extends('layouts.app')

@section('content')
	
	<div class="panel panel-default">
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Category</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
				
					@foreach($categories as $c)
						<tr>
							<td>{{$c->name}}</td>
							<td><a href="{{route('category.edit',['id'=>$c->id])}}" class="btn btn-success">Edit</a></td>
							<td><a href="{{route('category.delete',['id'=>$c->id]) }}" class="btn btn-danger">Delete</a></td>
						</tr>
						
					@endforeach		
					
				</tbody>	
				
			</table>
		</div>
	</div>
@endsection