@extends('admin.layouts.main')
    <!-- This is an example component -->

   @section('container')
<div class="bg-white p-4 shadow-best rounded-md my-10">
  

    <form class="w-[80%] mx-auto my-5" action="/user/">   
      <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
      <div class="relative">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
          </div>
          <input type="search" id="default-search" name="search" value="{{ request('search') }}" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos...">
          <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
      </div>
    </form>

         <div class="flex flex-col mt-4">
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
                          Name
                        </th>
                        <th scope="col" class="text-base font-semibold text-gray-900 px-6 py-4 text-left">
                          Email
                        </th>
                        <th scope="col" class="text-base font-semibold text-gray-900 px-6 py-4 text-left">
                          Phone Number
                        </th>
                        <th scope="col" class="text-base font-semibold text-gray-900 px-6 py-4 text-left">
                          Address
                        </th>
                        <th scope="col" class="text-base font-semibold text-gray-900 px-6 py-4 text-left">
                          Action
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


                  {{ $data->links('vendor.pagination.tailwind') }}



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
