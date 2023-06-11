@extends('admin.admin-layout')
@section('title','Edit Project Type')
@section('heading','Edit Project Type')

@section('content')
  <div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">
      <form action="{{route('project-types.update',$ProjectType->id)}}" method="post">
        @include('admin.project-types.form')
      </form>
    </div>
  </div>
@endsection
