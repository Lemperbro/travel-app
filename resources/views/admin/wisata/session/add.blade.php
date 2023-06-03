@extends('admin.layouts.main')

@section('container')
<div class="px-4 py-8">
  <h1 class="text-center font-semibold text-white text-2xl mb-8">Add Height Session</h1>

  <form action="/admin/wisata/{{ $slug }}/session/add" method="POST" class="w-[70%] justify-center mx-auto">
    @csrf
    <div class="">
      <label for="startDate" class="dark:text-white font-semibold">Start Date</label>
      <input type="date" name="startDate" id="startDate" class="mt-2 rounded-md p-2 bg-gray-600 border w-full text-white">
    </div>

    <div class="my-4">
      <label for="endDate" class="dark:text-white font-semibold">End Date</label>
      <input type="date" name="endDate" id="endDate" class="mt-2 rounded-md p-2 bg-gray-600 border w-full text-white">
    </div>

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