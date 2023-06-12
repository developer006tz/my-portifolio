<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Unyama;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class Render extends Controller
{
    public function store_request($request)
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
        $data['github'] = getGithubFieldValue($request->github,$projectTypeName, $filename);
        $data['image'] = $filename;
        return Projects::create($data);
    }
}
