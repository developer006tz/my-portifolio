<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Projects;
use App\Models\ProjectTypes;
use Illuminate\Support\Facades\Http;


use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->email == 'dev@ludovickonyo.com'){
        
        $projects = Projects::with('ProjectTypes')->get();
        $project_types = ProjectTypes::with('projects')->get();
        $users = User::all();

        //github repos count
        $token = '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';
        $response = Http::withToken($token)->get('https://api.github.com/user/repos?per_page=100');
        $repositories = $response->json();
        $repoCount = count($repositories);

        return view('admin.home', compact('projects', 'project_types', 'users', 'repoCount'));

    }else{
            Auth::logout();
            return redirect()->route('login');
    }
}






    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
