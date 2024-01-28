@extends('admin.layouts.main')

@section('container')
<div class="px-4 py-8">
  <h1 class="text-center font-semibold text-white text-2xl mb-8">High Season For {{ $wisata->nama_wisata }}</h1>
  
  <div class="flex flex-wrap gap-4">
    
    <a href="/admin/wisata/{{ $slug }}/session/add" class="text-white bg-green-600 p-2 rounded-md font-semibold">
      Add Hight Session
    </a>
    
    

      <button class="bg-red-700 text-white font-semibold p-2 rounded-md" data-bs-toggle="modal"
      data-bs-target="#deleteAll">Delete All</button>

    @if ($weekend->count() == 0)
      
    <a href="/admin/wisata/{{ $slug }}/weekend/add" class="text-white bg-yellow-400  p-2 rounded-md font-semibold">
      Add Price Weekend
    </a>
    @endif

  </div>
@if ($weekend->count() > 0)
  
<h1 class="text-gray-900 dark:text-white font-semibold text-xl mt-4">Price Weekend</h1>
@foreach ($weekend as $weekends)
  
<div class="text-white font-semibold bg-gray-600 rounded-md px-12 pt-5 pb-20  text-center inline-block text-xl relative mt-4">
  <h1>Price Weekend</h1>
  <div class="mt-2">
    <h1 class="text-base">Adult : Rp. {{ number_format($weekends->price,0,',','.') }}</h1>
    @if ($weekends->price_child !== null)
    <h1 class="text-base">Child : Rp. {{ number_format($weekends->price_child,0,',','.') }}</h1>
      
    @endif
  </div>
    <div class="absolute right-2 bottom-2 flex gap-x-4">

        <button type="button" class="bg-red-600 p-2 rounded-md" data-bs-toggle="modal"
        data-bs-target="#weekend-{{ $weekends->id }}">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-white" style="transform: ;msFilter:;">
            <path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z"></path>
          </svg>
        </button>

      
      <a href="/admin/wisata/{{ $slug }}/weekend/edit" class="inline-block bg-green-500 p-2 rounded-md">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-white" style="transform: ;msFilter:;"><path d="m7 17.013 4.413-.015 9.632-9.54c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.756-.756-2.075-.752-2.825-.003L7 12.583v4.43zM18.045 4.458l1.589 1.583-1.597 1.582-1.586-1.585 1.594-1.58zM9 13.417l6.03-5.973 1.586 1.586-6.029 5.971L9 15.006v-1.589z"></path><path d="M5 21h14c1.103 0 2-.897 2-2v-8.668l-2 2V19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2z"></path></svg>
    </a>
  </div>
</div>
@endforeach

  @endif
  
  @if ($data->count() > 0)
    <h1 class="text-gray-900 dark:text-white font-semibold text-xl mt-4">High Season</h1>
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 mb-8 mt-4">

    @foreach ($data as $datas)
    <div class="text-white font-semibold bg-gray-600 rounded-md pt-6 pb-14  text-center inline-block text-xl relative">
      {{ \Carbon\Carbon::parse($datas->startDate)->format('d F Y') }} - {{ \Carbon\Carbon::parse($datas->endDate)->format('d F Y') }}
      <div class="mt-2">
        <h1 class="text-base">Adult : Rp. {{ number_format($datas->price,0,',','.') }}</h1>
        @if ($datas->price_child !== null)
        <h1 class="text-base">Child : Rp. {{ number_format($datas->price_child,0,',','.') }}</h1>
          
        @endif
      </div>

      <div class="absolute bottom-2 right-2 flex gap-x-4">


          <button type="button" class="bg-red-600 p-2 rounded-md" data-bs-toggle="modal"
          data-bs-target="#session-{{ $datas->id }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-white" style="transform: ;msFilter:;"><path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z"></path></svg>
        </button>

      <a href="/admin/wisata/{{ $slug }}/session/edit" class="inline-block bg-green-500 p-2 rounded-md">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-white" style="transform: ;msFilter:;"><path d="m7 17.013 4.413-.015 9.632-9.54c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.756-.756-2.075-.752-2.825-.003L7 12.583v4.43zM18.045 4.458l1.589 1.583-1.597 1.582-1.586-1.585 1.594-1.58zM9 13.417l6.03-5.973 1.586 1.586-6.029 5.971L9 15.006v-1.589z"></path><path d="M5 21h14c1.103 0 2-.897 2-2v-8.668l-2 2V19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2z"></path></svg>
      </a>
    </div>

    </div>
    @endforeach
    
  </div>
  @else
  <h1 class="text-gray-500 font-semibold flex m-auto text-3xl justify-center mt-10">Nothing</h1>
  @endif

</div>



<!-- Modal delete all start-->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
    id="deleteAll" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <div class="modal-dialog relative w-auto pointer-events-none">
        <div
            class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white dark:bg-gray-700 bg-clip-padding rounded-md outline-none text-current">
            <div
                class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">


                <button type="button"
                    class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                    data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body relative p-4">
                {{-- isi model --}}
                <form action="/admin/wisata/{{ $slug }}/session/deleteAll" method="POST">
                    @csrf
                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400 text-center">Are you sure
                        you want to Delete All this Session Or Weekend Price ?</h3>
                    <div class="flex flex-wrap gap-x-2 mx-auto justify-center">

                        <button type="submit"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Yes, I'm sure
                        </button>
                        <button data-bs-dismiss="modal" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                            cancel</button>

                    </div>

            </div>


            </form>

        </div>
    </div>
</div>
{{-- modal delete all end --}}



@foreach ($weekend as $delete)
<!-- Modal delete weekend start-->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
    id="weekend-{{ $delete->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <div class="modal-dialog relative w-auto pointer-events-none">
        <div
            class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white dark:bg-gray-700 bg-clip-padding rounded-md outline-none text-current">
            <div
                class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">


                <button type="button"
                    class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                    data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body relative p-4">
                {{-- isi model --}}
                <form action="/admin/wisata/{{ $delete->id }}/weekend/delete" method="POST">
                    @csrf
                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400 text-center">Are you sure
                        you want to Delete this Weekend Price ?</h3>
                    <div class="flex flex-wrap gap-x-2 mx-auto justify-center">

                        <button type="submit"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Yes, I'm sure
                        </button>
                        <button data-bs-dismiss="modal" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                            cancel</button>

                    </div>

            </div>


            </form>

        </div>
    </div>
</div>
{{-- modal delete weekend end --}}
@endforeach


@foreach ($data as $delete)
<!-- Modal delete session start-->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
    id="session-{{ $delete->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <div class="modal-dialog relative w-auto pointer-events-none">
        <div
            class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white dark:bg-gray-700 bg-clip-padding rounded-md outline-none text-current">
            <div
                class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">


                <button type="button"
                    class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                    data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body relative p-4">
                {{-- isi model --}}
                <form action="/admin/wisata/{{ $delete->id }}/session/delete" method="POST">
                    @csrf
                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400 text-center">Are you sure
                        you want to Delete this Session ?</h3>
                    <div class="flex flex-wrap gap-x-2 mx-auto justify-center">

                        <button type="submit"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Yes, I'm sure
                        </button>
                        <button data-bs-dismiss="modal" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                            cancel</button>

                    </div>

            </div>


            </form>

        </div>
    </div>
</div>
{{-- modal delete session end --}}
@endforeach


@endsection