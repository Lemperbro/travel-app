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
<div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5 mb-10 mt-10">


  @foreach ($data as $latest_post)
  @php
  $images = explode('|', $latest_post->image);
@endphp
  <a href="/wisata/{{ $latest_post->slug }}" class="block rounded-lg p-4 shadow-best dark:bg-gray-700 bg-white">
    <img
      alt="Home"
      src="{{ asset('image/'.$images[0]) }}"
      class="h-56 w-full rounded-md object-cover"
    />
  
    <div class="mt-2">
      <dl>
        <div>
          <dt class="sr-only">Price</dt>
  
          <dd class="text-sm text-orange-600 font-semibold">Start From Rp. {{ number_format($latest_post->harga,0,',','.') }}</dd>
        </div>
  
        <div>
          <dt class="sr-only">Address</dt>
  
          <dd class="text-gray-900 dark:text-white font-semibold text-xl">{{ $latest_post->nama_wisata }}</dd>
        </div>
        <div>
          <p class="text-gray-700 text-base line-clamp-3">
            {{ $latest_post->deskripsi }}
          </p>
          
        </div>
      </dl>
  
      <div class="mt-6 grid grid-cols-3 items-center gap-8 text-xs">
        <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24" class="text-orange-600 dark:text-white w-7 h-7" style="transform: ;msFilter:;"><path d="M21 6h-4V3a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v7H3a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1zM6 18H4v-2h2v2zm0-4H4v-2h2v2zm5 4H9v-2h2v2zm0-4H9v-2h2v2zm0-4H9V8h2v2zm0-4H9V4h2v2zm4 12h-2v-2h2v2zm0-4h-2v-2h2v2zm0-4h-2V8h2v2zm0-4h-2V4h2v2zm5 12h-2v-2h2v2zm0-4h-2v-2h2v2zm0-4h-2V8h2v2z"></path></svg>
  
          <div class="mt-1.5 sm:mt-0">
            <p class="text-gray-900 dark:text-gray-200 font-semibold">City</p>

            <p class="font-medium text-gray-700 dark:text-gray-300">{{ $latest_post->kota->nama_kota }}</p>
          </div>
        </div>
  
        <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
          <div class="relative">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-orange-600 w-7 h-7 " style="transform: ;msFilter:;"><path d="M7 11h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zm0 4h2v2h-2zm4-4h2v2h-2zm0 4h2v2h-2z"></path><path d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zM19 8l.001 12H5V8h14z"></path></svg>

            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="absolute top-3 -right-1 w-4"  style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M12.25 2c-5.514 0-10 4.486-10 10s4.486 10 10 10 10-4.486 10-10-4.486-10-10-10zM18 13h-6.75V6h2v5H18v2z"></path></svg>

        </div>
  
          <div class="mt-1.5 sm:mt-0">
            <p class="text-gray-900 dark:text-gray-200 font-semibold">Long Tour</p>

            <p class="font-medium text-gray-700 dark:text-gray-300">{{ $latest_post->long_tour }}</p>
          </div>
        </div>
  
        <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-orange-600 dark:text-white w-7 h-7" style="transform: ;msFilter:;"><path d="M19.965 8.521C19.988 8.347 20 8.173 20 8c0-2.379-2.143-4.288-4.521-3.965C14.786 2.802 13.466 2 12 2s-2.786.802-3.479 2.035C6.138 3.712 4 5.621 4 8c0 .173.012.347.035.521C2.802 9.215 2 10.535 2 12s.802 2.785 2.035 3.479A3.976 3.976 0 0 0 4 16c0 2.379 2.138 4.283 4.521 3.965C9.214 21.198 10.534 22 12 22s2.786-.802 3.479-2.035C17.857 20.283 20 18.379 20 16c0-.173-.012-.347-.035-.521C21.198 14.785 22 13.465 22 12s-.802-2.785-2.035-3.479zm-9.01 7.895-3.667-3.714 1.424-1.404 2.257 2.286 4.327-4.294 1.408 1.42-5.749 5.706z"></path></svg>
  
          <div class="mt-1.5 sm:mt-0">
            <p class="text-gray-900 dark:text-gray-200 font-semibold">Type Tour</p>

            <p class="font-medium text-gray-700 dark:text-gray-300">{{ $latest_post->tour_type }}</p>
          </div>
        </div>
      </div>
    </div>
  </a>
  @endforeach



</div>

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

{{ $data->links('vendor.pagination.tailwind') }}

@endsection

    </div>

