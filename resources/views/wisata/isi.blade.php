@extends('layouts.main')

@include('partials.navbar')

@foreach ($data as $wisata)
    @php
        $img = explode('|', $wisata->image);
        $jumlah_image = count($img);
    @endphp



    @if ($jumlah_image > 1)
        <div id="default-carousel" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden  md:h-[300px] lg:h-[400px] xl:h-[550px]">
                <!-- Item -->
                @foreach ($img as $item)
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('image/' . $item) }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-cover"
                            alt="...">
                    </div>
                @endforeach
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                @for ($i = 1; $i <= $jumlah_image; $i++)
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                        data-carousel-slide-to="0"></button>
                @endfor
            </div>

        </div>
    @elseif ($jumlah_image == 1)
        <div class='relative'>
            <img src='{{ asset('image/' . $img[0]) }}'
                class='w-full h-[200px] md:h-[300px] lg:h-[400px] xl:h-[550px] object-cover' />
        </div>
    @endif




    @section('container')

        <section class="px-4 md:px-0">




            <div class="flex flex-wrap gap-2">
                <h1 class="text-xl md:text-2xl lg:text-3xl font-semibold mt-12">{{ $wisata->nama_wisata }} -
                    {{ $wisata->kota->nama_kota }}</h1>
                @if ($event_aktif !== null)
                    <h1 class="bg-orange-600 p-[2px] px-1 text-[14px] rounded-md text-white my-auto justify-center">
                        {{ $event_aktif->judul }}</h1>
                @endif
            </div>
            <div class="flex gap-x-2 mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="w-3 fill-gray-600 my-auto">
                    <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                    <path
                        d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                </svg>

                <h1 class="mt-1">{{ $wisata->location }}</h1>
            </div>

            <div class="mt-5 mb-7 grid grid-cols-4 lg:grid-cols-5 gap-y-4 place-items-center border-b-[1px]  rounded-md ">



                <div class="flex flex-col md:flex-row md:gap-x-4 lg:gap-x-2 w-full">
                    <div class="w-4 lg:w-10 mr-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            class="fill-orange-500 w-10 h-10 md:w-12 md:h-12 " style="transform: ;msFilter:;">
                            <path d="M19 4H6V2H4v18H3v2h4v-2H6v-5h13a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1zm-1 9H6V6h12v7z"></path>
                        </svg>
                    </div>
                    <div class="text-left">
                        <p class="font-semibold text-xs md:text-base lg:text-xl">Type Tour</p>
                        <p class='text-gray-500 capitalize text-xs md:text-base'>{{ $wisata->tour_type }}</p>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row md:gap-x-4 lg:gap-x-2 w-full">
                    <div class="w-4 lg:w-10 mr-5  xl:mx-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            class="fill-orange-500 w-10 h-10 md:w-12 md:h-12 " style="transform: ;msFilter:;">
                            <path
                                d="M11.707 2.293A.997.997 0 0 0 11 2H6a.997.997 0 0 0-.707.293l-3 3A.996.996 0 0 0 2 6v5c0 .266.105.52.293.707l10 10a.997.997 0 0 0 1.414 0l8-8a.999.999 0 0 0 0-1.414l-10-10zM13 19.586l-9-9V6.414L6.414 4h4.172l9 9L13 19.586z">
                            </path>
                            <circle cx="8.353" cy="8.353" r="1.647"></circle>
                        </svg>
                    </div>
                    <div class="text-left">
                        <p class="font-semibold text-xs md:text-base lg:text-xl">Start Price</p>
                        <p class='text-gray-500 capitalize text-xs md:text-base'>
                            @php
                                $session = App\Models\Session::where('wisata_id', $wisata->id)
                                    ->where('startDate', '<=', Carbon\Carbon::now()->format('Y-m-d'))
                                    ->where('endDate', '>=', Carbon\Carbon::now()->format('Y-m-d'))
                                    ->where('type', 'session')
                                    ->first();
                                
                                $weekend = App\Models\Session::where('wisata_id', $wisata->id)
                                    ->where('type', 'weekend')
                                    ->first();
                            @endphp
                            @if ($session !== null)
                                Rp. {{ number_format($session->price, 0, ',', '.') }}
                            @else
                                @if ($weekend !== null)
                                    @if ($day == 'Saturday' || $day == 'Sunday')
                                        Rp. {{ number_format($weekend->price, 0, ',', '.') }}
                                    @else
                                        Rp. {{ number_format($wisata->harga, 0, ',', '.') }}
                                    @endif
                                @else
                                    Rp. {{ number_format($wisata->harga, 0, ',', '.') }}
                                @endif
                            @endif
                        </p>

                    </div>
                </div>



                <div class="flex flex-col md:flex-row md:gap-x-4 lg:gap-x-2 w-full">
                    <div class="w-4 lg:w-10 mr-5  xl:mx-5 relative">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            class="fill-orange-500 w-10 h-10 md:w-12 md:h-12 " style="transform: ;msFilter:;">
                            <path d="M7 11h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zm0 4h2v2h-2zm4-4h2v2h-2zm0 4h2v2h-2z"></path>
                            <path
                                d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zM19 8l.001 12H5V8h14z">
                            </path>
                        </svg>

                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            class="absolute top-5 -right-7 md:top-6 lg:-right-4 "
                            style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                            <path
                                d="M12.25 2c-5.514 0-10 4.486-10 10s4.486 10 10 10 10-4.486 10-10-4.486-10-10-10zM18 13h-6.75V6h2v5H18v2z">
                            </path>
                        </svg>

                    </div>
                    <div class="text-left">
                        <p class="font-semibold text-xs md:text-base lg:text-xl">Long Tour</p>
                        <p class="text-gray-500 capitalize text-xs md:text-base">{{ $wisata->long_tour }}</p>
                    </div>
                </div>


                <div class="flex flex-col md:flex-row md:gap-x-4 lg:gap-x-2 w-full">
                    <div class="w-4 lg:w-10 mr-5  xl:mx-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            class="fill-orange-500 w-10 h-10 md:w-12 md:h-12 " style="transform: ;msFilter:;">
                            <path
                                d="M19 2H9c-1.103 0-2 .897-2 2v6H5c-1.103 0-2 .897-2 2v9a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V4c0-1.103-.897-2-2-2zM5 12h6v8H5v-8zm14 8h-6v-8c0-1.103-.897-2-2-2H9V4h10v16z">
                            </path>
                            <path d="M11 6h2v2h-2zm4 0h2v2h-2zm0 4.031h2V12h-2zM15 14h2v2h-2zm-8 .001h2v2H7z"></path>
                        </svg>


                    </div>
                    <div class="text-left">
                        <p class="font-semibold text-xs md:text-base lg:text-xl">Room Type</p>
                        @if ($wisata->room_type == null)
                            <p class="text-gray-500 capitalize text-xs md:text-base lg:text-xl">not staying</p>
                        @else
                            <p class="text-gray-500 capitalize text-xs md:text-base ">{{ $wisata->room_type }}
                            </p>
                        @endif
                    </div>
                </div>

                <div class="flex flex-col md:flex-row md:gap-x-4 lg:gap-x-2 w-full">
                    <div class="w-4 lg:w-10 mr-5  xl:mx-5">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"
                            class="fill-orange-500 w-8 h-8 md:w-8 md:h-8 ">
                            <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path
                                d="M64 48c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16h80V400c0-26.5 21.5-48 48-48s48 21.5 48 48v64h80c8.8 0 16-7.2 16-16V64c0-8.8-7.2-16-16-16H64zM0 64C0 28.7 28.7 0 64 0H320c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm88 40c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H104c-8.8 0-16-7.2-16-16V104zM232 88h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H232c-8.8 0-16-7.2-16-16V104c0-8.8 7.2-16 16-16zM88 232c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H104c-8.8 0-16-7.2-16-16V232zm144-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H232c-8.8 0-16-7.2-16-16V232c0-8.8 7.2-16 16-16z" />
                        </svg>


                    </div>
                    <div class="text-left">
                        <p class="font-semibold text-xs md:text-base lg:text-xl">Hotel Name</p>
                        @if ($wisata->room_type == null)
                            <p class="text-gray-500 capitalize text-xs md:text-base lg:text-xl">not staying</p>
                        @else
                            <p class="text-gray-500 capitalize text-xs md:text-base ">{{ $wisata->nama_hotel }} jhh vv vvj
                            </p>
                        @endif
                    </div>
                </div>



            </div>



            {{-- step 1 input group start --}}

            <div class="flex flex-col lg:flex-row justify-between mb-20 gap-10">
                <div class="w-full">
                    <h1 class="py-5 text-2xl md:text-3xl font-bold text-orange-500">Overview</h1>
                    <p class="text-justify text-base md:text-xl">
                        {{ $wisata->deskripsi }}
                    </p>
                </div>

                <div class="w-full lg:w-[40%] xl:w-[30%] h-full sm:px-20 lg:px-0">

                    <form action="/checkout/{{ $wisata->slug }}" method="POST"
                        class="p-2 border  relative rounded-lg ">
                        @csrf
                        <p class="text-sm text-center p-2 font-bold">Enter Number of Participants </p>
                        @if ($wisata->price_child !== null)
                            <div class="flex justify-between p-2">
                                <div class="">
                                    <h1 for="first_name"
                                        class="block text-sm font-bold text-gray-900 dark:text-white capitalize">
                                        child Group
                                    </h1>
                                    <span class="text-xs text-red-600">5-12 years old</span>
                                </div>

                                <div class="">
                                    <input type="number" id="child" name="child" min="0"
                                        class="my-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-20 h-8 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="0">
                                </div>
                            </div>
                        @endif

                        <div class="flex justify-between p-2">
                            <div class="">
                                <h1 for="first_name" class="block text-sm text-gray-900 font-bold capitalize">adult Group
                                </h1>
                                <span class="text-xs text-red-600">5-12 years old</span>
                            </div>

                            <div class="">
                                <input type="number" id="adult" name="adult" min="0"
                                    class="my-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-20 h-8  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="0">
                            </div>
                        </div>






                        <div class="relative p-2">


                            <input type="date" id="date" name="tanggal"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Select date" autocomplete="off" />



                        </div>


                        <button type="submit"
                            class='shadow-best m-2 px-2 py-2 rounded-xl bg-[#FD522C] text-white flex font-semibold mx-auto text-sm'>
                            Booking Now
                        </button>




                        <div class="border-b-2">
                            <p class="text-xs p-2">
                                <span class="font-semibold text-xs">Please note:</span>
                                After your purchase is confirmed we will email you a confirmation.
                            </p>
                        </div>

                        <p class="text-xs p-2">
                            The prices are indicated above depending on the number of people
                        </p>


                    </form>
                </div>


            </div>



            @include('partials.facility')
            @include('partials.barang')



            <div class="my-8">
                <h1 class="text-center font-bold text-xl md:text-2xl bg-[#FD522C] text-white">Itinerary Start with Bromo
                </h1>
            </div>

            @include('partials.dropdowntext')


            @if ($faq->count() > 0)
                {{-- <div class="mt-8">
                    <h1 class="text-center font-bold text-xl md:text-2xl capitalize">We can tell you everything about
                        {{ $wisata->nama_wisata }}
                    </h1>
                </div> --}}


                <div class='mt-4 border bg-[#FD522C]'>
                    <h1 class="text-center font-semibold text-white text-xl md:text-2xl">
                        About {{ $wisata->nama_wisata }}
                    </h1>
                </div>

                <ul class="flex flex-col">
                    @foreach ($faq as $faqs)
                        <li class="bg-white my-2  border-[2px] " x-data="accordion({{ $loop->iteration + $wisata->itenerary->count() }})">
                            <h2 @click="handleClick()"
                                class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer gap-x-4">
                                <span class="capitalize text-sm md:text-base">
                                    {{ $faqs->question }}</span>
                                <div class="w-[15%] flex justify-end">

                                    <svg :class="handleRotate()"
                                        class="fill-current text-orange-600 h-6 w-6 transform transition-transform duration-500 justify-end"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10">
                                        </path>
                                    </svg>
                                </div>

                            </h2>
                            <div x-ref="tab" :style="handleToggle()"
                                class="border-l-2 border-orange-600 overflow-hidden max-h-0 duration-500 transition-all">
                                <p class="p-3 text-gray-900 text-sm md:text-base ">
                                    {{ $faqs->answer }}
                                </p>

                            </div>
                        </li>
                    @endforeach

                </ul>


                {{-- @foreach ($faq as $faq)
                <div class="mt-1">
                    <details class="text-justify text-sm font-semibold cursor-pointer ">
                        <summary class="bg-[#D9D9D9] text-lg font-semibold p-2 border ">
                            {{ $faq->question }}
                        </summary>
                        <p class="p-2">
                            {{ $faq->answer }}
                        </p>
                    </details>
                </div>
            @endforeach --}}
            @endif











    @endforeach
    @if ($comment->count() > 0)
        <div>
            <h1 class="text-xl md:text-3xl text-center font-semibold mt-8 mb-10">What About Customer Says</h1>

            <!-- component -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 relative top-1/3">



                @foreach ($comment as $comments)
                    <!-- This is an example component -->
                    <div class="relative grid grid-cols-1 gap-4 p-4 mb-8 border rounded-lg bg-white shadow-lg">
                        <div class="relative flex gap-4">
                            <img src="{{ asset('ft_user/' . $comments->user->image) }}"
                                class="relative rounded-lg -top-8 -mb-4 bg-white border h-20 w-20" alt=""
                                loading="lazy">
                            <div class="flex flex-col w-full">
                                <div class="flex flex-row justify-between">
                                    <p class="relative text-xl whitespace-nowrap truncate overflow-hidden">
                                        {{ $comments->user->username }}</p>
                                </div>
                                <p class="text-gray-400 text-sm">
                                    {{ \Carbon\Carbon::parse($comments->created_at)->format('d F Y , h:i A') }}</p>
                            </div>
                        </div>
                        <p class="-mt-4 text-gray-500 line-clamp-10">{{ $comments->deskripsi }}</p>
                    </div>
                @endforeach




            </div>
            {{ $comment->links('vendor.pagination.tailwind') }}


        </div>
    @endif



    <div class="pt-20">
        <h1 class='text-2xl font-bold border-black text-center mt-10 mb-4'>Destination On {{ $wisata->kota->nama_kota }}
        </h1>
        @include('partials.most')
    </div>
    </section>

@endsection
