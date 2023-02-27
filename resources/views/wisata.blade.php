@extends('layouts.main')

      <div>

        <div>
          <img src='{{ asset('img/2.png') }}' class='h-[58vh] w-full object-cover'/>
          <div class="absolute inset-0">
          <h1 class='absolute top-48 text-center text-white left-[50%] -translate-x-[50%] text-4xl font-bold'>SELECT YOUR PREFERRED DESTINATION</h1>

          <div class="mx-auto mt-5 max-w-screen-md py-20 leading-6 absolute top-48 left-[50%] translate-x-[-50%] w-[50%]"> 
            <form action="/wisata/" autocomplete="off" class="relative mx-auto flex w-full max-w-2xl items-center justify-between rounded-md border shadow-lg"> 
              <svg class="absolute left-2 block h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8" class=""></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65" class=""></line>
              </svg>
              <input type="name" name="search" class="h-14 w-full rounded-md py-4 pr-40 pl-12 outline-none focus:ring-2" placeholder="City, Address, Zip :" value="{{ request('search') }}"/>
              <button type="submit" class="absolute right-0 mr-1 inline-flex h-12 items-center justify-center rounded-lg bg-gray-900 px-10 font-medium text-white focus:ring-4 hover:bg-gray-700">Search</button>
            </form>
          </div>
          
          </div>
        </div>

@section('container')
<div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5 mb-10">


  @foreach ($data as $wisata)
  
  
  @php
  $images = explode('|', $wisata->image);
@endphp

  <a href="/wisata/{{ $wisata->slug }}" class="rounded overflow-hidden shadow-best4">
    <img class="w-full h-64 object-cover" src="/image/{!! $images[0] !!}" alt="Mountain">
    <div class="px-6 py-4">
      <div class="font-bold text-xl mb-2 capitalize">{{ $wisata->nama_wisata }}</div>
      <p class="text-gray-700 text-base line-clamp-4">
        {{ $wisata->deskripsi }}
      </p>
    </div>
    
    <div class="px-6 pt-4 pb-2">
      <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $wisata->tour_type }}</span>
      <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $wisata->long_tour }}</span>
      <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $wisata->location }}</span>
    </div>
  </a> 


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

@endsection

    </div>

