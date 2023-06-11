@extends('admin.admin-layout')
@section('title','Edit Project')
@section('heading','Edit Project')

@section('content')
  <div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">
      <form action="{{route('projects.update',$project->id)}}" method="post" enctype="multipart/form-data">
        @include('admin.project.form')
      </form>
    </div>
  </div>
@endsection
