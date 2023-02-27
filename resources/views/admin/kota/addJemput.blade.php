@extends('admin.layouts.main')


@section('container')

 <!-- Table 2 -->
 <div class="flex flex-wrap mt-4">
    <div class="flex-none w-full max-w-full">
      <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white p-4 shadow-best4 border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
          <div class="flex justify-between">

              
          <h6 class="font-semibold capitalize">Pickup Point On {{ $kota }} City</h6>
          
          <button type="button"
          class="inline-block p-2 bg-green-600 text-white  rounded-md "
          data-bs-toggle="modal" data-bs-target="#add">
          Tambah
          </button>
        </div>

        </div>

        <div class="flex-auto px-0 pt-0 pb-2 mt-4">
          <div class="p-0 overflow-x-auto">
            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
 
              <thead class="align-bottom">
                <tr>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No</th>
                  <th class=" px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Location</th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Price</th>
                  <th class="px-6 py-3 font-semibold align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70 uppercase">Action</th>
                </tr>
              </thead>
 
              <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($data as $table)
                    
                <tr>
 
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="text-center font-semibold leading-tight text-base">{{ $no++ }}</p>
                  </td>
                      
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                   <div class="px-2 py-1">
                   <p class=" text-center leading-tight font-semibold text-base">{{ $table->lokasi }}</p>
                </div>
                  </td>
 
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="font-semibold leading-tight text-base text-center">{{ $table->harga }}</p>
                  </td>
                  <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">

                   <div class="flex gap-x-4 justify-center">
                    <form action="/kota/kelola/delete/{{ $table->id }}" method="POST">
                        @csrf
                    <button class="bg-red-600 p-2 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 96 960 960" class="w-7 h-7 object-contain"><path fill="#ffffff" d="M261 936q-24.75 0-42.375-17.625T201 876V306h-41v-60h188v-30h264v30h188v60h-41v570q0 24-18 42t-42 18H261Zm438-630H261v570h438V306ZM367 790h60V391h-60v399Zm166 0h60V391h-60v399ZM261 306v570-570Z"/></svg>
                    </button>

                </form>

                    <button type="button"
                    class="inline-block p-2 bg-green-600 text-white  rounded-md "
                    data-bs-toggle="modal" data-bs-target="#exampleModalLong-{{ $table->id }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 object-contain" viewBox="0 96 960 960"><path fill="#ffffff" d="M180 876h44l443-443-44-44-443 443v44Zm614-486L666 262l42-42q17-17 42-17t42 17l44 44q17 17 17 42t-17 42l-42 42Zm-42 42L248 936H120V808l504-504 128 128Zm-107-21-22-22 44 44-22-22Z"/></svg>
                    </button>

                   </div>
                 </td>
                  
 
                </tr>
 
                @endforeach
                @if ($data->count() < 1)
                    <tr>
                        <td class="col-span-4 text-center">Pickup Point Kosong</td>
                    </tr>
                @endif
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end Table 2 -->


  <!-- Modal Edit-->
  @foreach ($data as $edit)
      
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto backdrop-blur-sm"
id="exampleModalLong-{{ $edit->id }}" tabindex="-1" aria-labelledby="exampleModalLongLabel" aria-hidden="true">
<div class="modal-dialog relative w-auto pointer-events-none">
  <div
    class="modal-content border-none shadow-lg relative flex flex-col w-[800px]  pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current left-[50%] -translate-x-[50%] mt-[30%] p-10">
    <div
      class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
         
         <form action="/kota/kelola/edit/{{ $edit->id }}" method="POST" class="w-full px-4" enctype="multipart/form-data">
            <h1 class="text-center font-semibold text-2xl">Edit Pickup Point</h1>
            @csrf
            <div class="mt-4">
                <label for="location">Location</label>
                <input type="text" name="location" id="location" class="w-full h-12 rounded-md p-2 border mt-4" value="{{ $edit->lokasi }}">
            </div>
            <div class="mt-4">
                <label for="price">Price</label>
                <input type="text" name="price" id="price" class="w-full h-12 rounded-md p-2 border mt-4" value="{{ $edit->harga }}">
            </div>
    
            <div class="flex gap-x-4 mt-4">
            <button type="submit" class="bg-green-600 py-2 px-4 rounded-md text-white">Kirim</button>
            <a href="" class="bg-red-600 px-4 py-2 text-white rounded-md">Batal</a>
        </div>
        </form>

    </div>

  </div>
</div>
</div>
@endforeach

{{-- Modal Edit End --}}



  <!-- Modal Add-->
  <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto backdrop-blur-sm"
  id="add" tabindex="-1" aria-labelledby="exampleModalLongLabel" aria-hidden="true">
  <div class="modal-dialog relative w-auto pointer-events-none">
    <div
      class="modal-content border-none shadow-lg relative flex flex-col w-[800px]  pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current left-[50%] -translate-x-[50%] mt-[30%] p-10">
      <div
        class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
           
           <form action="/kota/kelola/add/{{ $id_kota }}" method="POST" class="w-full px-4" enctype="multipart/form-data">
              <h1 class="text-center font-semibold text-2xl">Add Pickup Point</h1>
              @csrf
              <div class="mt-4">
                  <label for="location">Location</label>
                  <input type="text" name="location" id="location" class="w-full h-12 rounded-md p-2 border mt-4" >
              </div>
              <div class="mt-4">
                  <label for="price">Price</label>
                  <input type="text" name="price" id="price" class="w-full h-12 rounded-md p-2 border mt-4" >
              </div>
      
              <div class="flex gap-x-4 mt-4">
              <button type="submit" class="bg-green-600 py-2 px-4 rounded-md text-white">Kirim</button>
              <a href="/kota/kelola" class="bg-red-600 px-4 py-2 text-white rounded-md">Batal</a>
          </div>
          </form>
  
      </div>
  
    </div>
  </div>
  </div>
  {{-- Modal Add End --}}
@endsection