<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Projects;
use App\Models\ProjectTypes;


use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $projects = Projects::with('ProjectTypes')->get();
        $project_types = ProjectTypes::with('projects')->get();
        $users = User::all();
        return view('admin.home', compact('projects', 'project_types', 'users'));

    }






    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
