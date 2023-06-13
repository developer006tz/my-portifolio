<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Email</title>
    <style>
      @import url('https://cdn.jsdelivr.net/npm/tailwindcss@2/dist/tailwind.min.css');
    </style>
  </head>
  <body class="bg-gray-100">
    <div class="max-w-3xl mx-auto p-8">
      <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <img
          class="w-full h-72 object-cover object-center"
          src="https://images.unsplash.com/photo-1519681393784-d120267933ba?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80"
          alt=""
        />
        <div class="p-6">
          <h2 class="text-lg font-semibold text-gray-800 mb-2">
          Name: {{ $msg->name }}
          </h2>

          <h3 class="text-lg font-semibold text-gray-800 mb-2">
          Name: {{ $msg->email }}
          </h3>

          
          <p class="text-gray-600 text-sm mb-4">
          Message: {{ $msg->message }}
          </p>

          <a
            href="#"
            class="inline-block bg-blue-500 hover:bg-blue-600 text-white text-sm px-4 py-2 rounded"
          >
          </a>
        </div>
      </div>
    </div>
  </body>
</html>