@extends('admin.layouts.main')
    <!-- This is an example component -->

   @section('container')
<div class="bg-white p-4 shadow-best rounded-md my-10">
  

        <form class="w-[80%] mx-auto my-5" action="/kendaraan">   
          <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
          <div class="relative">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                  <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
              </div>
              <input type="search" id="default-search" name="search" value="{{ request('search') }}" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="">
              <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
          </div>
        </form>

         <button type="button"
         class="inline px-6 py-2.5 bg-blue-600 text-white font-semibold text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" 
         data-bs-toggle="modal" data-bs-target="#exampleModalLong">
         ADD VEHICLE
         </button>

         <div class="flex flex-col mt-8 ">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-x-auto">


                  <table class="w-full">
                    <thead>
                      <tr class="text-xs font-semibold tracking-wide text-gray-700 uppercase border-b dark:border-gray-700 bg-gray-300 dark:text-gray-400 dark:bg-gray-800 text-center">
                        <th class="border px-4 py-3">No</th>
                        <th class="border px-4 py-3">TYpe</th>
                        <th class="border px-4 py-3">Capacity</th>
                        <th class="px-2 border">Unit</th>
                        <th class="px-2 border">Plate Number</th>
                        <th class="px-2 border">Image</th>
                        <th class="px-2 border">Action</th>
                      </tr>
                    </thead>
    
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800 border ">

                      @foreach ($data as $no => $user)
                        
                      <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3 text-sm border text-center">{{ $no+1 }}</td>
    
                        <td class="px-4 py-3 text-sm text-center border">{{ $user->merek }}</td>
    
                        <td class="px-4 py-3 text-center">
                          {{ $user->kapasitas }}
                        </td>
    
                        <td class="px-4 py-3 text-sm border text-center">{{ $user->jumlah }}</td>
                        <td class="px-4 py-3 text-sm border text-center">{{ $user->plat }}</td>
                        <td class="px-4 py-3 text-sm border text-center">
                          <img src=" {{ asset('image/'.$user->image) }}" alt="" class="flex w-28 h-28 object-cover mx-auto">
                          
                        </td>
    
                        <td class="px-4 py-8 text-sm flex gap-x-4 justify-center">
                          <button type="button"
                          class="inline-block bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out px-2 py-2"
                          data-bs-toggle="modal" data-bs-target="#exampleModalLong-{{ $user->id }}">
                          Edit
                          </button>
                           <form action="/kendaraan/delete/{{ $user->id }}" method="post" class="">
                              @csrf
                              <button type="submit" class="bg-red-600 p-2 rounded-md text-white">Delete</button>
                           </form>
                        </td>
    
                      </tr>
                      @endforeach
    
                      
                    </tbody>
                  </table>


                  
                </div>
              </div>
            </div>
          </div>
      
   </div>


   {{-- modal edit start --}}
   @foreach ($data as $edit)
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto "
id="exampleModalLong-{{ $edit->id }}" tabindex="-1" aria-labelledby="exampleModalLongLabel" aria-hidden="true">
<div class="modal-dialog relative w-auto pointer-events-none">
  <div
    class="modal-content border-none shadow-lg relative flex flex-col w-[800px] pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current m-auto">
    <div
      class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
         
         <form action="/kendaraan/edit/{{ $edit->id }}" method="POST" class="w-full px-4" enctype="multipart/form-data">
            <h1 class="text-center font-semibold text-2xl">EDIT VEHICLE</h1>
            @csrf


            <img src="{{ asset('image/'.$edit->image) }}" alt="">
            <div class="mt-4">
              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload Image</label>
              <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" name="image">
            </div>

            <div class="mt-4">
                <label for="merek">Type</label>
                <input type="text" name="merek" id="merek" class="w-full h-12 rounded-md p-2 border mt-4" value="{{ $edit->merek }}">
            </div>
            <div class="mt-4">
              <label for="kapasitas">Capacity</label>
              <input type="number" name="kapasitas" id="kapasitas" class="w-full h-12 rounded-md p-2 border mt-4" value="{{ $edit->kapasitas }}">
          </div>
          <div class="mt-4">
            <label for="jumlah">Unit</label>
            <input type="text" name="jumlah" id="jumlah" class="w-full h-12 rounded-md p-2 border mt-4" value="{{ $edit->jumlah }}">
          </div>

          <div class="mt-4">
            <label for="plat">Number Plate</label>
            <input type="text" name="plat" id="plat" class="w-full h-12 rounded-md p-2 border mt-4" value="{{ $edit->plat }}">
          </div>
    
            <div class="flex gap-x-4 mt-4">
            <button type="submit" class="bg-green-600 py-2 px-4 rounded-md text-white">Send</button>
            <a href="/kendaraan" class="bg-red-600 px-4 py-2 text-white rounded-md">Undo</a>
        </div>
        </form>

    </div>

  </div>
</div>
</div>
@endforeach
{{-- modal edit end --}}



{{-- modal add start --}}
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto "
id="exampleModalLong" tabindex="-1" aria-labelledby="exampleModalLongLabel" aria-hidden="true">
<div class="modal-dialog relative w-auto pointer-events-none">
  <div
    class="modal-content border-none shadow-lg relative flex flex-col w-[800px] pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current m-auto">
    <div
      class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
         
         <form action="/kendaraan/add" method="POST" class="w-full px-4" enctype="multipart/form-data" >
            <h1 class="text-center font-semibold text-2xl">ADD VEHICLE</h1>
            @csrf


          <div class="mt-4">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload Image</label>
            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" name="image">
          </div>

            <div class="mt-4">
                <label for="merek">Type</label>
                <input type="text" name="merek" id="merek" class="w-full h-12 rounded-md p-2 border mt-4" >
            </div>

            <div class="mt-4">
              <label for="kapasitas">Capacity</label>
              <input type="number" name="kapasitas" id="kapasitas" class="w-full h-12 rounded-md p-2 border mt-4" >
          </div>

          <div class="mt-4">
            <label for="jumlah">Unit Totals</label>
            <input type="text" name="jumlah" id="jumlah" class="w-full h-12 rounded-md p-2 border mt-4" >
          </div>

          <div class="mt-4">
            <label for="plat">Number Plate</label>
            <input type="text" name="plat" id="plat" class="w-full h-12 rounded-md p-2 border mt-4" >
          </div>


    
            <div class="flex gap-x-4 mt-4">
              <button type="submit" class="bg-green-600 py-2 px-4 rounded-md text-white">Send</button>
              <a href="/kendaraan" class="bg-red-600 px-4 py-2 text-white rounded-md">Undo</a>
            </div>
        </form>

    </div>

  </div>
</div>
</div>
{{-- modal add end --}}
   @endsection
