@extends('admin.layouts.main')


@section('container')

<div>
  @include('admin.partials.sidebar')
    
    <form action="" method="POST" class="w-full px-4">
        <h1 class="text-center font-semibold text-2xl">ADD KOTA</h1>

        <div class="w-full">
            <label for="image">Gambar</label>
            <input type="file" name="image[]" class="w-full border p-2 rounded-md h-12 mt-4">
        </div>
        <div class="mt-4">
            <label for="nama">Nama Kota</label>
            <input type="text" name="nama" id="nama" class="w-full h-12 rounded-md p-2 border mt-4">
        </div>

        <div class="flex gap-x-4 mt-4">
        <button class="bg-green-600 py-2 px-4 rounded-md text-white">Kirim</button>
        <a href="/kota" class="bg-red-600 px-4 py-2 text-white rounded-md">Batal</a>
    </div>
    </form>
    
</div>
@endsection