@extends('layouts.app')

@section('content')
	
	<div class="panel panel-default">
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Image</th>
						<th>Title</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
				
					@foreach($posts as $p)
						<tr>
							<td><img src="{{$p->featured}}" alt="Image Not displayed" style="max-width:90px;max-height:50px;" /></td>
							<td>{{$p->title}}</td>
							<td><a href="{{route('posts.edit',['id'=>$p->id])}}" class="btn btn-info">Edit</a></td>
							<td><a href="{{route('posts.delete',['id'=>$p->id]) }}" class="btn btn-danger">Trash</a></td>
						</tr>
						
					@endforeach		
					
				</tbody>	
				
			</table>
		</div>
	</div>
@endsection