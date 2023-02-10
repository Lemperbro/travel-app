@extends('layouts.main')

@include('partials.navbar')



<div class='relative'>
    <img src='/img/pt.png' class=''/>
    <h1 class='absolute top-80 text-center text-white left-[50%] -translate-x-[50%] text-3xl font-bold'>Private Trip</h1>
  </div>

  <div class='w-[35%] mb-9 relative '>
    <div class="flex gap">
        <img src='/gambar/locisi.png' class='object-contain w-10 '/>
        <h1 class='mx-3 text-white font-semibold text-2xl top-5 '>
            Souvenir on bali
        </h1>
    </div>
        <img src='/gambar/isia.png' class='object-contain absolute -z-10 top-0'/>
    </div>

    @section('container')
    <div class="mt-11 mb-7 grid grid-cols-4 ">
        <div class='mx-auto w-64 mb-8'>
            <a>
              <img src='/gambar/element.png' class='object-contain'/>
            </a>
        </div>

        <div class='mx-auto w-64 mb-8 '>
            <a>
              <img src='/gambar/element.png' class='object-contain'/>
            </a>
        </div>

        <div class='mx-auto w-64 mb-8 '>
            <a>
              <img src='/gambar/element.png' class='object-contain'/>
            </a>
        </div>

        <div class='mx-auto w-64 mb-8 '>
            <a>
              <img src='/gambar/element.png' class='object-contain'/>
            </a>
        </div>

    </div>

    <div class="mt-11 mb-7 grid grid-cols-4">
        <div class="flex gap-0">
            <div class="w-10 mx-12">
                <img src='/icons/flag.png' class='object-contain'/>
            </div>
            <div class="">
                <p class="font-bold text-xl">Type Tour</p>
                <p class='font-semibold'>Private Tour</p>
            </div>
        </div>

        <div class="flex gap-0 ">
            <div>
                <img src='/icons/calendar.png' class='object-contain w-10 mx-12'/>
            </div>
            <div class="">
                <p class="font-bold text-xl">Departure</p>
                <p class="font-semibold">Daily</p>
            </div>
            </div>

        <div class="flex gap-0">
            <div>
                <img src='/icons/hotel.png' class='object-contain w-10 mx-12'/>
            </div>
            <div>
                <p class="font-bold text-xl">Room Type</p>
                <p class="font-semibold">(4D/3N)</p>
            </div>
        </div>

        <div class="flex gap-0">
            <div>
                <img src='/icons/team.png' class='object-contain w-10 mx-12'/>
            </div>
            <div>
                <p class="font-bold text-xl">Group Size</p>
                <p class="font-semibold">1-15 pax</p>
            </div>

        </div>
    </div>

    <a>
        <button class='shadow-best px-7 py-4 rounded-xl bg-[#FD522C] text-white flex font-semibold mx-auto mt-24'>
            Booking Now
        </button>
    </a>


    <div class="my-20">
        <h1 class="py-5 text-3xl font-bold">Overview</h1>
        <p class="text-justify text-xl">
            his is the VIP package to visit Mount Bromo and Mount Ijen. Mount Bromo and Mount Ijen are the two most popular natural attractions in East Java Indonesia. You will get to experience a magnificent sunrise at Mount Bromo as well as capture the famous blue flames at Mount Ijen.
            The package includes accommodation, land transportation, Jeep at Bromo area and tour guide/driver.
            Airport/hotel/train station pick-up and drop-off in Surabaya is included. Bali pick up/drop off can be arranged.
            The package is available everyday including public holidays, Christmas and Chinese New Year.
            Compared with 3D2N package, this one is less tiring as you have one extra day at Banyuwangi to get sufficient rest time. You need to get up very early for both mountains and trek for hours. So it is also for safety and enjoyment consideration of the customers. If you have tight schedule, you can take 3D2N package instead
        </p>
    </div>

    @include('partials.facility')

    <div class="my-8">
        <h1 class="text-center font-bold text-2xl">Itinerary Start with Bromo</h1>
    </div>

    @include('partials.dropdowntext')
    @include('partials.barang')


@endsection
