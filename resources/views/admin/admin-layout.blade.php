<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css"  rel="stylesheet" />
  </head>
 <body>
 <div class="antialiased bg-gray-50 dark:bg-gray-900">
    <!-- Top Navbar -->
    @include('admin.components.admin-navbar')
    <!-- Sidebar -->
    @include('admin.components.admin-sidebar')

    <main class="p-4 md:ml-64 h-auto pt-20">
      @include('admin.components.top-clearfix')
      
        @yield('content')
    
      
    </main>
  </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
  </body>
</html>
