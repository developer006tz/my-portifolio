@extends('admin.admin-layout')
@section('title','Edit Project')
@section('heading','Edit Project')

@section('content')
 <div class="flex justify-between items-center mb-4  lg:w-1/2 md:w-1/2 sm:w-full mx-auto max-w-screen-xl px-4 lg:px-12">
    <h1 class="text-2xl font-bold">@yield('heading')</h1>
    <a href="{{route('projects.index')}}" class="bg-blue-500 text-white px-4 py-3 rounded font-medium">back</a>

  </div>
  <div class="flex justify-center sm:p-5 rounded-lg h-auto mb-4">
    <div class="md:w-1/2 sm:w-full lg:w-1/2 bg-white p-6 rounded-lg">
      <form action="{{route('projects.update',$item->id)}}" method="post" enctype="multipart/form-data">
        @include('admin.project.form')
      </form>
    </div>
  </div>
@endsection
