@extends('layouts.main')



@include('partials.carousel')

@section('container')




<div class='container mt-9 lg:grid-cols-2 md:flex '>
    <div class='grid-cols-2 w-[50%] mt-4'>
      <h1 class='font-semibold text-5xl text-[#FF2E00]'>Find The Perfect</h1>
      <h1 class='font-semibold text-5xl text-[#FF2E00]'>Place</h1>
      <p class='font-medium mt-6 text-lg '>a list of the top best 25 tourist places to see</p>
      <p class='font-medium '>in indonesia for a perfect holiday or a trip</p>
      <div class='mt-3'>
        <button class='border shadow-md px-3   py-1 rounded-xl bg-[#FF2E00] text-white font-semibold '>
          View More
        </button>
      </div>
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

  <iframe class="text-center mx-auto"
  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.9521455537024!2d112.60469731418937!3d-7.900068680794963!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7881c2c4637501%3A0x10433eaf1fb2fb4c!2sHummasoft%20Technology!5e0!3m2!1sid!2sid!4v1674017713271!5m2!1sid!2sid"
  width="1024",
  height="512",
  style='border: 0',
  allowFullScreen=" true",
  aria-hidden="false",
  tabIndex="0"></iframe>


   <h1 class='text-center mt-6 text-3xl font-bold '>
    Follow Us
  </h1>
  <div class='flex mt-6 justify-center grid-cols-4 gap-8 pb-16'>
  <img src='/icons/ig.png' class='object-contain w-12'/>
  <img src='/icons/fb.png' class='object-contain w-12'/>
  <img src='/icons/wa.png' class='object-contain w-12'/>
  <img src='/icons/gmail.png' class='object-contain w-12'/>
  </div>



  
@endsection