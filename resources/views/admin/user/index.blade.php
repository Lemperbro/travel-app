@extends('admin.layouts.main')
    <!-- This is an example component -->

   @section('container')
<div class="bg-white p-4 shadow-best rounded-md my-10">
  

  <div class=" mt-2 max-w-screen-md leading-6  w-[50%]"> 
    <form action="/user/" autocomplete="off" class="relative mx-auto flex w-full max-w-2xl items-center justify-between rounded-md border shadow-lg"> 
      <svg class="absolute left-2 block h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="11" cy="11" r="8" class=""></circle>
        <line x1="21" y1="21" x2="16.65" y2="16.65" class=""></line>
      </svg>
      <input type="name" name="search" class="h-14 w-full rounded-md py-4 pr-40 pl-12 outline-none focus:ring-2" placeholder="Name User:" value="{{ request('search') }}"/>
      <button type="submit" class="absolute right-0 mr-1 inline-flex h-12 items-center justify-center rounded-lg bg-gray-900 px-10 font-medium text-white focus:ring-4 hover:bg-gray-700">Search</button>
    </form>
  </div>

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
