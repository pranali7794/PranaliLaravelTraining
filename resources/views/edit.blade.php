@extends('parent')

@section('main')

<div align="right">
	<a href="{{ route('crud.index') }}" class="btn btn-default">Back</a>
</div>
<br/>

<form method="POST" action="{{ route('crud.update', $data->id) }}" enctype="multipart/form-data">
	
	@csrf
	@method('PATCH')

	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<div class="form-group">
		<label for="first_name" class="col-md-4 text-right"> First Name: </label>
		<div class="col-md-8">
			<input type="text" class="form-control" name="first_name" value="{{ $data->first_name }}" /><br/><br/>
		</div>
	</div>

	<br/><br/><br/>

	<div class="form-group">
		<label for="last_name" class="col-md-4 text-right">Last Name:</label>
		<div class="col-md-8">
			<input type="text" class="form-control" name="last_name" value="{{ $data->last_name }}"/>
		</div>
	</div>

	<br/><br/><br/>

	<div class="form-group">
		<label for="image" class="col-md-4 text-right">Select Image :</label>
		<div class="col-md-8">
			<input type="file" name="image" />
			<img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-thumbnail" width="100" />
			<input type="hidden" name="hidden_image" value="{{ $data->image }}" />
		</div>
	</div>

	<br/><br/><br/>

	<div class="form-group">
		<label for="mobile" class="col-md-4 text-right"> Mobile: </label>
		<div class="col-md-8">
			<input type="number" maxlength="10" min="0" class="form-control" name="mobile" value="{{$data->mobile}}"/><br/><br/>
		</div>
	</div>
	<br/><br/><br/>

	<div class="form-group">
		<label for="email" class="col-md-4 text-right">Email ID:</label>
		<div class="col-md-8">
			<input type="email" class="form-control" name="email" value="{{$data->email}}"/>
		</div>
	</div>

	<br/><br/><br/>

	<div class="form-group">
		<label for="address" class="col-md-4 text-right">Address </label>
		<div class="col-md-8">
			<textarea name="address" class="form-control">{{$data->address}}</textarea>
		</div>
	</div>

	<br/><br/><br/>

	<div class="form-group">
		<label for="gender" class="col-md-4 text-right"> Gender: </label>
		<div class="col-md-8">
			<input type="radio" name="gender" value="Female" {{ $data->gender == 'Female' ? 'checked' : ''}} > &nbsp; <label>Female</label>
			<input type="radio" name="gender" value="Male" {{ $data->gender == 'Male' ? 'checked' : ''}} >&nbsp; <label>
			Male</label>
		</div>
	</div>

	<br/><br/><br/>

	<div class="form-group">
		<label for="cc" class="col-md-4 text-right">Country Code:</label>
		<div class="col-md-8">
			<select name="cc" class="form-control"> 
				<option value="91" {{ $data->cc == "91" ? 'selected' : '' }}>91 (India) </option>
				<option value="1" {{ $data->cc == "1" ? 'selected' : '' }} >1 (USA)</option>
			</select>
		</div>
	</div>

	<br/><br/><br/>

	<div class="form-group text-center">
		<input type="submit" name="edit"  class="btn btn-primary" value="Edit" />
	</div>

</form>
@endsection