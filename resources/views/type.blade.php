@extends('layouts.main')
<div>
    <img src='{{ asset('img/2.png') }}' class='h-[58vh] w-full object-cover'/>
    <div class="">

    <h1 class='absolute top-48 text-center text-white left-[50%] -translate-x-[50%] text-4xl font-bold'>{{ $type }}</h1>

    <div class="mx-auto mt-5 max-w-screen-md py-20 leading-6 absolute top-48 left-[50%] translate-x-[-50%] w-[50%]"> 
      <form action="/wisata/type/{{ $type }}/" autocomplete="off" class="relative mx-auto flex w-full max-w-2xl items-center justify-between rounded-md border shadow-lg"> 
        <svg class="absolute left-2 block h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="11" cy="11" r="8" class=""></circle>
          <line x1="21" y1="21" x2="16.65" y2="16.65" class=""></line>
        </svg>
        <input type="name" name="search" class="h-14 w-full rounded-md py-4 pr-40 pl-12 outline-none focus:ring-2" placeholder="City, Destination" value="{{ request('search') }}"/>
        <button type="submit" class="absolute right-0 mr-1 inline-flex h-12 items-center justify-center rounded-lg bg-gray-900 px-10 font-medium text-white focus:ring-4 hover:bg-gray-700">Search</button>
      </form>
    </div>

    </div>

  </div>

  @section('container')


  <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5 mb-20 ">

@foreach ($data as $wisata)
    

        @php
        $images = explode('|', $wisata->image);
        @endphp
                <!--Card 1-->
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




  @endsection
  @if ($data->count() === 0)
    <!-- component -->
<div class="w-full h-[30%] flex flex-col items-center justify-center mt-[5%]">

<img src="{{ asset('icons/db.png') }}" alt="" class="w-32">


  <div class="flex flex-col items-center justify-center">
      <p class="text-3xl md:text-4xl lg:text-5xl text-gray-800 mt-12">{{ request('search') }} Not Found</p>
      <p class="md:text-lg lg:text-xl text-gray-600 mt-8">Sorry, {{ request('search') }} you are looking for could not be found.</p>
      <a href="/" class="flex items-center space-x-2 bg-orange-600 hover:bg-orange-700 text-gray-100 px-4 py-2 mt-12 rounded transition duration-150" title="Return Home">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
          </svg>
          <span>Return Home</span>
      </a>
  </div>
</div>
  @endif