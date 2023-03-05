@extends('admin.layouts.main')

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
                      Tour Name
                    </th>
                    <th scope="col" class="text-base font-semibold text-gray-900 px-6 py-4 text-left">
                      City
                    </th>
                    <th scope="col" class="text-base font-semibold text-gray-900 px-6 py-4 text-left">
                      Price
                    </th>
                    <th scope="col" class="text-base font-semibold text-gray-900 px-6 py-4 text-left">
                      Status
                    </th>
                    <th scope="col" class="text-base font-semibold text-gray-900 px-6 py-4 text-left">
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody>


                  <tr class="border-b">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $no+1 }}</td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                   
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                       <form action="/user/delete/{{ $user->id }}" method="post">
                          @csrf
                          <button type="submit" class="bg-red-600 p-2 rounded-md text-white">Hapus</button>
                       </form>
                    </td>
                    
                  </tr>


                  
                </tbody>
              </table>


              <nav class="flex gap-x-1 items-center mt-4 justify-end mb-32">
                <div class="flex justify-start">
                    @if ($data->onFirstPage())
                        <span class="px-2 py-1 text-gray-600 bg-white border border-gray-300 rounded-l-md dark:bg-gray-800 dark:text-gray-400 dark:border-gray-700">&laquo; Previous</span>
                    @else
                        <a href="{{ $data->previousPageUrl() }}" class="px-2 py-1 text-white bg-blue-500 border border-blue-500 rounded-l-md hover:bg-blue-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-700 dark:text-white">&laquo; Previous</a>
                    @endif
                </div>
              
                <div class="flex justify-center">
                    @foreach ($data as $element)
                        @if (is_string($element))
                            <span class="px-2 py-1 text-gray-600 bg-white border border-gray-300 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-700">{{ $element }}</span>
                        @endif
              
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $data->currentPage())
                                    <span class="px-2 py-1 text-white bg-blue-500 border border-blue-500 hover:bg-blue-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-700 dark:text-white">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}" class="px-2 py-1 text-gray-600 bg-white border border-gray-300 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-gray-400 dark:hover:text-white">{{ $page }}</a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </div>
              
                <div class="flex justify-end">
                    @if ($data->hasMorePages())
                        <a href="{{ $data->nextPageUrl() }}" class="px-2 py-1 text-white bg-blue-500 border border-blue-500 rounded-r-md hover:bg-blue-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-700 dark:text-white">Next &raquo;</a>
                    @else
                        <span class="px-2 py-1 text-gray-600 bg-white border border-gray-300 rounded-r-md dark:bg-gray-800 dark:text-gray-400 dark:border-gray-700">Next &raquo;</span>
                    @endif
                </div>
              </nav>



            </div>
          </div>
        </div>
      </div>

</div>
    
@endsection