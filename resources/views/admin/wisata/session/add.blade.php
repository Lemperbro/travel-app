@extends('admin.layouts.main')

@section('container')
<div class="px-4 py-8">
  @if ($type == 'session')
  <h1 class="text-center font-semibold text-white text-2xl mb-8">Add High Season</h1>
  @elseif ($type == 'weekend')
  <h1 class="text-center font-semibold text-white text-2xl mb-8">Add Price Weekend</h1>
  @endif

  <form action="/admin/wisata/{{ $slug }}/{{ $type }}/add" method="POST" class="w-[95%] md:w-[80%] xl:w-[60%] justify-center mx-auto">
    @csrf
    @if ($type == 'session')
    <div class="">
      <label for="startDate" class="dark:text-white font-semibold">Start Date</label>
      <input type="date" name="startDate" id="startDate" class="mt-2 rounded-md p-2 bg-gray-600 border w-full text-white">
    </div>
    
    <div class="my-4">
      <label for="endDate" class="dark:text-white font-semibold">End Date</label>
      <input type="date" name="endDate" id="endDate" class="mt-2 rounded-md p-2 bg-gray-600 border w-full text-white">
    </div>
    @endif

    <div class="my-4">
      <label for="price" class="dark:text-white font-semibold">Price</label>
      <input type="number" name="price" id="price" class="mt-2 rounded-md p-2 bg-gray-600 border w-full text-white">
    </div>

    <div class="my-4">
      <label for="price_child" class="dark:text-white font-semibold">Price Child</label>
      <input type="number" name="price_child" id="price_child" class="mt-2 rounded-md p-2 bg-gray-600 border w-full text-white">
    </div>


    <button type="submit" class="text-white font-semibold px-3 py-2 rounded-md bg-green-500">Save</button>
  </form>

</div>
@endsection