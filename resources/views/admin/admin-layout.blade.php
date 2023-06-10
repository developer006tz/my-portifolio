<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tailwind CSS Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  </head>
  <body class="bg-gray-100">
    <nav class="bg-white p-6 flex justify-between items-center">
      <div class="text-lg font-semibold">
        @auth
        <a href="{{route('dashboard')}}" class="text-gray-900">{{Auth::user()->name}}</a>
        @else
        <a href="{{route('login')}}" class="text-gray-900">Login</a>
        @endauth
      </div>
      <div class="space-x-4">
        <a href="#" class="text-gray-600 hover:text-gray-900">Home</a>
        <a href="#" class="text-gray-600 hover:text-gray-900">My Projects</a>
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
      <h1 class="text-3xl font-semibold mb-4">Dashboard</h1>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <!-- Card -->
        <div class="bg-white rounded-lg shadow-md p-6">
          <h2 class="text-xl font-semibold mb-2">Card Title</h2>
          <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vel urna non lectus lacinia feugiat.</p>
        </div>
        <!-- Card -->
        <div class="bg-white rounded-lg shadow-md p-6">
          <h2 class="text-xl font-semibold mb-2">Card Title</h2>
          <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vel urna non lectus lacinia feugiat.</p>
        </div>
        <!-- Card -->
        <div class="bg-white rounded-lg shadow-md p-6">
          <h2 class="text-xl font-semibold mb-2">Card Title</h2>
          <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vel urna non lectus lacinia feugiat.</p>
        </div>
      </div>
    </div>
  </body>
</html>
