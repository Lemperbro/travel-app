@extends('admin.layouts.main')
    <!-- This is an example component -->

   @section('container')
<div class="bg-white p-4 shadow-best rounded-md my-10">
  

  <form class="w-[80%] mx-auto my-5" action="/supir/">   
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
        <input type="search" id="default-search" name="search" value="{{ request('search') }}" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos...">
        <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
    </div>
  </form>

         <button type="button"
         class="inline px-6 py-2.5 bg-blue-600 text-white font-bold text-sm  uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" 
         data-bs-toggle="modal" data-bs-target="#exampleModalLong">
         Tambah Supir
         </button>

         <div class="flex flex-col mt-8 rounded-lg ">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-x-auto">
                  <table class="min-w-full border">
                    <thead class="border-b">
                      <tr>
                        <th scope="col" class="text-base border text-center font-semibold text-gray-900 px-2 py-2">
                          No
                        </th>
                        <th scope="col" class="text-base border text-center font-semibold text-gray-900 px-2 py-2">
                          Nama
                        </th>
                        <th scope="col" class="text-base border text-center font-semibold text-gray-900 px-2 py-2">
                          Telephone
                        </th>
                        <th scope="col" class="text-base border text-center font-semibold text-gray-900 px-2 py-2">
                          Alamat
                        </th>
                        <th scope="col" class="text-base border text-center font-semibold text-gray-900 px-2 py-2">
                          Umur
                        </th>
                        <th scope="col" class="text-base border text-center font-semibold text-gray-900 px-2 py-2">
                          Aksi
                        </th>
                      </tr>
                    </thead>
                    <tbody>
               @foreach ($data as $no => $user)

                      <tr class="border-b">
                        <td class="px-2 py-2 whitespace-nowrap text-center text-sm border font-medium text-gray-900">{{ $no+1 }}</td>
                        <td class="text-sm text-gray-900 font-semibold px-2 py-2 border whitespace-nowrap text-center">
                          {{ $user->nama }}
                        </td>
                        <td class="text-sm text-gray-900 font-semibold px-2 py-2 border whitespace-nowrap text-center">
                          {{ $user->no_tlpn }}
                        </td>
                        <td class="text-sm text-gray-900 font-semibold px-2 py-2 border whitespace-nowrap text-center">
                          {{ $user->alamat }}
                        </td>
                        <td class="text-sm text-gray-900 font-semibold px-2 py-2 border whitespace-nowrap text-center">
                          {{ $user->umur }} Th
                        </td>
                        <td class=" text-sm text-gray-900 font-semibold px-2 py-2 whitespace-nowrap flex gap-x-4">
                          <button type="button"
                          class="inline-block px-2 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-[40%]"
                          data-bs-toggle="modal" data-bs-target="#exampleModalLong-{{ $user->id }}">
                          Edit
                          </button>
                           <form action="/supir/delete/{{ $user->id }}" method="post" class="">
                              @csrf
                              <button type="submit" class="bg-red-600 p-2 rounded-md text-white">Hapus</button>
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
         
         <form action="/admin/supir/edit/{{ $edit->id }}" method="POST" class="w-full px-4" enctype="multipart/form-data">
            <h1 class="text-center font-semibold text-2xl">EDIT KOTA</h1>
            @csrf

            <div class="mt-4">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="w-full h-12 rounded-md p-2 border mt-4" value="{{ $edit->nama }}">
            </div>
            <div class="mt-4">
              <label for="no_tlpn">No Telephone</label>
              <input type="number" name="no_tlpn" id="no_tlpn" class="w-full h-12 rounded-md p-2 border mt-4" value="{{ $edit->no_tlpn }}">
          </div>
          <div class="mt-4">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="w-full h-12 rounded-md p-2 border mt-4" value="{{ $edit->alamat }}">
        </div>
        <div class="mt-4">
          <label for="umur">Umur</label>
          <input type="text" name="umur" id="umur" class="w-full h-12 rounded-md p-2 border mt-4" value="{{ $edit->umur }}">
      </div>
    
            <div class="flex gap-x-4 mt-4">
            <button type="submit" class="bg-green-600 py-2 px-4 rounded-md text-white">Kirim</button>
            <a href="/supir" class="bg-red-600 px-4 py-2 text-white rounded-md">Batal</a>
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
         
         <form action="/admin/supir/add" method="POST" class="w-full px-4" enctype="multipart/form-data">
            <h1 class="text-center font-semibold text-2xl">TAMBAH SUPIR</h1>
            @csrf

            <div class="mt-4">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="w-full h-12 rounded-md p-2 border mt-4" >
            </div>
            <div class="mt-4">
              <label for="no_tlpn">No Telephone</label>
              <input type="number" name="no_tlpn" id="no_tlpn" class="w-full h-12 rounded-md p-2 border mt-4" >
          </div>
          <div class="mt-4">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="w-full h-12 rounded-md p-2 border mt-4" >
        </div>
        <div class="mt-4">
          <label for="umur">Umur</label>
          <input type="text" name="umur" id="umur" class="w-full h-12 rounded-md p-2 border mt-4" >
      </div>
    
            <div class="flex gap-x-4 mt-4">
            <button type="submit" class="bg-green-600 py-2 px-4 rounded-md text-white">Kirim</button>
            <a href="/supir" class="bg-red-600 px-4 py-2 text-white rounded-md">Batal</a>
        </div>
        </form>

    </div>

  </div>
</div>
</div>
{{-- modal add end --}}
   @endsection
