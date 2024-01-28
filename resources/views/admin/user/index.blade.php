@extends('admin.layouts.main')
    <!-- This is an example component -->
  {{-- //no
  //name
  //email
  //phone number
  //address
  //action --}}

   @section('container')
<div class="px-4 py-6 overflow-hidden">
  

    <form class="w-[80%] mx-auto my-5" action="/user/">   
      <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
      <div class="relative">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
          </div>
          <input type="search" id="default-search" name="search" value="{{ request('search') }}" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search">
          <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
      </div>
    </form>

         <div class="flex flex-col mt-4">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-x-auto">



                  <table class="w-full">
                    <thead>
                      <tr class="text-xs font-semibold tracking-wide text-gray-700 uppercase border-b-2  bg-gray-300 dark:text-gray-400 dark:bg-gray-800 text-center">
                        <th class=" px-4 py-3">No</th>
                        <th class=" px-4 py-3">Name</th>
                        <th class=" px-4 py-3">Email</th>
                        <th class="px-2 ">Phone Number</th>
                        <th class="px-2 ">Address</th>
                        <th class="px-2 ">Role</th>
                        <th class="px-2 ">Action</th>
                      </tr>
                    </thead>
    
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800  ">

                   @foreach ($data as $no => $user)
                        
                      <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3 text-sm  text-center">{{ $no+1 }}</td>
    
                        <td class="px-4 py-3 text-sm text-center ">{{ $user->username }}</td>
    
                        <td class="flex px-4 py-3 justify-center">
                          {{ $user->email }}
                        </td>
    
                        <td class="px-4 py-3 text-sm  text-center">{{ $user->no_tlpn }}</td>
    
                        <td class="px-4 py-3 text-sm  text-center">{{ $user->alamat }}</td>
                        <td class="px-4 py-3 text-sm  text-center">
                          @if ($user->posisi == true)
                            Admin
                          @else
                            User
                          @endif
                        </td>
    
                        <td class="px-4 py-3 text-sm  text-center ">
                          <div class="flex gap-x-2 justify-center">
                            @if ($user->posisi == false)
                            <button type="button" class="bg-green-600 p-2 rounded-md text-white" data-bs-toggle="modal" data-bs-target="#makeadmin-{{ $user->id }}">Make Admin</button>
                          @endif

                          @if ($count_user->count() > 1)
                          <button type="button" class="bg-red-600 p-2 rounded-md text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{ $user->id }}">Delete</button>
                          @endif
                        </div>

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


   @foreach ($data as $delete)

 <!-- Modal cancel start-->
 <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
  id="staticBackdrop-{{ $delete->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
 
  <div class="modal-dialog relative w-auto pointer-events-none">
  <div
      class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white dark:bg-gray-700 bg-clip-padding rounded-md outline-none text-current">
      <div
      class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
 
 
      <button type="button" class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
          data-bs-dismiss="modal" aria-label="Close"></button>
          
      </div>
      <div class="modal-body relative p-4">
      {{-- isi model --}}
          <form action="/user/delete/{{ $delete->id }}" method="POST">
              @csrf
 
 
 
              
              <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
         <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400 text-center">Are you sure you want to Delete this User?</h3>
         <div class="flex flex-wrap gap-x-2 mx-auto justify-center">
 
           <button  type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
             Yes, I'm sure
           </button>
           <button data-bs-dismiss="modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
           
         </div>
           
           </div>
 
 
  </form>
 
  </div>
  </div>
  </div>
  {{--modal cancel end--}}
  @endforeach



  @foreach ($data as $delete)

  <!-- Modal makeAdmin start-->
  <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
   id="makeadmin-{{ $delete->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
   aria-labelledby="staticBackdropLabel" aria-hidden="true">
  
   <div class="modal-dialog relative w-auto pointer-events-none">
   <div
       class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white dark:bg-gray-700 bg-clip-padding rounded-md outline-none text-current">
       <div
       class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
  
  
       <button type="button" class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
           data-bs-dismiss="modal" aria-label="Close"></button>
           
       </div>
       <div class="modal-body relative p-4">
       {{-- isi model --}}
           <form action="/user/MakeAdmin/{{ $delete->id }}" method="POST">
               @csrf
  
  
  
               
               <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
          <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400 text-center">Are you sure you want to Make Admin this User?</h3>
          <div class="flex flex-wrap gap-x-2 mx-auto justify-center">
  
            <button  type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
              Yes, I'm sure
            </button>
            <button data-bs-dismiss="modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
            
          </div>
            
            </div>
  
  
   </form>
  
   </div>
   </div>
   </div>
   {{--modal makeAdmin end--}}
   @endforeach


  
   @endsection
