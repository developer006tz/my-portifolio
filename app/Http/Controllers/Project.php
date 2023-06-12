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
    ]);

    $project_types_id = $request->project_types_id;

    $project_type_name = Cache::remember("project-type-name-{$project_types_id}", 3600, function () use ($project_types_id) {
        return ProjectTypes::find($project_types_id)->name;
    });

    $project_type_name = strtolower($project_type_name);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = str_replace(' ','-',strtolower(Auth::user()->name)).'-'. time() .'-'. str_replace(' ','-', substr(strtolower($request->title),0,25) ) . '.jpg';
        $image_resize = Image::make($image->getRealPath());

        if (strpos($project_type_name, 'logo') !== false) {
            $image_resize->resize(460, 460);
        }else{
            $image_resize->resize(408, 260);
            $image_resize->encode('jpg', 80);
        }

        $image_resize->save(storage_path('app/public/' . $filename));
        $request->image = $filename;
    }

    $data = [
        'project_types_id' => $request->project_types_id,
        'title' => $request->title,
        'image' => $request->image,
        'url' => $request->url,
        'description' => $request->description,
        'technologies' => $request->technologies,
        'features' => $request->features,
        'challenges' => $request->challenges,
        'lessons' => $request->lessons,
    ];

    // Use a ternary operator to set the value of the github field
    if(empty($request->github)){
      if (strpos($project_type_name, 'logo') !== false) {
          $data['github'] = url(\Storage::url($request->image));
      }else{
         $data['github'] = 'https://github.com/developer006tz'; 
      }
      
  }else{
      
      if (strpos($project_type_name, 'logo') !== false) {
          $data['github'] = url(\Storage::url($request->image));
      } else {
          $data['github'] = $request->github;
      }
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
    public function update(Request $request, $projectId): RedirectResponse
    {
        $request->validate([
            'project_types_id' => 'required',
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:9048',
        ]);
    
        $project = Projects::findOrFail($projectId);
    
        $projectTypeName = Cache::remember("project-type-name-{$project->project_types_id}", 3600, function () use ($project) {
            return $project->projectType->name;
        });
    
        $projectTypeName = strtolower($projectTypeName);
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $this->generateImageFilename($request->title, Auth::user()->name);
            $imageResize = Image::make($image->getRealPath());
    
            $this->resizeImageBasedOnProjectType($imageResize, $projectTypeName);
    
            $imageResize->encode('jpg', 80);
            $imageResize->save(storage_path('app/public/' . $filename));
    
            $this->deleteProjectImage($project);
    
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
    
        $project->update($data);
    
        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }
    
    private function generateImageFilename(string $title, string $username): string
    {
        $sanitizedTitle = strtolower(str_replace(' ', '-', substr($title, 0, 25)));
        $sanitizedUsername = str_replace(' ', '-', strtolower($username));
        $timestamp = time();
    
        return "{$sanitizedUsername}-{$timestamp}-{$sanitizedTitle}.jpg";
    }
    
    private function resizeImageBasedOnProjectType($image, string $projectTypeName): void
    {
        if (strpos($projectTypeName, 'logo') !== false) {
            $image->resize(460, 460);
        } else {
            $image->resize(408, 260);
        }
    }
    
    private function deleteProjectImage($project): void
    {
        if ($project->image) {
            $imagePath = storage_path('app/public/' . $project->image);
    
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    }

private function getProjectType($id)
{
    return Cache::remember("project-type-{$id}", 3600, function () use ($id) {
        return ProjectTypes::find($id);
    });
}

    //destroy
    public function destroy(Request $request,  $project): RedirectResponse
    {
        $project = Projects::find($project);
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }







}
