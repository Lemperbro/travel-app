@extends('admin.layouts.main')
    <!-- This is an example component -->

   @section('container')
<div>
  @include('admin.partials.sidebar')
  
      <div class="bg-gray-900 opacity-50   inset-0 z-10 " id="sidebarBackdrop"></div>
      <div id="main-content" class="w-full bg-gray-50 relative overflow-y-auto lg:ml-64 pt-10">
         <div class="flex">
            <a href="" class="bg-orange-600 text-white p-2 rounded-md">Tambah Kota</a>
         </div>
         <div class="grid grid-cols-4 gap-4 mt-8">

            <div class="rounded-md shadow-best p-2">
               <img src="img/pp.jpg" alt="">

               <div class="mt-4">
                  <h1 class="font-semibold font-mono text-center text-xl">Malang</h1>

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
                     <h1>40</h1>
                     <h1>bromo</h1>
                  </div>

               </div>

               <div class="flex gap-x-4 justify-between mt-4">
                  <a href="" class="bg-green-600 p-2 rounded-md text-white font-semibold  w-full text-center">Edit</a>
                  <button class="bg-red-600 p-2 rounded-md text-white font-semibold  w-full text-center">Hapus</button>
               </div>
            </div>

            </div>
            
         </div>
      
      </div>
   </div>



   @endsection
