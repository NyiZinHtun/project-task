@extends('layouts.app')
@section('content')

<h1 class="title">Edit Project</h1>

<form method="POST" action="{{ url('projects/'.$prjoect->id) }}">
    {{ method_field('PATCH') }}
    {{ csrf_field() }}
    <div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" value="{{ $project->title }}" class="form-control">
    </div>
    <div class="form-group">
    <label for="description">Description</label> 
    <Textarea name="description" id="description" class="form-control">{{ $project->description }}</Textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update Project</button>
</form>

<form method ="POST" action="{{ url('projects/'.$project->id) }}">
   {{ method_field('DELETE') }}
   {{ csrf_field() }}
    <button type="submit" class="btn btn-danger">Delete</button>
</form>

@endsection
