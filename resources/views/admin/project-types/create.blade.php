@extends('admin.admin-layout')
@section('title','Create Project Type')
@section('heading','Create Project Type')

@section('content')

<div class="flex justify-between items-center mb-4   lg:w-1/2 md:w-1/2 sm:w-full mx-auto max-w-screen-xl px-4 lg:px-12">
    <h1 class="text-2xl font-bold">@yield('heading')</h1>
    <a href="{{route('project-types.index')}}" class="bg-blue-500 text-white px-4 py-3 rounded font-medium">back</a>

  </div>
  <div class="flex justify-center sm:p-5 rounded-lg h-auto mb-4">
    <div class="md:w-1/2 sm:w-full lg:w-1/2 bg-white p-6 rounded-lg">
      <form action="{{route('project-types.store')}}" method="post">
       @include('admin.project-types.form')
      </form>
    </div>
  </div>
@endsection
