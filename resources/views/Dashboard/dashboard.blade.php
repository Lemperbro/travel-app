@extends('layouts.main')



@include('partials.carousel')

@section('container')




<div class='container mt-9 lg:grid-cols-2 md:flex '>
    <div class='grid-cols-2 w-full md:w-[50%] mt-4'>
      <h1 class='font-semibold text-5xl text-[#FF2E00]'>Find The Perfect</h1>
      <h1 class='font-semibold text-5xl text-[#FF2E00]'>Place</h1>
      <p class='font-medium mt-6 text-lg '>a list of the top best 25 tourist places to see</p>
      <p class='font-medium '>in indonesia for a perfect holiday or a trip</p>
      <form action="/wisata/perfect" class='mt-3'>
        <button type="submit" name="perfect_place" class='border shadow-md px-3   py-1 rounded-xl bg-[#FF2E00] text-white font-semibold '>
          View More
        </button>
      </form>
    </div>

    <div class='w-[50%] mt-4'>
    @include('partials.swiper')
    </div>
</div>

<div class='flex mx-auto my-12'>
    <h1 class='text-2xl font-bold 
     border-black mx-auto'>Growin Travel Indonesia 
     <span class='border-r-2 border-black mx-3'></span> Travel Destination</h1>
</div>

<div class="mt-6 mb-7 grid grid-cols-4 md:grid-cols-4 lg:grid-cols-4 gap-8 relative">

  @foreach ($kota as $kota)
      @php
      $images = explode('|', $kota->image);
    @endphp
      <a href="/destinasi/{{ $kota->slug }}" class='rounded-xl relative shadow-best overflow-hidden'>
        <h1 class='text-white z-20 font-semibold text-2xl absolute bottom-2 transform translate-x-[-50%] left-[50%] md:grid-cols-2'>{{ $kota->nama_kota }}</h1>
        <img src='{!! asset('image/'.$images[0]) !!}' class='object-cover w-full h-96 rounded-xl'/>
        <span class="z-10 absolute bg-gradient-to-t from-black to-white/0 inset-0 h-32 top-64"></span>
      </a>

  @endforeach

      <a href="/kota/" class="p-3 rounded-full bg-orange-500 absolute top-[50%] translate-y-[-50%] -right-9 text-white text-center ">
        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path fill="#fff" d="m304 974-56-57 343-343-343-343 56-57 400 400-400 400Z"/></svg>
      </a>
   </div>


   <h1 class='text-2xl font-bold border-black text-center mt-10 mb-4'>Most Popular</h1>
@include('partials.most')

@include('partials.latest')

<h1 class="text-2xl font-bold border-black text-center mt-16 mb-4">Our Guide Team</h1>
@include('partials.slider')
 





</div>


<div class="flex justify-between border-b-[1px] mt-10 container py-4">
  <h1 class="font-semibold text-2xl">Article</h1>
  <a href="/article">Find All</a>
</div>

<div class="grid lg:grid-cols-4 gap-4 container my-10">


  @foreach ($article as $articles)

  <div class=" bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 relative pb-10">
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

<div class='mt-8'>
  <h1 class='text-center font-bold text-4xl'>
      Location
  </h1>
  <p class='text-center text-xl mt-4'>
  Perum Permata Regency 1 Blok 10/28, Perun Gpa, Ngijo, Kec. Karang Ploso, 
  <p class="text-center">Kabupaten Malang, Jawa Timur 65152</p>
  </p>
  <div class='mt-6'>

<div class="mapouter container mb-0"><div class="gmap_canvas"><iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=hummasoft&t=&z=10&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://2yu.co">2yu</a><br><style>.mapouter{position:relative;text-align:right;height:100%;width:100%;}</style><a href="https://embedgooglemap.2yu.co/">html embed google map</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:80%;width:100%;}</style></div></div>


   <h1 class='text-center text-3xl font-bold '>
    Follow Us
  </h1>
  <div class='flex mt-6 justify-center grid-cols-4 gap-8 pb-16'>
  <a href=""><img src='/icons/ig.png' class='object-contain w-12 cursor-pointer'/></a> 
  <img src='/icons/fb.png' class='object-contain w-12'/>
  <img src='/icons/wa.png' class='object-contain w-12'/>
  <img src='/icons/gmail.png' class='object-contain w-12'/>
  </div>



  
@endsection