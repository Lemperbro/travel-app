@extends('admin.layouts.main')
    <!-- This is an example component -->

   @section('container')
<div class="bg-white p-10 rounded-md shadow-best m-10">
  

         <div class="flex">
            <a href="/admin/kota/add" class="bg-orange-600 text-white p-2 rounded-md">Tambah Kota</a>
         </div>

         <div class="grid grid-cols-4 gap-4 mt-8 ">


            @php
               $coba = 0;
            @endphp
            @foreach ($data as $query)
               
            <div class="rounded-md shadow-best p-2 relative ">

               {{-- action menu start --}}
               <div class="relative inline-block float-right">
                  <div>
                    <button type="button" class="inline-flex justify-center w-full options-menu{{ $query->id }}">
                     <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
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

                @include('admin.kota.actionMenu')
                {{-- action menu end  --}}

               @php
                  $images = explode('|', $query->image);
               @endphp
               <img src="../../image/{!! $images[0] !!}" alt="" class="w-full h-44 object-cover">
                  

               <div class="mt-4">
                  <h1 class="font-semibold font-mono text-center text-xl">{{ $query->nama_kota }}</h1>



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
@endforeach





   @endsection
