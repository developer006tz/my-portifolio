@extends('admin.admin-layout')
@section('title','Project Types')
@section('heading','Project Types')

@section('content')
  <div class="flex justify-between items-center mb-4 mx-auto max-w-screen-xl px-4 lg:px-12">
    <h1 class="text-2xl font-bold">@yield('heading')</h1>
    <a href="{{route('project-types.create')}}" class="bg-blue-500 text-white px-4 py-3 rounded font-medium">Create Project Type</a>

  </div>
  @isset($items)
  <div class="overflow-x-auto mx-auto max-w-screen-xl px-4 lg:px-12">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
      <tr>
        <th class="px-4 py-2">Name</th>
        <th class="px-4 py-2">slug</th>
        <th class="px-4 py-2 lg:text-right">Actions</th>
      </tr>
      </thead>
      <tbody>
      @forelse($items as $project_type)
        <tr>
          <td class="border px-4 py-2 text-center">{{$project_type->name ?? '-'}}</td>
          <td class="border px-4 py-2 text-center">{{$project_type->slug ?? '-'}}</td>
          <td class="border px-4 py-2 text-right">
            <a href="{{route('project-types.edit',$project_type->id)}}" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Edit</a>
            <form action="{{route('project-types.destroy',$project_type->id)}}" method="post" class="inline-block">
              @csrf
              @method('DELETE')
              <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded font-medium">Delete</button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="3" class="text-center py-4">No project types found.</td>
        </tr>
      @endforelse
      </tbody>
     
    </table>
    <div class="mt-4 mb-4 flex justify-end mr-0">
      {{$items->links()}}

    </div>
  </div>
  @endisset
@endsection

