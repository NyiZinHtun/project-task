<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Validator;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index',compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'title' => 'required|min:5',
        //     'description' => 'required|min:5'
        // ]);
        $this->validate($request,[
                'title' => 'required',
                'description' => 'required'
            ],
            [
                'title.required' => 'You have to choose the file!',
                'description.required' => 'You have to choose type of the file!'
            ]);
        Project::create(request(['title','description']));
        return redirect('/projects');
    }

    public function show(Project $project)
    {
        return view('projects.show',compact('project'));
    }

    public function edit(Project $project)
    {      
        return view('projects.edit',compact('project'));
    }

    public function update(Project $project)
    {
        $project->update(request(['title','description']));         
        return redirect('/projects');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect('/projects');
    }
}
