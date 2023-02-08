@extends('admin.layouts.main')
    <!-- This is an example component -->

   @section('container')
<div>
  

         <div class="flex">
            <a href="/user/add" class="bg-orange-600 text-white p-2 rounded-md">kelola user</a>
         </div>

         <div class="grid grid-cols-4 gap-4 mt-8">

            <div class="rounded-md shadow-best p-2">
               <img src="img/pp.jpg" alt="">

               <div class="mt-4">
                  <h1 class="font-semibold font-mono text-center text-xl">Profil</h1>

                  <div class="flex gap-x-4">

                  <div class=" justify-between  ">
                     <h1 class="font-mono ">Nama</h1>
                     <h1 class="font-mono ">Email</h1>
                     <h1 class="font-mono ">NoTlp</h1>
                  </div>
                  
                  <div class="justify-between  ">
                     <p>:</p>
                     <p>:</p>
                     <p>:</p>
                  </div>

                  <div class=" justify-between  ">
                     <h1>konok</h1>
                     <h1>mboh@gmail.com</h1>
                     <h1>-082231719213</h1>
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



   @endsection
