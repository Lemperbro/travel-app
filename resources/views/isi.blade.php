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

    <div class="mt-11 mb-7 grid grid-cols-4 container">
        <div class="flex gap-0 border">
        <img src='/icons/flag.png' class='object-contain w-10 mx-12 border'/>
        <p class="font-bold text-xl">Type Tour <span class="">Private Tour</span> </p>
        </div>

        <div class="flex gap-0 border">
            <img src='/icons/calendar.png' class='object-contain w-10 mx-12 border'/>
            <p class="font-bold text-xl">Departure<span class="text-xl">Daily</span> </p>
            </div>

        <div class="flex gap-0 border">
            <img src='/icons/hotel.png' class='object-contain w-10 mx-12 border'/>
            <p class="font-bold text-xl">Room Type <span>(4D/3N)</span> </p>
        </div>

        <div class="flex gap-0 border">
            <img src='/icons/team.png' class='object-contain w-10 mx-12 border'/>
            <p class="font-bold text-xl">Group Size<span class="text-xl pt-20">1-15 Pax</span> </p>
        </div>
    </div>

    <a>
        <button class='border shadow-md px-7 py-4 rounded-xl bg-[#FD522C] text-white text-center align-center justify-center flex font-semibold mx-auto'>
            Booking Now
        </button>
    </a>


    <div class="container block my-20">
        <h1 class=" flex py-5 text-left mx-30px text-2xl font-extrabold  ">Overview</h1>
        <p class=" justify-center algin-center text-sm">This is the VIP package to visit Mount Bromo and Mount Ijen. Mount Bromo and Mount Ijen are the two most popular natural attractions in East Java Indonesia. You will get to experience a magnificent sunrise at Mount Bromo as well as capture the famous blue flames at Mount Ijen.
            The package includes accommodation, land transportation, Jeep at Bromo area and tour guide/driver.
            Airport/hotel/train station pick-up and drop-off in Surabaya is included. Bali pick up/drop off can be arranged.
            The package is available everyday including public holidays, Christmas and Chinese New Year.
            Compared with 3D2N package, this one is less tiring as you have one extra day at Banyuwangi to get sufficient rest time. You need to get up very early for both mountains and trek for hours. So it is also for safety and enjoyment consideration of the customers. If you have tight schedule, you can take 3D2N package instead</p>
    </div>

    <div class="container flex">
    <div class=" px-600px py-500 rounded-xl">
        <h1 class="text-2xl font-extrabold">Inclusions</h1>
        <p class="text-sm">2 nights hotel as listed in the itinerary
            Breakfast provided by hotel
            3 days private air-conditioned land transportation
            4WD Jeep at Bromo Area (for 1-2 pax group, it will be the shared Jeep, for 3+ pax group, it will be the private Jeep)
            Pick up/drop off from/at Surabaya Airport / Train Station / Hotel in Surabaya
            English/Bahasa speaking tour guide/driver
            Private local guide at Bromo
            Private local guide at Ijen
            Service charge, room tax, VAT, driver and guide expenses, and baggage handling
            Private tour
            Trekking poles</p>
    </div>
    <div class="flex">
        <div class="block ml-5">
            <h1 class="text-2xl font-extrabold">Exclusions</h1>
            <p>Entrance fees and activity fees (Entrance fee for Bromo+Ijen is IDR 700.000/pax; Entrance for Madakaripura Waterfall with motorbike is IDR/250.000/pax/round; Horse riding is around IDR 200.000/pax/round)
            Personal expenses
            Meals. Our guide will recommend and bring you to places to eat according to your preference
            Flight ticket
            Travel insurance (recommend)
            Tips (recommend)
            Visa on arrival fee (if any)
            All the fees not mentioned in the “Inclusions”</p>
        </div>
    </div>
</div>

<h1 class="block text-center algin-center justify-center my-10 font-extrabold text-2xl  ">itinerary Start With Bromo</h1>
<div class="grid grid-cols-4 container gap-24">
    <details class="bg-[#FD522C] text-white  text-center px-1 py-1 rounded-t-md rounded-b-md">
        <summary class="font-extrabold text-2xl bg-[#FD522C] px-2 py-4">
            Day 1
        </summary>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore quidem quia commodi, error at eveniet laudantium illo voluptate dolorum, ducimus repellat aliquid quod fugit, optio est? Magni tempora asperiores saepe.
    </details>

    <details class=" bg-[#FD522C] text-white text-center px-1 py-1 rounded-t-md rounded-b-md">
        <summary class="font-extrabold text-2xl">
            Day 2
        </summary>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore quidem quia commodi, error at eveniet laudantium illo voluptate dolorum, ducimus repellat aliquid quod fugit, optio est? Magni tempora asperiores saepe.
    </details>

    <details class=" bg-[#FD522C] text-white text-center px-1 py-1 rounded-t-md rounded-b-md">
        <summary class="font-extrabold text-2xl">
            Day 3
        </summary>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore quidem quia commodi, error at eveniet laudantium illo voluptate dolorum, ducimus repellat aliquid quod fugit, optio est? Magni tempora asperiores saepe.
    </details>

    <details class=" bg-[#FD522C] text-white text-center px-1 py-1 rounded-t-md rounded-b-md">
        <summary class="font-extrabold text-2xl">
            Day4
        </summary>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore quidem quia commodi, error at eveniet laudantium illo voluptate dolorum, ducimus repellat aliquid quod fugit, optio est? Magni tempora asperiores saepe.
    </details>
</div>
   
@section('container')
    
@endsection