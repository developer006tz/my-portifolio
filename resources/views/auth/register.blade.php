@extends('auth.auth-layout')
@section('title')
Register 
@endsection
@if(session()->has('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">{{ session()->get('error') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20">
                <title>Close</title>
                <path
                    d="M14.348 5.652c-.78-.781-2.048-.781-2.828 0L10 7.172 8.48 5.652c-.78-.781-2.048-.781-2.828 0-.781.78-.781 2.048
                    0 2.828L7.172 10 5.652 11.52c-.781.78-.781 2.048
                    0 2.828.78.781 2.048.781 2.828 0L10 12.828l1.52
                    1.52c.78.781 2.048.781 2.828 0 .781-.78.781-2.048
                    0-2.828L12.828 10l1.52-1.52c.781-.78.781-2.048
                    0-2.828z" />
            </svg>
        </span>
    </div>
@endif
@section('auth_pages')
<form method="POST" action="{{route('register.store')}}">
    @csrf
    <div class="mb-4">
        <label class="block text-gray-700 font-medium mb-2" for="name">Name</label>
        <input class="w-full p-3 border border-gray-300 rounded-lg @error('name') border-red-500 @enderror" type="name" id="name" name="name" placeholder="Enter your name" value="{{ old('name') }}">
        @error('name')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 font-medium mb-2" for="email">Email</label>
        <input class="w-full p-3 border border-gray-300 rounded-lg @error('email') border-red-500 @enderror" type="email" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}">
        @error('email')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 font-medium mb-2" for="password">Password</label>
        <input class="w-full p-3 border border-gray-300 rounded-lg @error('password') border-red-500 @enderror" type="password" id="password" name="password" placeholder="Enter your password">
        @error('password')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 font-medium mb-2" for="password_confirmation">Confirm Password</label>
        <input class="w-full p-3 border border-gray-300 rounded-lg @error('password') border-red-500 @enderror" type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password">
    </div>
    <button type="submit" class="w-full bg-indigo-600 text-white p-3 rounded-lg hover:bg-indigo-700">@yield('title')</button>
</form>



        
    
@endsection