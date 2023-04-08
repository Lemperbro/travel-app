@extends('admin.layouts.main')

@section('container')

<div class="mt-20 bg-white p-10 rounded-md shadow-md">
  

    <div class="flex gap-x-4">

                <!-- Button trigger modal -->
        <button type="button"
        class="inline-block px-6 py-2.5 bg-blue-600 text-white font-semibold text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out "
        data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        FIlter City
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
                    <div class="mt-2">
                        <input id="all" class="form-radio h-5 w-5 text-blue-500 " type="radio" name="pilihDaerah" value="" {{ (request('pilihDaerah') === null)? 'checked' : ''  }}/>
                        <label for="all" class="inline-flex items-center ml-2 cursor-pointer ">
                            <span class="text-gray-900">All</span>
                        </label>
                    </div>

                    @foreach ($kota as $kota)
                    <div class="mt-2">
                        <input id="{{ $kota->slug }}" class="form-radio h-5 w-5 text-blue-500 " type="radio" name="pilihDaerah" value="{{ $kota->slug }}" {{ (request('pilihDaerah') === $kota->slug)? 'checked' : ''  }}/>
                        <label for="{{ $kota->slug }}" class="inline-flex items-center ml-2 cursor-pointer ">
                            <span class="text-gray-900">{{ $kota->nama_kota }}</span>
                        </label>
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

       <a href="/admin/wisata/add" class="bg-orange-600 text-white p-2 rounded-md font-semibold">Add Tour</a>
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
               class="inline-block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 w-full text-center">
               Edit
              </a>

              <a href="/admin/wisata/faq/{{ $wisata->slug }}"
                class="inline-block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 w-full text-center">
                Manage FAQ
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
            <div class="flex justify-between">
                <h1 class="font-semibold text-center mt-2">{{ $wisata->tour_type }}</h1>
                <h1 class="font-semibold text-center mt-2">Rp.{{ $wisata->harga }} </h1>


                {{-- <h4 class="text-center">{{ $wisata->diboking }}</h4> --}}
            </div>

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



    {{ $data->links('vendor.pagination.tailwind') }}

 
</div>





@endsection