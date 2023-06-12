{{--//items form reusable inputs--}}
@csrf

@php $editing = isset($item) @endphp
@if($editing)
  @method('PUT')
@endif

<div class="mb-4">
  <label for="name" class="sr-only">Name</label>
  <input type="text" name="name" id="name" placeholder="Project Type Name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" value="{{old('name',($editing ? $item->name : ''))}}">
  @error('name')
    <div class="text-red-500 mt-2 text-sm">
      {{$message}}
    </div>
  @enderror
</div>


<div class="mb-4">
  <label for="slug" class="sr-only">Slug</label>
  <input type="text" name="slug" id="slug" placeholder="Project Type Slug" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('slug') border-red-500 @enderror" value="{{old('slug',($editing ? $item->slug : ''))}}">
  @error('slug')
    <div class="text-red-500 mt-2 text-sm">
      {{$message}}
    </div>
  @enderror
</div>


<div class="mb-4">
  <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Submit</button>
</div>

{{--//items form reusable inputs--}}
