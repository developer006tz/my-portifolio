{{--//project form reusable inputs--}}
 @csrf
@php $editing = isset($item) @endphp
@if($editing)
  @method('PUT')
@endif


<div class="mb-4">
  <label for="project_types_id" class="sr-only">Project Type</label>
  {!! FormHelper::selectWithDefault('project_types_id',$items2, 'id', 'name', ($editing ? $item->project_types_id : null)) !!}
  {{-- <select name="project_types_id" id="project_types_id" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('project_types_id') border-red-500 @enderror">
    <option value="">Select Project Type</option>
    @isset($items2)
      @foreach($items2 as $project_type)
        <option value="{{$project_type->id}}" {{ (old('project_types_id') == $project_type->id || (isset($item) && $item->project_types_id == $project_type->id)) ? 'selected' : '' }}>{{$project_type->name}}</option>      @endforeach
    @endisset
  </select> --}}
  @error('project_types_id')
  <div class="text-red-500 mt-2 text-sm">
    {{$message}}
  </div>
  @enderror
</div>

  <div class="mb-4">
   <label for="title" class="sr-only">Project Title</label>
   <input type="text" name="title" id="github" placeholder="Project title" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('github') border-red-500 @enderror" value="{{old('title',($editing ?  $item->title  : ''))}}">
   @error('title')
     <div class="text-red-500 mt-2 text-sm">
       {{$message}}
     </div>
   @enderror
 </div>



 <div class="mb-4">
   <label for="description" class="sr-only">Description</label>
   <textarea name="description" id="description" cols="30" rows="4" placeholder="Project Description" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('description') border-red-500 @enderror" >{{old('description',($editing ?  $item->description : ''))}}</textarea>
   @error('description')
     <div class="text-red-500 mt-2 text-sm">
       {{$message}}
     </div>
   @enderror
 </div>



 <div class="mb-4">
   <label for="github" class="sr-only">Github URL</label>
   <input type="text" name="github" id="github" placeholder="Github URL" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('github') border-red-500 @enderror" value="{{old('github',($editing ?  $item->github  : ''))}}">
   @error('github')
     <div class="text-red-500 mt-2 text-sm">
       {{$message}}
     </div>
   @enderror
 </div>

 <div class="mb-4">
   <label for="url" class="sr-only">Live URL</label>
   <input type="text" name="url" id="url" placeholder="Live URL" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('url') border-red-500 @enderror" value="{{old('url',($editing ?  $item->url  : ''))}}">
   @error('url')
     <div class="text-red-500 mt-2 text-sm">
       {{$message}}
     </div>
   @enderror
 </div>

 <div class="mb-4">
   <label for="image" class="sr-only">Image</label>
   <input type="file" name="image" id="image" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('image') border-red-500 @enderror" value="{{old('image',($editing ?  $item->image  : ''))}}">
   @error('image')
     <div class="text-red-500 mt-2 text-sm">
       {{$message}}
     </div>
   @enderror
 </div>

 <div class="mb-4">
   <label for="technologies" class="sr-only">Technology used</label>
   <input type="text" name="technologies" id="technologies" placeholder="Technology used" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('technologies') border-red-500 @enderror" value="{{old('technologies',($editing ?  $item->technologies  : ''))}}">
   @error('technologies')
     <div class="text-red-500 mt-2 text-sm">
       {{$message}}
     </div>
   @enderror
 </div>

 <div class="mb-4">
   <label for="features" class="sr-only">Features</label>
   <textarea name="features" id="features" cols="30" rows="4" placeholder="Features" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('features') border-red-500 @enderror">{{old('features',($editing ?  $item->features  : ''))}}</textarea>
   @error('features')
     <div class="text-red-500 mt-2 text-sm">
       {{$message}}
     </div>
   @enderror
 </div>

 <div class="mb-4">
   <label for="challenges" class="sr-only">Challenges</label>
   <textarea name="challenges" id="challenges" cols="30" rows="4" placeholder="Challenges" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('challenges') border-red-500 @enderror">{{old('challenges',($editing ?  $item->challenges  : ''))}}</textarea>
   @error('challenges')
     <div class="text-red-500 mt-2 text-sm">
       {{$message}}
     </div>
   @enderror
 </div>

 <div class="mb-4">
   <label for="lessons" class="sr-only">Lessons i get</label>
   <textarea name="lessons" id="lessons" cols="30" rows="4" placeholder="Lessons i get" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('lessons') border-red-500 @enderror">{{old('lessons',($editing ?  $item->lessons  : ''))}}</textarea>
   @error('lessons')
     <div class="text-red-500 mt-2 text-sm">
       {{$message}}
     </div>
   @enderror
 </div>



 <div>
   <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Submit</button>
 </div>

{{--//project form reusable inputs--}}
