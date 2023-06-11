@extends('admin.admin-layout')
@section('title','Projects')
@section('heading','Projects')

@section('content')
  <div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold"></h1>
    <a href="{{route('projects.create')}}" class="bg-blue-500 text-white px-4 py-3 rounded font-medium">Add Project</a>

  </div>
  @isset($projects)
    <table class="table-auto w-full">
      <thead>
      <tr>
        <th class="px-4 py-2">title</th>
        <th class="px-4 py-2">type</th>
        <th class="px-4 py-2">image</th>
        <th class="px-4 py-2">github link</th>
        <th class="px-4 py-2">live url</th>
        <th class="px-4 py-2">Description</th>
        <th class="px-4 py-2">technology</th>
        <th class="px-4 py-2">features</th>
        <th class="px-4 py-2">challenges</th>
        <th class="px-4 py-2">lessons</th>
        <th class="px-4 py-2">Actions</th>
      </tr>
      </thead>
      <tbody>
      @forelse($projects as $project)
        <tr>
          <td class="border px-4 py-2">{{$project->title}}</td>
          <td class="border px-4 py-2">{{$project->projectTypes->name}}</td>
          <td class="border px-4 py-2"><img src="{{asset('storage/'.$project->image)}}" alt="" class="w-20 h-20"></td>
          <td class="border px-4 py-2">{{$project->github}}</td>
          <td class="border px-4 py-2">{{$project->url}}</td>
          <td class="border px-4 py-2">{{$project->description}}</td>
          <td class="border px-4 py-2">{{$project->technology}}</td>
          <td class="border px-4 py-2">{{$project->features}}</td>
          <td class="border px-4 py-2">{{$project->challenges}}</td>
          <td class="border px-4 py-2">{{$project->lessons}}</td>
          <td class="border px-4 py-2">
            <a href="{{route('projects.edit',$project->id)}}" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Edit</a>

            <form action="{{route('projects.destroy',$project->id)}}" method="post" class="inline-block">
              @csrf
              @method('DELETE')
              <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded font-medium">Delete</button>
            </form>
          </td>

        </tr>
      @empty
        <tr>
          <td colspan="10" class="text-center py-4">No project types found.</td>
        </tr>
      @endforelse
      </tbody>
    </table>
  @endisset
@endsection

