@extends('layouts.main')



@include('partials.carousel')

@section('container')




<div class='container mt-9 lg:grid-cols-2 md:flex '>
    <div class='grid-cols-2 w-[50%] mt-4'>
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
      <a href="/destinasi/{{ $kota->slug }}" class='rounded-xl relative shadow-best'>
        <h1 class='text-white font-semibold text-2xl absolute bottom-2 transform translate-x-[-50%] left-[50%] md:grid-cols-2'>{{ $kota->nama_kota }}</h1>
        <img src='{!! asset('image/'.$images[0]) !!}' class='object-cover w-full h-96 rounded-xl'/>
      </a>

  @endforeach

      <a href="/kota/" class="p-3 rounded-full bg-orange-500 absolute top-[50%] translate-y-[-50%] -right-9 text-white text-center ">
        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path fill="#fff" d="m304 974-56-57 343-343-343-343 56-57 400 400-400 400Z"/></svg>
      </a>
   </div>


   <h1 class='text-2xl font-bold border-black text-center mt-10 mb-4'>Most Popular</h1>
@include('partials.most')

@include('partials.latest')




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
  <img src='/icons/ig.png' class='object-contain w-12'/>
  <img src='/icons/fb.png' class='object-contain w-12'/>
  <img src='/icons/wa.png' class='object-contain w-12'/>
  <img src='/icons/gmail.png' class='object-contain w-12'/>
  </div>



  
@endsection