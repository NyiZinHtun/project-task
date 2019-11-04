@extends('layouts.app')
@section('content')

    <h1 class="heading">{{ $project->title }}</h1>
    <div class="content">{{ $project->description }}</div>
    
    <p>
        <a href="{{ url('projects/'.$project->id.'/edit')  }}">Edit</a>
    </p>

    @if($project->tasks->count())
    <div class="container">
        @foreach($project->tasks as $task)
        <div>
        <form method="POST" action="{{ url('tasks/'.$task->id) }}">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <label class="checkbox" for="completed">
                <input type="checkbox" name="completed" onChange="submit()" {{ $task->completed ? 'checked' : ''}}>
                    {{ $task->description }}
            </label>
        </form>
        </div>
        @endforeach
    </div>
    @endif

<form  method="POST" action="{{ url('/projects/'.$project->id.'/tasks') }}">
    {{ csrf_field() }}
   
    <div class="field">
        <label for="description">New Task</label>
        <div class="control">
            <input type="text" class="form-control" name="description" placeholder="New Task">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Add Task</button>
</form>
    @if($errors->any())
		<div class="alert alert-danger">
			<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
			</ul>
		</div>
    @endif
    
<!-- <script>
    function submit(){
     var line = document.getElementbyClassName("checkbox");
     line.style.textDecorationline="line-through";
    }
</script> -->
@endsection