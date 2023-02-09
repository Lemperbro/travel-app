@extends('admin.layouts.main')
    <!-- This is an example component -->

   @section('container')
<div>
  

         <div class="flex">
            <a href="/admin/kota/add" class="bg-orange-600 text-white p-2 rounded-md">Tambah Kota</a>
         </div>

         <div class="grid grid-cols-4 gap-4 mt-8">

            @foreach ($data as $data)
               
            <div class="rounded-md shadow-best p-2 relative ">
               @php
                  $images = explode('|', $data->image);
               @endphp
               <img src="../../image/{!! $images[0] !!}" alt="" class="w-full h-44 object-cover">
                  

               <div class="mt-4">
                  <h1 class="font-semibold font-mono text-center text-xl">{{ $data->nama_kota }}</h1>

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
                     
                     <h1>{{ $data->wisata->count() }}</h1>


                  </div>

               </div>

               <div class="flex gap-x-4 justify-between mt-4 ">
                  <a href="" class="bg-green-600 p-2 rounded-md text-white font-semibold  w-full text-center">Edit</a>
                  <button class="bg-red-600 p-2 rounded-md text-white font-semibold  w-full text-center">Hapus</button>
               </div>
            </div>

            </div>
            
            @endforeach

         </div>
      
   </div>



   @endsection
