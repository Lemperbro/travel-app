@extends('admin.layouts.main')
    <!-- This is an example component -->

   @section('container')
<div class="bg-white p-4 shadow-best rounded-md my-10">
  

         <div class="relative">
               <input type="text" class="h-12 w-80 border rounded-md pl-10" placeholder="Cari User...">
               <img src="icons/search.svg" alt="" class="absolute left-0 top-3 w-7">
         </div>

         <div class="flex flex-col mt-8">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-x-auto">
                  <table class="min-w-full">
                    <thead class="border-b bg-gray-400 ">
                      <tr>
                        <th scope="col" class="text-base font-semibold text-gray-900 px-6 py-4 text-left">
                          No
                        </th>
                        <th scope="col" class="text-base font-semibold text-gray-900 px-6 py-4 text-left">
                          Nama
                        </th>
                        <th scope="col" class="text-base font-semibold text-gray-900 px-6 py-4 text-left">
                          Email
                        </th>
                        <th scope="col" class="text-base font-semibold text-gray-900 px-6 py-4 text-left">
                          No Telephone
                        </th>
                        <th scope="col" class="text-base font-semibold text-gray-900 px-6 py-4 text-left">
                          Alamat
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
                          {{ $user->username }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                          {{ $user->email }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                          {{ $user->no_tlpn }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                          {{ $user->alamat }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                           <form action="/user/delete/{{ $user->id }}" method="post">
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
         {{-- <div class="grid grid-cols-4 gap-4 mt-8">

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
            
         </div> --}}
      
   </div>



   @endsection
