@extends('layouts.main')



@include('partials.carousel')
@include('partials.contain')

@section('container')




{{-- <div class="grid grid-cols-4">



</div> --}}

{{-- <div class="grid grid-cols-4">
    @foreach ($best as $data)
    <a href="/wisata/{{ $data->id }}" class="hadow-md p-2 h-96 overflow-hidden inline-block">
        <img src="{{ asset('storage/'.$data->image) }}" alt="">
        <h1>{{ $data->nama_wisata }}</h1>
        <p>di booking : {{ $data->diboking }}</p>
    </a>
@endforeach
</div> --}}




<div class='container mt-9 flex'>
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

<div class='flex mx-auto'>
    <h1 class='text-2xl font-bold 
     border-black mx-auto'>Growin Travel Indonesia 
     <span class='border-r-2 border-black mx-3'></span> Travel Destination</h1>
</div>

<div class="mt-6 mb-7 grid grid-cols-5 grid-rows-2 gap-8">

    <div class='  rounded-xl'>
     <button>
       <h1 class='text-white font-semibold text-xl absolute py-40 pl-14'>Bali</h1>
       <img src='img/bali.png' class='object-contain'/>
     </button>
    </div>

    <div class='  rounded-xl '>
     <button>
       <h1 class='text-white font-semibold text-xl absolute py-40 pl-9'>Malang</h1>
       <img src='/img/malang.png' class='object-contain shadow-best5 rounded-xl'/>
     </button>
    </div>

    <div class='  rounded-xl '>
     <button>
       <h1 class='text-white font-semibold text-xl absolute py-40 pl-9'>Jogja</h1>
       <img src='/img/jogja.png' class='object-contain shadow-best5 rounded-xl'/>
     </button>
    </div>

    <div class='  rounded-xl '>
     <button>
       <h1 class='text-white font-semibold text-xl absolute py-40 pl-9'>Jogja</h1>
       <img src='/img/jogja.png'class='object-contain shadow-best5 rounded-xl'/>
     </button>
    </div>

    <div class='  rounded-xl '>
     <button>
       <h1 class='text-white font-semibold text-xl absolute py-40 pl-9'>Jogja</h1>
       <img src='/img/jogja.png' class='object-contain shadow-best5 rounded-xl'/>
     </button>
    </div>

    <div class='  rounded-xl '>
     <button>
       <h1 class='text-white font-semibold text-xl absolute py-40 pl-9'>Jogja</h1>
       <img src='/img/jogja.png'class='object-contain shadow-best5 rounded-xl'/>
     </button>
    </div>

    <div class='  rounded-xl '>
     <button>
       <h1 class='text-white font-semibold text-xl absolute py-40 pl-9'>Jogja</h1>
       <img src='/img/jogja.png' class='object-contain shadow-best5 rounded-xl'/>
     </button>
    </div>

    <div class='  rounded-xl '>
     <button>
       <h1 class='text-white font-semibold text-xl absolute py-40 pl-9'>Jogja</h1>
       <img src='/img/jogja.png'class='object-contain shadow-best5 rounded-xl'/>
     </button>
    </div>

    <div class='  rounded-xl '>
     <button>
       <h1 class='text-white font-semibold text-xl absolute py-40 pl-9'>Jogja</h1>
       <img src='/img/jogja.png'class='object-contain shadow-best5 rounded-xl'/>
     </button>
    </div>

    <div class='  rounded-xl '>
     <button>
       <h1 class='text-white font-semibold text-xl absolute py-40 pl-9'>Jogja</h1>
       <img src='/img/jogja.png'class='object-contain shadow-best5 rounded-xl'/>
     </button>
    </div>
   </div>


</div>
<div class='mt-8'>
  <h1 class='text-center font-bold text-4xl'>
      Location
  </h1>
  <p class='text-center text-xl mt-4'>
  Perum Permata Regency 1 Blok 10/28, Perun Gpa, Ngijo, Kec. Karang Ploso, 
  <p class="text-center">Kabupaten Malang, Jawa Timur 65152</p>
  </p>
  <div class='mt-6 ml-20'>

  <iframe class="text-center"
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