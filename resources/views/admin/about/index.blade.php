@extends('admin.layouts.main')

@section('container')

<div class="px-4 py-6 overflow-hidden">
  
@if ($data === null)
<h1 class="text-center font-semibold text-2xl">ADD ABOUT</h1>
<form action="/admin/about/add" method="post" enctype="multipart/form-data">
  @csrf
  <div class="mb-6">

  <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Image</label>
  <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="image" name="image" type="file">
  <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">A profile picture is useful to confirm your are logged into your account</div>

  </div>


  <div class="mb-6">
      <textarea name="isi" id="isi" cols="30" rows="10">
      </textarea>
  </div>
  
  <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Selesai</button>
</form>

@else

<h1 class="text-center font-semibold text-2xl">UPDATE ABOUT</h1>
<form action="/admin/about/update" method="post" enctype="multipart/form-data">
  @csrf
  <div class="mb-6">

  <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Image</label>
  <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="image" name="image" type="file">
  <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">A profile picture is useful to confirm your are logged into your account</div>

  </div>


  <div class="mb-6">
      <textarea name="isi" id="isi" cols="30" rows="10">
        {{ $data->isi }}
      </textarea>
  </div>
  
  <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Selesai</button>
</form>
@endif

      


</div>





@endsection