@extends('layouts.app')
@section('content')
	<h1>Create New Project</h1>

	<form method="post" action="{{ url('/projects') }}">
		{{ csrf_field() }}

		@if($errors->any())
		<div class="alert alert-danger">
			<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
			</ul>
		</div>
		@endif

		<div class="form-group">
			<label>Title</label>
			<input type="text" name="title" placeholder="Enter Title" class="form-control" value="{{ old('title') }}">
		</div>
		<div class="form-group">
			<label>Description</label>
			<textarea name="description" placeholder="Enter Description" class="form-control">{{ old('description') }}</textarea>
		</div>
		<div>
			<button type="submit" class="btn btn-primary">Create Project</button>
		</div>

	</form>

@endsection