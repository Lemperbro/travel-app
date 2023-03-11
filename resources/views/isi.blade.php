@extends('layouts.main')

@include('partials.navbar')

@foreach ($data as $wisata)
    
<div class='relative'>
    <img src='/img/pt.png' class=''/>
    <h1 class='absolute top-80 text-center text-white left-[50%] -translate-x-[50%] text-3xl font-bold'>{{ $wisata->nama_wisata }} - {{ $wisata->kota->nama_kota }}</h1>
  </div>



    @section('container')

        @php
            $img = explode("|", $wisata->image);
        @endphp

        <img src="{{ asset('image/'.$img[0]) }}" alt="" class="object-cover h-[500px] w-full" id="view-image">

        <div class="grid grid-flow-col mt-2 overflow-auto auto-cols-[20%] h-56">

        @foreach ($img as $image)
              <img src='{{ asset('image/'.$image ) }}' class='object-cover h-56 w-full' onclick="change(this.src)"/>
        @endforeach
    </div>






    <div class="mt-11 mb-7 grid grid-cols-4 place-items-center shadow-best5 bg-white p-4 rounded-md">

        <div class="flex gap-0">
            <div class="w-10 mx-12">
                <img src='/icons/price.png' class='object-contain'/>
            </div>
            <div class="">
                <p class="font-bold text-xl">Start Price</p>
                <p class='font-semibold'>Rp. {{ $wisata->harga }}</p>
            </div>
        </div>


        <div class="flex gap-0">
            <div class="w-10 mx-12">
                <img src='/icons/flag.png' class='object-contain'/>
            </div>
            <div class="">
                <p class="font-bold text-xl">Type Tour</p>
                <p class='font-semibold'>{{ $wisata->tour_type }}</p>
            </div>
        </div>

        <div class="flex gap-0 ">
            <div>
                <img src='/icons/calendar.png' class='object-contain w-10 mx-12'/>
            </div>
            <div class="">
                <p class="font-bold text-xl">Departure</p>
                <p class="font-semibold">{{ \Carbon\Carbon::parse($wisata->tanggal)->format('d/m/y') }}</p>
            </div>
            </div>

        <div class="flex gap-0">
            <div>
                <img src='/icons/hotel.png' class='object-contain w-10 mx-12'/>
            </div>
            <div>
                <p class="font-bold text-xl">Long Tour</p>
                <p class="font-semibold uppercase">{{ $wisata->long_tour }} Days</p>
            </div>
        </div>



    </div>

    <a href="/checkout/{{ $wisata->slug }}">
        <button class='shadow-best px-7 py-4 rounded-xl bg-[#FD522C] text-white flex font-semibold mx-auto mt-24'>
            Booking Now
        </button>
    </a>


    <div class="my-20">
        <h1 class="py-5 text-3xl font-bold">Overview</h1>
        <p class="text-justify text-xl">
            {{ $wisata->deskripsi }}
        </p>
    </div>

    @include('partials.facility')

    <div class="my-8">
        <h1 class="text-center font-bold text-2xl">Itinerary Start with Bromo</h1>
    </div>

    @include('partials.dropdowntext')
    @include('partials.barang')

    
    <div class="mt-8">
        <h1 class="text-center font-bold text-2xl">We can tell you everything about Mount Bromo</h1>
    </div>

    <div class='mt-1 border bg-[#FD522C]'>
        <h1 class="text-center font-semibold text-white text-2xl">
            About Mount Bromo
        </h1>
    </div>

    <div class="mt-4">
        <details class="text-justify text-sm font-semibold">
            <summary class="bg-[#D9D9D9] text-lg font-semibold p-2 border">
               where is mount bromo located and how does the landscape look like ?
            </summary>
           <p class="p-2">
            Mount Bromo is located within the massive Tengger Caldera in Bromo-Tengger-Semeru National Park in East Java. The nearest major city serving international flights will be Surabaya, which is about 4-5 hrs drive away. There are 5 volcanoes within the Caldera; Mount Bromo (2,329 m), Mount Batok (2,470 m), Mount Kursi (2,581 m), Mount Watangan (2,661 m), and Mount Widodaren (2,650 m).
            </p> 
        </details>
    </div>

    <div>
        <details class="text-justify text-sm font-semibold">
            <summary class="bg-[#D9D9D9] text-lg font-semibold p-2 border">
               what is the best time to visit mount bromo? can i visit during the festivals ?
            </summary>
            <p class="p-2">
                Mount Bromo is located within the massive Tengger Caldera in Bromo-Tengger-Semeru National Park in East Java. The nearest major city serving international flights will be Surabaya, which is about 4-5 hrs drive away. There are 5 volcanoes within the Caldera; Mount Bromo (2,329 m), Mount Batok (2,470 m), Mount Kursi (2,581 m), Mount Watangan (2,661 m), and Mount Widodaren (2,650 m).
            </p>
        </details>
    </div>

    <div>
        <details class="text-justify text-sm font-semibold border">
            <summary class="bg-[#D9D9D9] text-lg font-semibold p-2">
                how difficult is the trek?
            </summary>
            <p class="p-2">
                Mount Bromo is located within the massive Tengger Caldera in Bromo-Tengger-Semeru National Park in East Java. The nearest major city serving international flights will be Surabaya, which is about 4-5 hrs drive away. There are 5 volcanoes within the Caldera; Mount Bromo (2,329 m), Mount Batok (2,470 m), Mount Kursi (2,581 m), Mount Watangan (2,661 m), and Mount Widodaren (2,650 m).
            </p>
            
        </details>
    </div>

    <div>
        <details class="text-justify text-sm font-semibold">
            <summary class="bg-[#D9D9D9] text-lg font-semibold p-2 border">
                can i camp at mount bromo?
            </summary>
            Mount Bromo is located within the massive Tengger Caldera in Bromo-Tengger-Semeru National Park in East Java. The nearest major city serving international flights will be Surabaya, which is about 4-5 hrs drive away. There are 5 volcanoes within the Caldera; Mount Bromo (2,329 m), Mount Batok (2,470 m), Mount Kursi (2,581 m), Mount Watangan (2,661 m), and Mount Widodaren (2,650 m).
        </details>
    </div>

    <div class='my-4 border bg-[#FD522C]'>
        <h1 class="text-center font-semibold text-white text-2xl">
            About Tour Packages
        </h1>
    </div>

    <div class="mt-1">
        <details class="text-justify text-sm font-semibold">
            <summary class="bg-[#D9D9D9] text-lg font-semibold p-1 border">
                what kind of acommodations do we provide?
            </summary>
            We will provide three classes of accommodations for customers to choose – budget, standard and luxury. These options with prices will be provided upon trip enquiry. It is also possible for customers to book their own accommodations. We would recommend at least the standard (Hotel stay) and above if possible and budget allows. Also, the higher end accomodation will adopt safe practices for COVID19.
        </details>
    </div>

    <div class="">
        <details class="text-justify text-sm font-semibold">
            <summary class="bg-[#D9D9D9] text-lg font-semibold p-2 border">
                how much is the horse ride at mount bromo?
            </summary>
            We will provide three classes of accommodations for customers to choose – budget, standard and luxury. These options with prices will be provided upon trip enquiry. It is also possible for customers to book their own accommodations. We would recommend at least the standard (Hotel stay) and above if possible and budget allows. Also, the higher end accomodation will adopt safe practices for COVID19.
        </details>
    </div>

    <div class="">
        <details class="text-justify text-sm font-semibold">
            <summary class="bg-[#D9D9D9] text-lg font-semibold p-2 border">
                how much many do i need during the trip?
            </summary>
            We will provide three classes of accommodations for customers to choose – budget, standard and luxury. These options with prices will be provided upon trip enquiry. It is also possible for customers to book their own accommodations. We would recommend at least the standard (Hotel stay) and above if possible and budget allows. Also, the higher end accomodation will adopt safe practices for COVID19.
        </details>
    </div>



