<div class="grid grid-cols-1 h-16 sm:grid-cols-1 lg:grid-cols-1 mx-auto gap-4 mb-4 max-w-screen-xl px-4 lg:px-12"> 
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
      </div>