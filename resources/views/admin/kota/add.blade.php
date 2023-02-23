@extends('admin.layouts.main')


@section('container')

<div>
  @include('admin.partials.sidebar')
    
    <form action="/admin/kota/add" method="POST" class="w-full p-10 rounded-md bg-white shadow-best" enctype="multipart/form-data">
        <h1 class="text-center font-semibold text-2xl">ADD KOTA</h1>
        @csrf
        <div class="w-full">
            <label for="image">Gambar</label>
            <input type="file" name="image[]" class="w-full border object-cover block rounded-md mt-4" multiple>
           
        </div>
        <div class="mt-4">
            <label for="nama">Nama Kota</label>
            <input type="text" name="nama" id="nama" class="w-full h-12 rounded-md p-2 border mt-4">
        </div>

        <div class="flex gap-x-4 mt-4">
        <button type="submit" class="bg-green-600 py-2 px-4 rounded-md text-white">Kirim</button>
        <a href="/admin/kota" class="bg-red-600 px-4 py-2 text-white rounded-md">Batal</a>
    </div>
    </form>
    
</div>
@endsection