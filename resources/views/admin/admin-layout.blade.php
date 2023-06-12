<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css"  rel="stylesheet" />
  </head>
  <body class="bg-gray-100">
    <nav class="bg-white p-6 flex justify-between items-center">
      <div class="text-lg font-semibold">
        @auth
        <a href="{{url('/')}}" class="text-gray-900">{{Auth::user()->name}}</a>
        @else
        <a href="{{route('login')}}" class="text-gray-900">Login</a>
        @endauth
      </div>
      <div class="space-x-4">
        <a href="{{route('dashboard')}}" class="text-gray-600 hover:text-gray-900">Home</a>
        <a href="{{route('projects.index')}}" class="text-gray-600 hover:text-gray-900">Projects</a>
        <a href="{{route('project-types.index')}}" class="text-gray-600 hover:text-gray-900">Project Types</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-gray-600 hover:text-gray-900">Logout</a>
        <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
          @csrf
        </form>
      </div>
    </nav>
    <div class="container mx-auto mt-10">
        @if(session()->has('success'))
    <div class="bg-green-500 p-4 rounded-lg mb-6 text-white text-center">
      {{session('success')}}
    </div>
  @endif
  @if(session()->has('error'))
    <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
      {{session('error')}}
    </div>
  @endif
      <h1 class="text-3xl font-semibold mb-4">@yield('heading')</h1>
      @yield('content')
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
  </body>
</html>
