<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\ProjectTypes;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class Project extends Controller
{
    //return create project view

    //index
    public function index(): View
    {
        $projects = Projects::with('projectTypes')->get();
        return view('admin.project.index', compact('projects'));
    }
    public function create(): View
    {
        $ProjectTypes = ProjectTypes::all();
        return view('admin.project.create',compact('ProjectTypes'));
    }

    //store
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'project_types_id' => 'required',
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:19048',
            'github' => '',
            'url' => '',
            'description' => '',
            'technologies' => '',
            'features' => '',
            'challenges' => '',
            'lessons' => '',
        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = str_replace(' ','-',strtolower(Auth::user()->name)).'-'. time() .'-'. str_replace(' ','-', substr(strtolower($request->title),0,25) ) . '.jpg';
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(408, 260);
            $image_resize->encode('jpg', 80);
            $image_resize->save(storage_path('app/public/' . $filename));
            $request->image = $filename;
        }

        // $request->image = $filename;
        //insert into database table make sure for image to save image name $request->image = $filename;
        $data = [
            'project_types_id' => $request->project_types_id,
            'title' => $request->title,
            'image' => $request->image,
            // 'github' => $request->github,
            'url' => $request->url,
            'description' => $request->description,
            'technologies' => $request->technologies,
            'features' => $request->features,
            'challenges' => $request->challenges,
            'lessons' => $request->lessons,
        ];

        if(empty($request->github)){
            $data['github'] = 'https://github.com/developer006tz';
        }else{
            $data['github'] = $request->github;
        }


        Projects::create($data);

        return redirect()
            ->route('projects.index')
            ->with('success', 'Project created successfully.');
    }

    //show
    public function show(Projects $project): View
    {
        return view('admin.project.show', compact('project'));
    }

    //edit
    public function edit( $project): View
    {
        $project = Projects::find($project);
        $ProjectTypes = ProjectTypes::all();
        return view('admin.project.edit', compact('project','ProjectTypes'));
    }

    //update
    public function update(Request $request,  $project): RedirectResponse
    {
        $project = Projects::find($project);
        $request->validate([
            'project_types_id' => 'required',
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'github' => '',
            'url' => '',
            'description' => 'required',
            'technologies' => '',
            'features' => '',
            'challenges' => '',
            'lessons' => '',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = str_replace(' ','-',strtolower(Auth::user()->name)).'-'. time() .'-'. str_replace(' ','-', substr(strtolower($request->title),0,25) ) . '.jpg';
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(408, 260);
            $image_resize->encode('jpg', 80);
            $image_resize->save(storage_path('app/public/' . $filename));
            $request->image = $filename;
            if ($project->image) {
                // check if file exists
                if (file_exists(storage_path('app/public/' . $project->image))) {
                    // delete file
                    unlink(storage_path('app/public/' . $project->image));
                }
            }
        }

        $data = [
            'project_types_id' => $request->project_types_id,
            'title' => $request->title,
            'github' => $request->github,
            'url' => $request->url,
            'description' => $request->description,
            'technologies' => $request->technologies,
            'features' => $request->features,
            'challenges' => $request->challenges,
            'lessons' => $request->lessons,
        ];

        if (!empty($request->image)) {
            $data['image'] = $request->image;
        }

        $project->update($data);
        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    //destroy
    public function destroy(Request $request,  $project): RedirectResponse
    {
        $project = Projects::find($project);
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }







}
