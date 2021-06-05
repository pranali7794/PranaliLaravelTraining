@extends('parent')

@section('main')

<div class="jumbotron text-center">
	<div align="right">
		<a href="{{ route('crud.index') }}" class="btn btn-default">Back</a>
	</div>
	<br/>
	<img src="{{ URL::to('/') }}/images/{{ $user->image }}" class="img-thumbnail" />
	<h3>First Name - {{ $user->first_name }} </h3>
	<h3>Last Name - {{ $user->last_name }} </h3>

	<br/><br/>
	<h2>Blogs</h2>
	<table class="table table-bordered table-striped">
		 <thead>
		<tr>
			<th width="40%" align="text-center">Title</th>
			<th width="40%">Description</th>
		</tr>
		</thead>

		
			@foreach($blogs as $post)

			<tbody>
				<td>{{ $post->title }} </td>
				<td>{{ $post->body }} </td>
			</tbody>

			@endforeach
		
	</table>
</div>
@endsection