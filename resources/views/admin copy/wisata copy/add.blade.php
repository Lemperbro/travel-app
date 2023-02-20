@extends('admin.layouts.main')


@section('container')

<div>
  @include('admin.partials.sidebar')
    
    <form action="/admin/wisata/add" method="POST" class="w-full p-10 rounded-md bg-white shadow-best mt-20" enctype="multipart/form-data">
        <h1 class="text-center font-semibold text-2xl">ADD WISATA</h1>
        @csrf
        <div class="w-full">
            <label for="image">Gambar</label>
            <input type="file" name="image[]" class="w-full border object-cover block rounded-md mt-4" multiple>
           
        </div>
        <div class="mt-4">
            <label for="nama">Nama Kota</label>
            <input type="text" name="nama" id="nama" class="w-full h-12 rounded-md p-2 border mt-4">
        </div>
        <div class="mt-4">
            <label for="departure">Departure</label>
            <input type="datetime-local" name="departure" id="departure" class="w-full h-12 rounded-md p-2 border mt-4">
        </div>
        <div class="mt-4">
            <label for="long_tour">Long Tour</label>
            <input type="text" name="long_tour" id="long_tour" class="w-full h-12 rounded-md p-2 border mt-4">
        </div>
        <div class="mt-4">
            <label for="type">Type Tour</label>
            <select name="type" id="" class="w-full h-12 rounded-md p-2 border mt-4">
                <option value="single_trip">Single Trip</option>
                <option value="open_trip">Open Trip</option>
                <option value="private_trip">Private Trip</option>
            </select>
        </div>
        <div class="mt-4">
            <label for="kota">Kota</label>
            <select name="kota" id="" class="w-full h-12 rounded-md p-2 border mt-4">
                @foreach ($kota as $kota)
                <option value="{{ $kota->id }}">{{ $kota->nama_kota }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-4">
            <label for="loacation">Location</label>
            <input type="text" name="location" id="loacation" class="w-full h-12 rounded-md p-2 border mt-4">
        </div>

        <div>
            <div id="jemput">
                <div class="mt-4 border rounded-md p-8 shadow-best" > 
                <label for="titik_jemput">Titik Jemput </label>
                <input type="text" name="titik_jemput[]" id="titik_jemput" class="w-full h-12 rounded-md p-2 border mt-4 mb-2">
                <label for="harga">Harga</label>
                <input type="number" name="harga[]" id="harga" class="w-full h-12 rounded-md p-2 border mt-4">
            </div>
            </div>
            <h1 id="add_jemput" class="bg-blue-600 py-2 px-4 text-xl font-semibold text-white mt-2 rounded-md inline-block float-right">+</h1>
        </div>


        <div class="mt-14">
            <label for="deskripsi">Deskripsi</label>
            <input type="text" name="deskripsi" id="deskripsi" class="w-full h-12 rounded-md p-2 border mt-4">
        </div>


        <div class="flex gap-x-4 mt-4">
        <button type="submit" class="bg-green-600 py-2 px-4 rounded-md text-white">Kirim</button>
        <a href="/admin/wisata" class="bg-red-600 px-4 py-2 text-white rounded-md">Batal</a>
    </div>
    </form>
    
</div>
@endsection