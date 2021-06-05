@extends('parent')

@section('main')
@if($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<div align="right">
	<a href="{{ route('crud.index') }}" class="btn btn-default">Back</a>
</div>

<form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
	@csrf
	
	 <input type="hidden" name="_token" value="{{ csrf_token() }}">

	<div class="form-group">
		<label for="name" class="col-md-4 text-right"> Name: </label>
		<div class="col-md-8">
			<select id='name' name='name' class="form-control">
       			<option value=''>-- Select Name --</option>
       			@foreach($crudData['data'] as $crud)
         			<option value='{{ $crud->id }}'>{{ $crud->first_name." ".$crud->last_name  }}</option>
       			@endforeach

    		</select>

		</div>
	</div>

	<br/><br/><br/>

	<div class="form-group">
		<label for="title" class="col-md-4 text-right"> Title: </label>
		<div class="col-md-8">
			<input type="text" class="form-control" name="title"/>

			<br/><br/>
		</div>
	</div>

	<br/><br/><br/>

	<div class="form-group">
		<label for="description" class="col-md-4 text-right">Description:</label>
		<div class="col-md-8">
			<textarea name="description" ></textarea>
		</div>
	</div>

	<br/><br/><br/>
	
	<div class="form-group text-center">
		<input type="submit" name="addBlog"  class="btn btn-success" value="Add Blog" />
	</div>

</form>
@endsection