@extends('layouts.main')

@section('container')

<div class="px-4 md:px-0">
    <img src="{{ asset('image/'.$data_article->image) }}" alt="" class="w-full h-[500px] object-cover">

    <h1 class="mt-10 font-semibold text-2xl">{{ $data_article->judul }}</h1>
    <div class="mt-5">
    {!! $data_article->isi !!}
    </div>
    
</div>


<div class="mt-5 px-4 md:px-0">

    <div class="flex justify-between border-b-[1px] mt-10 container py-4">
        <h1 class="font-semibold text-2xl">Wisata Terkait</h1>
      </div>

      @include('partials.card')
      {{ $data->links('vendor.pagination.tailwind') }}
  
</div>

<div class="mt-5">

    <div class="flex justify-between border-b-[1px] mt-10 container py-4">
        <h1 class="font-semibold text-2xl">Lainnya</h1>
      </div>


      <div class="grid grid-cols-1 sm:grid-cols-2  lg:grid-cols-4 gap-4  my-10">


        @foreach ($article as $articles)
        
          
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
      
              <a href="/article/show/{{ $articles->slug }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 absolute bottom-3">
                  Read more
                  <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
              </a>
      
      
      
      
          </div>
      </div>
      @endforeach
      
      </div>

</div>

@endsection