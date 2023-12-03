@extends('layouts.main')

@section('container')
<section class="h-full mb-[390px] px-4 md:px-0 pt-20">
<h1 class="text-center font-semibold text-4xl mb-8">Article</h1>
<form class="w-[100%] md:w-[80%] mx-auto" action="/article">   
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
        <input type="search" id="default-search" name="search" value="{{ request('search') }}" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-orange-500 focus:border-orange-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500" placeholder="Search Name">
        <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-orange-700 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">Search</button>
    </div>
  </form>


<div class="flex gap-4 py-4 mb-10 mt-5 border-b-[1px] overflow-x-auto">

    <a href="/article" class="{{ (request('kategori') === null ) ? 'text-orange-600' : '' }}">All</a>

    @foreach ($kategori as $kategoris)
        <a href="/article?kategori={{ $kategoris->kategori }}" class="{{ (request('kategori') === $kategoris->kategori ) ? 'text-orange-600' : '' }}">{{ $kategoris->kategori }}</a>
    @endforeach

</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
    @foreach ($data as $articles)
        
          
    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 relative pb-10">
      <a href="#">
          <img class="rounded-t-lg w-full h-64 object-cover" src="{{ asset('image/'.$articles->image) }}" alt=""/>
      </a>
      <div class="p-5">
          <p>{{ $articles->kategori }}</p>
          {{-- <div class="flex gap-4">
              <p>Info</p>
              <p>Info</p>
              <p>Info</p>
          </div> --}}
  
          <a href="#">
              <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white line-clamp-2">{{ $articles->judul }}</h5>
          </a>
  
          <a href="/article/show/{{ $articles->slug }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-orange-700 rounded-lg hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800 absolute bottom-3">
              Read more
              <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
          </a>
  
  
  
  
      </div>
  </div>
  @endforeach
</div>

{{ $data->links('vendor.pagination.tailwind') }}

</section>

@endsection