@endforeach

<section>
    <h1 class="text-4xl text-center font-semibold mt-8">What About Customer Says</h1>
    <div class="flex mt-8">
      <div class="max-w-xl">
        <div
          class="block rounded-lg bg-white- p-6 shadow-best4 dark:bg-neutral-800 dark:shadow-black/20">
          <div class="md:flex md:flex-row">
            <div
              class="mx-auto mb-6 flex w-36 items-center justify-center md:mx-0 md:w-96 lg:mb-0">
              <img
                src="https://tecdn.b-cdn.net/img/Photos/Avatars/img%20%2810%29.jpg"
                class="rounded-full shadow-md dark:shadow-black/30"
                alt="woman avatar" />
            </div>
            <div class="md:ml-6">
              <p
                class="mb-6 font-light text-neutral-500 dark:text-neutral-300">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id
                quam sapiente molestiae numquam quas, voluptates omnis nulla
                ea odio quia similique corrupti magnam.
              </p>
              <p
                class="mb-2 text-xl font-semibold text-neutral-800 dark:text-neutral-200">
                Anna Smith
              </p>
              <p
                class="mb-0 font-semibold text-neutral-500 dark:text-neutral-400">
                Product manager
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


<div class="pt-20">
<h1 class='text-2xl font-bold border-black text-center mt-10 mb-4'>Destination On {{ $wisata->kota->nama_kota }}</h1>
@include('partials.most')
</div>

@endsection
