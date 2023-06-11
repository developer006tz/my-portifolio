<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectTypes;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


class ProjectType extends Controller
{
    //index
    public function index(): View
    {
        $projectTypes = ProjectTypes::all();
        return view('admin.project-types.index', compact('projectTypes'));
    }

    //create
    public function create():view
    {

        $ProjectTypes = ProjectTypes::all();

        return view('admin.project-types.create',compact('ProjectTypes'));
    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);
        ProjectTypes::create($request->all());
        return redirect()->route('project-types.index')->with('success', 'Project Type created successfully.');
    }

    //show
    public function show( $projectType)
    {
        $projectType = ProjectTypes::find($projectType);
        return view('admin.project-types.show', compact('projectType'));
    }

    //edit
    public function edit( $ProjectType)
    {
        $ProjectType = ProjectTypes::find($ProjectType);
        return view('admin.project-types.edit', compact('ProjectType'));
    }

    //update
    public function update(Request $request,  $ProjectType)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $ProjectType = ProjectTypes::find($ProjectType);
        $ProjectType->update($request->all());
        return redirect()->route('project-types.index')->with('success', 'Project Type updated successfully.');
    }

    //destroy
    public function destroy( $projectType)
    {
        $projectType = ProjectTypes::find($projectType);
        $projectType->delete();
        return redirect()->route('project-types.index')->with('success', 'Project Type deleted successfully.');
    }
}
