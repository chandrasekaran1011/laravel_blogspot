@extends('layouts.app')

@section('content')
	
	<div class="panel panel-default">
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Tags</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
				
					@foreach($tags as $t)
						<tr>
							<td>{{$t->tag}}</td>
							<td><a href="{{route('tags.edit',['id'=>$t->id])}}" class="btn btn-success">Edit</a></td>
							<td><a href="{{route('tags.delete',['id'=>$t->id]) }}" class="btn btn-danger">Delete</a></td>
						</tr>
						
					@endforeach		
					
				</tbody>	
				
			</table>
		</div>
	</div>
@endsection