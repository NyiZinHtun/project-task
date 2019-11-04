<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;

class ProjecttasksController extends Controller
{
    public function store(Project $project,Request $request){
        $this->validate($request,[
            'description' => 'required'
    ]);
        Task::create([
            'project_id' => $project->id,
            'description' => request('description')
        ]);
        return back();
    }

    public function update(Task $task){
       $task->update([
           'completed' =>request()->has('completed')
       ]);
       return back();
    }

}
