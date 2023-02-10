@extends('admin.layouts.main')
    <!-- This is an example component -->

   @section('container')
<div class="bg-white p-4 shadow-best rounded-md my-10">
  

         <div class="relative mt-4 flex mb-4">
               <input type="text" class="h-12 w-80 border rounded-md pl-10" placeholder="Cari Supir...">
               <img src="icons/search.svg" alt="" class="absolute left-2 top-3 w-7">
         </div>

         <button type="button"
         class="inline px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" 
         data-bs-toggle="modal" data-bs-target="#exampleModalLong">
         Tambah Supir
         </button>

         <div class="flex flex-col mt-8 ">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-x-auto">
                  <table class="min-w-full border">
                    <thead class="border-b bg-gray-400 ">
                      <tr>
                        <th scope="col" class="text-base font-semibold text-gray-900 px-6 py-4 text-left">
                          No
                        </th>
                        <th scope="col" class="text-base font-semibold text-gray-900 px-6 py-4 text-left">
                          Nama
                        </th>
                        <th scope="col" class="text-base font-semibold text-gray-900 px-6 py-4 text-left">
                          No Telephone
                        </th>
                        <th scope="col" class="text-base font-semibold text-gray-900 px-6 py-4 text-left">
                          Alamat
                        </th>
                        <th scope="col" class="text-base font-semibold text-gray-900 px-6 py-4 text-left">
                          Umur
                        </th>
                        <th scope="col" class="text-base font-semibold text-gray-900 px-6 py-4 text-left">
                          Aksi
                        </th>
                      </tr>
                    </thead>
                    <tbody>
               @foreach ($data as $no => $user)

                      <tr class="border-b">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $no+1 }}</td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                          {{ $user->nama }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                          {{ $user->no_tlpn }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                          {{ $user->alamat }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                          {{ $user->umur }} Th
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap flex gap-x-4">
                          <button type="button"
                          class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-full"
                          data-bs-toggle="modal" data-bs-target="#exampleModalLong-{{ $user->id }}">
                          Edit
                          </button>
                           <form action="/supir/delete/{{ $user->id }}" method="post" class="w-full">
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
