@extends('admin.layouts.main')

@section('container')

<div class="mt-20 bg-white p-10 rounded-md shadow-md">
  

    <div class="flex gap-x-4">

                <!-- Button trigger modal -->
        <button type="button"
        class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
        data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        FIlter Kota
        </button>

        <!-- Modal -->
        <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
        id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">

        <div class="modal-dialog relative w-auto pointer-events-none">
        <div
            class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
            <div
            class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
            <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalLabel">
                Pilih Kota
            </h5>
            <button type="button"
                class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body relative p-4">
            {{-- isi model --}}
                <form action="/admin/wisata/">
                    
                    @foreach ($kota as $kota)
                    <div class="mt-2">
                        <input id="{{ $kota->slug }}" class="peer/{{ $kota->slug }} hidden" type="radio" name="pilihDaerah" value="{{ $kota->slug }}"/>
                        <label for="{{ $kota->slug }}" class="w-full border p-2 rouned-md block peer-checked/{{ $kota->slug }}:bg-sky-500 peer-checked/{{ $kota->slug }}:text-white">{{ $kota->nama_kota }}</label>
                        
                    </div>
                    @endforeach




                    
            </div>

            <div
            class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
            <button type="button"
                class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                data-bs-dismiss="modal">Close</button>
            <button type="submit"
                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">Selesai</button>

            </div>
        </form>

        </div>
        </div>
        </div>
        {{-- akhir modal --}}

       <a href="/admin/wisata/add" class="bg-orange-600 text-white p-2 rounded-md">Tambah Wisata</a>
    </div>

    <div class="grid grid-cols-4 gap-4 mt-8">

        @foreach ($data as $wisata)


            
       <div class="rounded-md p-2 border">

        <div class="relative inline-block float-right">
            <div>
              <button type="button" class="inline-flex justify-center w-full options-menu-wisata{{ $wisata->id }}">
               <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 9a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 13a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                </svg>
              </button>
            </div>
          
            <div class="origin-top-right absolute right-0 mt-2 w-56 rounded-md  bg-white ring-1 ring-black ring-opacity-5 focus:outline-none shadow-best5 hidden dropdown-menu-wisata{{ $wisata->id }}">
              <div class="py-1" role="none">

               <a href="/admin/wisata/edit/{{ $wisata->id }}"
               class="inline-block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 w-full"
               data-bs-toggle="modal" data-bs-target="#exampleModalLong-{{ $wisata->id }}">
               Edit
              </a>   


               <form action="/admin/wisata/delete/{{ $wisata->id }}" method="POST">
                  @csrf
                  <button type="submit" class="block px-4 py-2 text-sm text-red-700 hover:bg-red-100 hover:text-red-900 w-full">
                     Delete
                  </button>
               </form>

              </div>
            </div>
          </div>

          @include('admin.wisata.actionMenu')
          
               
           @php
              $images = explode('|', $wisata->image);
           @endphp

          <img src="../../image/{!! $images[0] !!}" alt="" class="h-48 object-cover w-full">

          <div class="mt-4">
             <h1 class="font-semibold font-mono text-center text-xl">{{ $wisata->nama_wisata }}</h1>

            <h1 class="font-semibold text-center mt-2">DI Booking</h1>
            <h4 class="text-center">{{ $wisata->diboking }}</h4>
            {{-- @foreach ($wisata->equipment as $equip)
                @php
                    $equip_image = explode("|", $equip->image);
                @endphp
                <div class="flex">

                @foreach ($equip_image as $image)
                <p>{!! $image !!}</p>
                    
                @endforeach
            </div>

            @endforeach --}}

                


       </div>

       </div>

       @endforeach

        
    </div>



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





@endsection