@extends('admin.admin-layout')
@section('title','Projects')
@section('heading','Projects')

@section('content')
  <div class="flex justify-between items-center mb-4 mx-auto max-w-screen-xl px-4 lg:px-12">
    <h1 class="text-2xl font-bold">@yield('heading')</h1>
    <a href="{{route('projects.create')}}" class="bg-blue-500 text-white px-4 py-3 rounded font-medium">Add Project</a>

  </div>
    <!-- test  -->
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 rounded-lg h-auto mb-4" >
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <!-- Start coding here -->
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                    <form class="flex items-center">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                        </div>
                    </form>
                </div>
                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                    <button type="button" class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        Add product
                    </button>
                    <div class="flex items-center space-x-3 w-full md:w-auto">
                        <button id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                            <svg class="-ml-1 mr-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                            </svg>
                            Actions
                        </button>
                        <div id="actionsDropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="actionsDropdownButton">
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mass Edit</a>
                                </li>
                            </ul>
                            <div class="py-1">
                                <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete all</a>
                            </div>
                        </div>
                        <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-4 w-4 mr-2 text-gray-400" viewbox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                            </svg>
                            Filter

                            <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                            </svg>
                        </button>
                        
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                        <th scope="col" class="px-4 py-3">title</th>
                        <th scope="col" class="px-4 py-3">type</th>
                        <th scope="col" class="px-4 py-3">image</th>
                        <th scope="col" class="px-4 py-3">github link</th>
                        <th scope="col" class="px-4 py-3">live url</th>
                        <th scope="col" class="px-4 py-3"  style="min-width: 400px;">Description</th>
                        <th scope="col" class="px-4 py-3">technology</th>
                        <th scope="col" class="px-4 py-3">features</th>
                        <th scope="col" class="px-4 py-3">challenges</th>
                        <th scope="col" class="px-4 py-3">lessons</th>
                        <th scope="col" class="px-4 py-3">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    @isset($items)
                    @forelse($items as $project)
                      <tr class="border-b dark:border-gray-700">
                        
                        <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$project->title}}</th>
                        <td  class="px-4 py-3">{{$project->projectTypes->name}}</td>
                        <td  class="px-4 py-3"><img src="{{asset('storage/'.$project->image)}}" alt="" class="w-20 h-20"></td>
                        <td  class="px-4 py-3"><a class="text-primary" href="{{$project->github}}">{{$project->github}}</a></td>
                        <td  class="px-4 py-3">{{$project->url}}</td>
                        <td  class="px-4 py-3"  style="min-width: 400px;">{{$project->description}}</td>
                        <td  class="px-4 py-3">{{$project->technology}}</td>
                        <td  class="px-4 py-3">{{$project->features}}</td>
                        <td  class="px-4 py-3">{{$project->challenges}}</td>
                        <td  class="px-4 py-3">{{$project->lessons}}</td>
                        <td  class="px-4 py-3 flex items-center justify-end">
                          <a href="{{route('projects.edit',$project->id)}}" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Edit</a>

                          <form action="{{route('projects.destroy',$project->id)}}" method="post" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded font-medium">Delete</button>
                          </form>
                        </td>

                      </tr>
                    @empty
                      <tr>
                        <td colspan="10" class="text-center py-4">No project types found.</td>
                      </tr>
                    @endforelse
                   
                    @endisset
                    </tbody>
                </table>
            </div>
            <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                    Showing
                    <span class="font-semibold text-gray-900 dark:text-white">{{$items->firstItem()}}-{{$items->lastItem()}}</span>
                    of
                    <span class="font-semibold text-gray-900 dark:text-white">{{$items->total()}}</span>
                </span>
                 {{$items->links()}}
            </nav>
        </div>
    </div>
    </section>

    <!-- end test  -->
@endsection

