@extends('admin.layouts.main')
    <!-- This is an example component -->

   @section('container')
<div class="px-4 py-6">
  

         <div class="flex my-5">
         <a href="/admin/kota/add" class="bg-orange-700 p-2 rounded-md flex">
            <svg xmlns="http://www.w3.org/2000/svg" class="my-auto" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M19 11h-6V5h-2v6H5v2h6v6h2v-6h6z"></path></svg>
            <h1  class=" text-white uppercase font-semibold my-auto">Add City</h1>
         </a>

         <form class="w-[80%] mx-auto " action="/admin/kota">   
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="search" id="default-search" name="search" value="{{ request('search') }}" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-orange-500 focus:border-orange-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500" placeholder="Search">
                <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-orange-700 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">Search</button>
            </div>
          </form>

         </div>

         <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 mt-8 ">


            @php
               $coba = 0;
            @endphp
            {{-- @foreach ($data as $query)
               
            <div class="rounded-md shadow-best p-2 relative bg-white dark:bg-gray-700"> --}}

               {{-- action menu start --}}
               {{-- <div class="relative inline-block float-right">
                  <div>
                    <button type="button" class="inline-flex justify-center w-full options-menu{{ $query->id }}">
                     <svg class="h-5 w-5 text-gray-900 dark:text-white" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 9a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 13a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                      </svg>
                    </button>
                  </div>
                
                  <div class="origin-top-right absolute right-0 mt-2 w-56 rounded-md  bg-white ring-1 ring-black ring-opacity-5 focus:outline-none shadow-best5 hidden dropdown-menu{{ $query->id }}">
                    <div class="py-1" role="none">

                     <button type="button"
                     class="inline-block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 w-full"
                     data-bs-toggle="modal" data-bs-target="#exampleModalLong-{{ $query->id }}">
                     Edit
                     </button>   


                     <form action="/kota/delete/{{ $query->id }}" method="POST">
                        @csrf
                        <button type="submit" class="block px-4 py-2 text-sm text-red-700 hover:bg-red-100 hover:text-red-900 w-full">
                           Delete
                        </button>
                     </form>

                    </div>
                  </div>
                </div>

                @include('admin.kota.actionMenu') --}}
                {{-- action menu end  --}}

               {{-- @php
                  $images = explode('|', $query->image);
               @endphp
               <img src="../../image/{!! $images[0] !!}" alt="" class="w-full object-cover h-52 rounded-lg">
                  

               <div class="mt-4">
                  <h1 class="font-semibold font-mono text-xl text-gray-900 dark:text-white">City Name: {{ $query->nama_kota }}</h1>
                  <h1 class="font-semibold font-mono text-xl text-gray-900 dark:text-white">Price: Rp{{ $query->harga }}</h1>



         </div>



            </div>
            
            @endforeach --}}

            {{-- card 2 start --}}
            @foreach ($data as $query)

            <div class="block rounded-lg p-4 shadow-best dark:bg-gray-700 bg-white relative">
                {{-- action menu start --}}
               <div class="absolute right-6 top-6 dark:bg-white bg-gray-900 rounded-md shadow-best4">
                  <div>
                    <button type="button" class="inline-flex justify-center  mt-1 mr-2 w-full options-menu{{ $query->id }}">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="24" height="24" class="text-white dark:text-gray-900 font-semibold" viewBox="0 0 24 24" style="transform: ;msFilter:;"><path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path></svg>
                    </button>
                  </div>
                
                  <div class="origin-top-right absolute right-0 mt-2 w-56 rounded-md  bg-white ring-1 ring-black ring-opacity-5 focus:outline-none shadow-best5 hidden dropdown-menu{{ $query->id }}">
                    <div class="py-1" role="none">

                     <button type="button"
                     class="inline-block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 w-full"
                     data-bs-toggle="modal" data-bs-target="#exampleModalLong-{{ $query->id }}">
                     Edit
                     </button>   


                     <form action="/kota/delete/{{ $query->id }}" method="POST">
                        @csrf
                        <button type="submit" class="block px-4 py-2 text-sm text-red-700 hover:bg-red-100 hover:text-red-900 w-full">
                           Delete
                        </button>
                     </form>

                    </div>
                  </div>
                </div>

                @include('admin.kota.actionMenu')
                {{-- action menu end  --}}

               @php
                  $images = explode('|', $query->image);
               @endphp

               <img
                 alt="Home"
                 src="{{ asset('image/'.$images[0]) }}"
                 class="h-56 w-full rounded-md object-cover"
               />
             
               <div class="mt-2">
                 <dl>
                   <div>
                     <dt class="sr-only">Price</dt>
             
                     <dd class="text-sm text-gray-700 dark:text-gray-200 font-semibold">Start From Rp. {{ number_format($query->harga,0,',','.') }}</dd>
                   </div>
             
                   <div>
                     <dt class="sr-only">Address</dt>
             
                     <dd class="text-gray-900 dark:text-white font-semibold text-xl">{{ $query->nama_kota }}</dd>
                   </div>

                   </div>
                 </dl>
             
                
               </div>
             </div>
             @endforeach
             {{-- card 2 end --}}

         </div>

         @if ($data->count() === 0)
         <!-- component -->
         <div class=" flex flex-col items-center justify-center mt-10">

            <svg xmlns="http://www.w3.org/2000/svg" class="w-44 fill-gray-900 dark:fill-white h-44" width="24" height="24" viewBox="0 0 24 24" style="transform: ;msFilter:;"><path d="M20 6c0-2.168-3.663-4-8-4S4 3.832 4 6v2c0 2.168 3.663 4 8 4s8-1.832 8-4V6zm-8 13c-4.337 0-8-1.832-8-4v3c0 2.168 3.663 4 8 4s8-1.832 8-4v-3c0 2.168-3.663 4-8 4z"></path><path d="M20 10c0 2.168-3.663 4-8 4s-8-1.832-8-4v3c0 2.168 3.663 4 8 4s8-1.832 8-4v-3z"></path></svg>


         <div class="flex flex-col items-center justify-center">
         <p class="text-3xl md:text-4xl lg:text-5xl text-gray-900 dark:text-white mt-12">{{ request('search') }} Not Found</p>
         <p class="md:text-lg lg:text-xl text-gray-600 dark:text-slate-300 mt-8">Sorry, {{ request('search') }} you are looking for could not be found.</p>

         </div>
         </div>
         @endif

      {{ $data->links('vendor.pagination.tailwind') }}


      
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
            <div class="mt-4">
               <label for="harga">Harga</label>
               <input type="text" name="harga" id="harga" class="w-full h-12 rounded-md p-2 border mt-4" value="{{ $edit->harga }}">
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






{{-- @if (Session::has('success'))



<div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 p-4 overflow-x-hidden overflow-y-auto md:inset-0 bg-black/50 backdrop-blur-sm">
   <div class="flex items-center justify-center min-h-screen">
       <div class="relative w-full max-w-md">
           <div class="relative bg-white rounded-lg shadow">
               <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="popup-modal">
                   <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                   <span class="sr-only">Close modal</span>
               </button>
               <div class="p-6 text-center">
                   <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                   <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to delete this product?</h3>

                   <button data-modal-hide="popup-modal" type="button" id="close_modal_delete" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Yes</button>
               </div>
           </div>
       </div>
   </div>
</div>

 
   
@endif --}}

@endforeach


 
 


   @endsection
