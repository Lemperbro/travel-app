@extends('layouts.main')



@section('container')


<div classs=''>
   @include('partials.carousel')
 
    <div>
      <div class='container mt-8 mb-9 flex justify-between'>
        <div class=' mt-4'>
          <h1 class='font-semibold text-5xl text-[#FF2E00]'>Find The Perfect</h1>
          <h1 class='font-semibold text-5xl text-[#FF2E00]'>Place</h1>
          <p class='font-medium mt-6 text-lg '>a list of the top best 25 tourist places to see</p>
          <p class='font-medium '>in indonesia for a perfect holiday or a trip</p>
          <div class='mt-3'>
           <a><button class='border shadow-md px-3   py-1 rounded-xl bg-[#FF2E00] text-white font-semibold '>
              View More
            </button>
            </a>
          </div>
        </div>
        <div class='w-[50%] mt-1'>
        @include('partials.carousel')
        </div>
        </div>
        <div class='container'>

          <div class='flex mx-auto'>
          <h1 class='text-2xl font-bold 
           border-black mx-auto'>Growin Travel Indonesia 
           <span class='border-r-2 border-black mx-3'></span> Travel Destination</h1>

          </div>
          {/* card start */}
          <div class="mt-6 mb-7 grid grid-cols-5 grid-rows-2 gap-8">

           <div class='  rounded-xl'>
            <button>
              <h1 class='text-white font-semibold text-xl absolute py-40 pl-14'>Bali</h1>
              <img src='/img/bali.png' class='object-contain'/>
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
              <h1 class='text-white font-semibold text-xl absolute py-40 pl-9'>Malang</h1>
              <img src='/img/malang.png' class='object-contain shadow-best5 rounded-xl'/>
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
              <h1 class='text-white font-semibold text-xl absolute py-40 pl-9'>Malang</h1>
              <img src='/img/malang.png' class='object-contain shadow-best5 rounded-xl'/>
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
              <h1 class='text-white font-semibold text-xl absolute py-40 pl-9'>Malang</h1>
              <img src='/img/malang.png' class='object-contain shadow-best5 rounded-xl'/>
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
              <h1 class='text-white font-semibold text-xl absolute py-40 pl-9'>Malang</h1>
              <img src='/img/malang.png' class='object-contain shadow-best5 rounded-xl'/>
            </button>
           </div>

           <div class='  rounded-xl '>
            <button>
              <h1 class='text-white font-semibold text-xl absolute py-40 pl-9'>Malang</h1>
              <img src='/img/malang.png' class='object-contain shadow-best5 rounded-xl'/>
            </button>
           </div> 
          {/* card end */}
           
        
          {/* view more start */}
          </div>
          <button class=' text-white font-bold text-xl w-full text-center bg-[#FF2E00] mb-5 rounded-lg'>View More</button>
          {/* view more end */}

          {/* most popular start */}
          <h1 class='text-2xl font-bold border-black text-center mt-4'>Most Popular & Bromo</h1>
          <div class="mt-6 mb-7 grid grid-cols-3 grid-rows-2 gap-8">

            <a class='relative'>
                <img src='/img/a.png' class='object-contain'/>
                <div class='absolute top-5 left-1 w-40'>
                <img src='/img/layer.png' class=' relative w-40'/>
                <h1 class='absolute top-1 left-2 text-xl text-white font-semibold'>Popular</h1>
                </div>
                <h1 class='text-xl ml-1 font-bold text-center mt-2'>
                  Heha Sky View
                </h1>
                <div class='mx-auto text-center mt-3'>
                  <button class='border shadow-md px-3 py-1 rounded-xl bg-[#FF2E00] text-white font-serif '>
                  Booking Now
                  </button>
                </div>
            </a>

            <a class='relative'>
                <img src='/img/b.png' class='object-contain'/>
                <div class='absolute top-5 left-1 w-40'>
                <img src='/img/layer.png' class=' relative w-40'/>
                <h1 class='absolute top-1 left-2 text-xl text-white font-semibold'>Best Seller</h1>
                </div>
                <h1 class='text-xl ml-1 font-bold text-center mt-2'>
                  Heha Sky View
                </h1>
                <div class='mx-auto text-center mt-3'>
                  <button class='border shadow-md px-3 py-1 rounded-xl bg-[#FF2E00] text-white font-serif '>
                  Booking Now
                </button>
                </div>
            </a>

            <a class='relative'>
                <img src='/img/c.png' class='object-contain'/>
                <div class='absolute top-5 left-1 w-40'>
                <img src='/img/layer.png' class=' relative w-40'/>
                <h1 class='absolute top-1 left-2 text-xl text-white font-semibold'>Promo</h1>
                </div>
                <h1 class='text-xl ml-1 font-bold text-center mt-2'>
                  Heha Sky View
                </h1>
                <div class='mx-auto text-center mt-3'>
                  <button class='border shadow-md px-3 py-1 rounded-xl bg-[#FF2E00] text-white font-serif '>
                  Booking Now
                </button>
                </div>
            </a>

            <a class='relative'>
                <img src='/img/c.png' class='object-contain'/>
                <div class='absolute top-5 left-1 w-40'>
                <img src='/img/layer.png' class=' relative w-40'/>
                <h1 class='absolute top-1 left-2 text-xl text-white font-semibold'>Promo</h1>
                </div>
                <h1 class='text-xl ml-1 font-bold text-center mt-2'>
                  Heha Sky View
                </h1>
                <div class='mx-auto text-center mt-3'>
                  <button class='border shadow-md px-3 py-1 rounded-xl bg-[#FF2E00] text-white font-serif '>
                  Booking Now
                </button>
                </div>
            </a>

            <a class='relative'>
                <img src='/img/c.png' class='object-contain'/>
                <div class='absolute top-5 left-1 w-40'>
                <img src='/img/layer.png' class=' relative w-40'/>
                <h1 class='absolute top-1 left-2 text-xl text-white font-semibold'>Promo</h1>
                </div>
                <h1 class='text-xl ml-1 font-bold text-center mt-2'>
                  Heha Sky View
                </h1>
                <div class='mx-auto text-center mt-3'>
                  <button class='border shadow-md px-3 py-1 rounded-xl bg-[#FF2E00] text-white font-serif '>
                  Booking Now
                </button>
                </div>
            </a>

            <a class='relative'>
                <img src='/img/c.png' class='object-contain'/>
                <div class='absolute top-5 left-1 w-40'>
                <img src='/img/layer.png' class=' relative w-40'/>
                <h1 class='absolute top-1 left-2 text-xl text-white font-semibold'>Promo</h1>
                </div>
                <h1 class='text-xl ml-1 font-bold text-center mt-2'>
                  Heha Sky View
                </h1>
                <div class='mx-auto text-center mt-3'>
                  <button class='border shadow-md px-3 py-1 rounded-xl bg-[#FF2E00] text-white font-serif '>
                  Booking Now
                </button>
                </div>
            </a>

            {/* most popular end */}
          </div>
          <div class='mt-8'>
            <h1 class='text-center font-bold text-4xl'>
                Location
            </h1>
            <p class='text-center text-xl mt-4'>
            Perum Permata Regency 1 Blok 10/28, Perun Gpa, Ngijo, Kec. Karang Ploso, 
            <p>Kabupaten Malang, Jawa Timur 65152</p>
            </p>
            <div class='mt-6 ml-20'>

            <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.9521455537024!2d112.60469731418937!3d-7.900068680794963!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7881c2c4637501%3A0x10433eaf1fb2fb4c!2sHummasoft%20Technology!5e0!3m2!1sid!2sid!4v1674017713271!5m2!1sid!2sid"
            width="1024"
            height="512"
            style="border: 0"
            allowFullScreen=""
            aria-hidden="false"
            tabIndex="0"/>
          
            </div>
            {/* follow us */}
            <h1 class='text-center mt-6 text-3xl font-bold '>
              Follow Us
            </h1>
            <div class='flex mt-6 justify-center grid-cols-4 gap-8 pb-16'>
            <img src='/icons/ig.png' class='object-contain w-12'/>
            <img src='/icons/fb.png' class='object-contain w-12'/>
            <img src='/icons/wa.png' class='object-contain w-12'/>
            <img src='/icons/gmail.png' class='object-contain w-12'/>
            </div>
            {/* follow us end */}

          

          </div>
        </div>
      </div>
  </div>

  @endsection