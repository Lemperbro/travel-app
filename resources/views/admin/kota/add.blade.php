@extends('admin.layouts.main')


@section('container')

<div>
    <form action="/admin/kota/add" method="POST" class="w-full px-4 py-10 md:px-10 md:py-10 rounded-md  shadow-best" enctype="multipart/form-data">
        <h1 class="text-center font-semibold text-2xl text-gray-900 dark:text-white">ADD CITY</h1>
        @csrf
        <div class="w-full">
            <label for="image" class="text-gray-900 dark:text-white">Image</label>
            <input type="file" name="image[]" class="w-full object-cover block rounded-md mt-4 bg-gray-700 text-gray-900 dark:text-white" multiple>
           
        </div>
        <div class="mt-4">
            <label for="nama" class="text-gray-900 dark:text-white">City Name</label>
            <input type="text" name="nama" id="nama" class="w-full h-12 rounded-md p-2 border mt-4 bg-gray-700 text-gray-900 dark:text-white">
        </div>

        <div class="mt-4">
            <label for="harga" class="text-gray-900 dark:text-white">Price</label>
            <input type="number" name="harga" id="harga" class="w-full h-12 rounded-md p-2 border mt-4 bg-gray-700 text-gray-900 dark:text-white">
        </div>

        <div class="flex gap-x-4 mt-4">
        <button type="submit" class="bg-green-600 py-2 px-4 rounded-md text-white">Send</button>
        <a href="/admin/kota" class="bg-red-600 px-4 py-2 text-white rounded-md">Undo</a>
    </div>
    </form>
    
</div>
@endsection