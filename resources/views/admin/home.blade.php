@extends('admin.admin-layout')
@section('title','Dashboard')
@section('heading','Dashboard')
@section('content')
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <!-- Card -->
    <div class="bg-white rounded-lg shadow-md p-6">
      <h2 class="text-xl font-semibold mb-2">Projects</h2>
      <p class="text-gray-600">{{count($projects) ?? '-'}}</p>
      <a href="{{route('projects.index')}}" class="text-blue-500 hover:underline">View All</a>
    </div>
    <!-- Card -->
    <div class="bg-white rounded-lg shadow-md p-6">
      <h2 class="text-xl font-semibold mb-2">Project Types</h2>
      <p class="text-gray-600">{{count($project_types) ?? '-'}}</p>
      <a href="{{route('project-types.index')}}" class="text-blue-500 hover:underline">View All</a>
    </div>
    <!-- Card -->
    <div class="bg-white rounded-lg shadow-md p-6">
      <h2 class="text-xl font-semibold mb-2">Github Repos</h2>
      <p class="text-gray-600">{{$repoCount}}</p>
      <a href="https://github.com/developer006tz" class="text-blue-500 hover:underline">View All</a>
    </div>
  </div>
@endsection
