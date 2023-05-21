@extends('admin.layouts.main')

@section('container')

<div class="px-4 py-6">
    
    <form action="/extra/add/{{ $id }}" method="POST" class="mx-32" enctype="multipart/form-data">
        @csrf
        <h1 class="text-gray-900 dark:text-white text-2xl font-semibold mb-10 mt-4">Add Extra</h1>
        <div>
            <label for="image" class="text-gray-900 dark:text-white">Image</label>
            <input type="file" name="image" id="image" class="w-full bg-gray-300 dark:bg-gray-700 rounded-md mt-2 text-gray-900 dark:text-white">
        </div>
        <div class="mt-4">
            <label for="judul" class="text-gray-900 dark:text-white ">Judul</label>
            <input type="text" name="judul" id="judul" class="w-full p-2 rounded-md bg-gray-300 dark:bg-gray-700 mt-2 text-gray-900 dark:text-white">
        </div>
        <div class="mt-4">
            <label for="deskripsi" class="text-gray-900 dark:text-white ">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="w-full p-2 rounded-md bg-gray-300 dark:bg-gray-700 mt-2 text-gray-900 dark:text-white"></textarea>
        </div>

        <div class="mt-4">
            <label for="harga" class="text-gray-900 dark:text-white">Harga</label>
            <input type="number" name="harga" id="harga" class="w-full p-2 rounded-md bg-gray-300 dark:bg-gray-700 mt-2 text-gray-900 dark:text-white">
        </div>

        <button type="submit" class="text-white font-semibold py-2 px-4 bg-green-500 mt-10 rounded-md">
            Save
        </button>
    </form>

    
</div>
@endsection
