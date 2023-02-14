@extends('admin.layouts.main')
    <!-- This is an example component -->

   @section('container')
<div class="bg-white p-10 rounded-md shadow-best m-10">
  

         <div class="flex">
            <a href="/admin/kota/add" class="bg-orange-600 text-white p-2 rounded-md">Tambah Kota</a>
         </div>

         <div class="grid grid-cols-4 gap-4 mt-8 ">

            @foreach ($data as $query)
               
            <div class="rounded-md shadow-best p-2 relative ">
               @php
                  $images = explode('|', $query->image);
               @endphp
               <img src="../../image/{!! $images[0] !!}" alt="" class="w-full h-44 object-cover">
                  

               <div class="mt-4">
                  <h1 class="font-semibold font-mono text-center text-xl">{{ $query->nama_kota }}</h1>

                  <div class="flex gap-x-4">

                  <div class=" justify-between  ">
                     <h1 class="font-mono ">Wisata</h1>
                     <h1 class="font-mono ">Best Wisata</h1>
                  </div>
                  
                  <div class="justify-between  ">
                     <p>:</p>
                     <p>:</p>
                  </div>

                  <div class=" justify-between  ">
                     
                     <h1>{{ $query->wisata->count() }}</h1>


                  </div>

               </div>

               <div class="flex gap-x-4 justify-between mt-4 ">
                     <!-- Button trigger modal Edit-->
               <button type="button"
               class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-full"
               data-bs-toggle="modal" data-bs-target="#exampleModalLong-{{ $query->id }}">
               Edit
               </button>
               <form action="/kota/delete/{{ $query->id }}" method="POST">
                  @csrf
                  <button type="submit" class="bg-red-600 p-2 rounded-md text-white font-semibold  w-full text-center">Hapus</button>
               </form>
               </div>
            </div>

            </div>
            
            @endforeach

         </div>

      
   </div>




<!-- Modal Edit-->
@foreach ($data as $edit)
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto backdrop-blur-sm"
id="exampleModalLong-{{ $edit->id }}" tabindex="-1" aria-labelledby="exampleModalLongLabel" aria-hidden="true">
<div class="modal-dialog relative w-auto pointer-events-none">
  <div
    class="modal-content border-none shadow-lg relative flex flex-col w-[800px] pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current left-[50%] -translate-x-[50%] mt-[30%] p-10">
    <div
      class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
         
         <form action="/admin/kota/edit/{{ $edit->id }}" method="POST" class="w-full px-4" enctype="multipart/form-data">
            <h1 class="text-center font-semibold text-2xl">EDIT KOTA</h1>
            @csrf
            <div class="w-full">
                <label for="image">Gambar</label>

                <input type="file" name="image[]" class="w-full border object-cover block rounded-md mt-4" multiple>
               
            </div>
            <div class="mt-4">
                <label for="nama">Nama Kota</label>
                <input type="text" name="nama" id="nama" class="w-full h-12 rounded-md p-2 border mt-4" value="{{ $edit->nama_kota }}">
            </div>
    
            <div class="flex gap-x-4 mt-4">
            <button type="submit" class="bg-green-600 py-2 px-4 rounded-md text-white">Kirim</button>
            <a href="/admin/kota" class="bg-red-600 px-4 py-2 text-white rounded-md">Batal</a>
        </div>
        </form>

    </div>

  </div>
</div>
</div>
@endforeach


   @endsection
