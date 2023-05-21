@extends('admin.layouts.main')

@section('container')
<div class="px-4 py-6 overflow-hidden">
  
    @if ($data === null)
    <h1 class="text-center font-semibold text-2xl dark:text-white text-gray-900">ADD TERMS</h1>
    <form action="/admin/terms/add" method="post" enctype="multipart/form-data">
      @csrf
    
      <div class="mb-6">
          <textarea name="terms" id="isi" cols="30" rows="10">
          </textarea>
      </div>
      
      <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Selesai</button>
    </form>
    
    @else
    
    <h1 class="text-center font-semibold text-2xl dark:text-white">UPDATE TERMS</h1>
    <form action="/admin/terms/add" method="post" enctype="multipart/form-data">
      @csrf
    
      <div class="mb-6">
          <textarea name="terms" id="isi" cols="30" rows="10">
            {{ $data->terms }}
          </textarea>
      </div>
      
      <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Selesai</button>
    </form>
    @endif

@endsection
