<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectTypes;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Unyama;

class ProjectType extends Controller
{

    public function index(): View
    {
        
        return Unyama::index('admin.project-types.index', ProjectTypes::class);
    }

    public function create(): View
    {
        return Unyama::create('admin.project-types.create', ProjectTypes::class, null);
    }


    public function store(Request $request): RedirectResponse
    {
        return Unyama::store($request, 'project-types.index', ProjectTypes::class);
    }

    public function show($projectType): View
    {
        return Unyama::show('admin.project-types.show', ProjectTypes::class, $projectType);
    }

    public function edit($projectType): View
    {
        return Unyama::edit('admin.project-types.edit', ProjectTypes::class, $projectType,null);
    }


    public function update(Request $request, $projectType): RedirectResponse
    {
        return Unyama::update($request, 'project-types.index', ProjectTypes::class, $projectType);
    }

    public function destroy($projectType): RedirectResponse
    {
        return Unyama::destroy('project-types.index', ProjectTypes::class, $projectType);
    }

}
