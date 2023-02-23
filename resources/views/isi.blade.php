@extends('layouts.main')

@include('partials.navbar')



<div class='relative'>
    <img src='/img/pt.png' class=''/>
    <h1 class='absolute top-80 text-center text-white left-[50%] -translate-x-[50%] text-3xl font-bold'>Gunung Bromo - Jawa Timur</h1>
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

    <a href="tagihan">
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


    <div class="my-8">
        <div class="text-center">
            <h1 class="text-2xl font-bold ">
                Enquiry Form
            </h1>
            <h1 class=" text-lg font-semibold justify-center flex">
                If you are looking for other tours or do some customisation,<br>
                just leave your information and message below.
            </h1>
        </div>
    </div>

  
        <div class="w-full ">
            <div class="flex">
                <input type="text" class="mx-auto rounded-xl w-[65%]" placeholder="Your Name">
            </div>
            
            <div class="flex my-9">
                <input type="text" class="mx-auto rounded-xl w-[65%]" placeholder="Phone Number">
            </div>

            <div class="flex my-9">
                <input type="Email" class="mx-auto rounded-xl w-[65%]" placeholder="Agungadnhita@gmail.com">
            </div>

            <div class="flex my-9">
                <input type="text area" class="mx-auto rounded-xl w-[65%] border-2 px-4 py-12" placeholder="Leave Your Massage Here">
            </div>
        </div>

        <div class='flex my-8'>
            <button class='border shadow-md px-6 py-4 rounded-xl bg-[#FF2E00] text-white font-semibold mx-auto'>
              Submit
            </button>
        </div>

        

@endsection
