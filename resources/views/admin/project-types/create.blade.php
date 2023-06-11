@extends('admin.admin-layout')
@section('title','Create Project Type')
@section('heading','Create Project Type')

@section('content')
  <div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">
      <form action="{{route('project-types.store')}}" method="post">
       @include('admin.project-types.form')
      </form>
    </div>
  </div>
@endsection
