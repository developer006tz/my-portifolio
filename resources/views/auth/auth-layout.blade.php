<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  </head>

  <body class="bg-gray-100">

    <div class="min-h-screen flex items-center justify-center">
      <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
        <div class="flex justify-center mb-4">
          <img class="w-24 h-24 rounded-full" src="{{URL::to('img/dev.png')}}" alt="Profile Picture">
        </div>
        <h1 class="text-2xl font-semibold text-center mb-4">@yield('title')</h1>
        @yield('auth_pages')
        
      </div>
    </div>
  </body>
</html>
