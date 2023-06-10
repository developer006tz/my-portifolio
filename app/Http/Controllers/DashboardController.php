<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
