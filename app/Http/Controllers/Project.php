<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\ProjectTypes;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;
use App\Helpers\Unyama;

class Project extends Render
{
   
    public function index(): View
    {
        return Unyama::index('admin.project.index', Projects::class);

    }
    public function create(): View
    {
        
        return Unyama::create('admin.project.create', Projects::class, ProjectTypes::class);
    }

    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'project_types_id' => 'required',
        'title' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:19048',
    ]);


    $projectTypeName = getProjectTypeName($request->project_types_id);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = generateImageFilename($request->title, Auth::user()->name);
        $imageResize = Image::make($image->getRealPath());
        resizeImageBasedOnProjectType($imageResize, $projectTypeName);
        $imageResize->encode('jpg', 80);
        $imageResize->save(storage_path('app/public/' . $filename));
    }

    $data = $request->only([
        'project_types_id',
        'title',
        'url',
        'description',
        'technologies',
        'features',
        'challenges',
        'lessons',
    ]);

    $data['github'] = getGithubFieldValue($request->github, $projectTypeName);
    $data['image']=$filename;

    Projects::create($data);


    return redirect()->route('projects.index')->with('success', 'Project created successfully.');
}

    public function show(Projects $project): View
    {
        return view('admin.project.show', compact('project'));
    }


    public function edit( $project): View
    {
        return Unyama::edit('admin.project.edit', Projects::class, $project, ProjectTypes::class);
    }

 
    public function update(Request $request, $projectId): RedirectResponse
    {
        $request->validate([
            'project_types_id' => 'required',
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:9048',
        ]);

        $projectTypeName = getProjectTypeName($request->project_types_id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = generateImageFilename($request->title, Auth::user()->name);
            $imageResize = Image::make($image->getRealPath());
    
            resizeImageBasedOnProjectType($imageResize, $projectTypeName);
    
            $imageResize->encode('jpg', 80);
            $imageResize->save(storage_path('app/public/' . $filename));
    
            deleteProjectImage($projectId);
    
            $request->merge(['image' => $filename]);
    
            if (strpos($projectTypeName, 'logo') !== false) {
                $request->merge(['github' => url(Storage::url($filename))]);
            }
        }
    
        $data = $request->only([
            'project_types_id',
            'title',
            'github',
            'url',
            'description',
            'technologies',
            'features',
            'challenges',
            'lessons',
        ]);
    
        Projects::findOrFail($projectId)->update($data);
    
        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Request $request,  $project): RedirectResponse
    {
            deleteProjectImage($project);
            return Unyama::destroy('projects.index',Projects::class, $project);
    }







}
