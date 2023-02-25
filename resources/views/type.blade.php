@extends('layouts.main')
<div>
    <img src='{{ asset('img/2.png') }}' class='h-[58vh] w-full object-cover'/>
    <div class="absolute inset-0">

    <h1 class='absolute top-48 text-center text-white left-[50%] -translate-x-[50%] text-4xl font-bold'>{{ $type }}</h1>

    <div class="mx-auto mt-5 max-w-screen-md py-20 leading-6 absolute top-48 left-[50%] translate-x-[-50%] w-[50%]"> 
      <form action="/wisata/type/{{ $type }}/" autocomplete="off" class="relative mx-auto flex w-full max-w-2xl items-center justify-between rounded-md border shadow-lg"> 
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
