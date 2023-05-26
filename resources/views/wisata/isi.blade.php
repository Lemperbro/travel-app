@extends('layouts.main')

@include('partials.navbar')

@foreach ($data as $wisata)
@php
$img = explode("|", $wisata->image);
@endphp

<div class='relative'>
    <img src='{{ asset('image/'.$img[0]) }}' class='w-full h-[550px] object-cover'/>
</div>



    @section('container')


        {{-- <img src="{{ asset('image/'.$img[0]) }}" alt="" class="object-cover h-[800px] w-full" id="view-image">

        <div class="grid grid-flow-col mt-2 overflow-auto auto-cols-[20%] h-56">

        @foreach ($img as $image)
              <img src='{{ asset('image/'.$image ) }}' class='object-cover h-56 w-full' onclick="change(this.src)"/>
        @endforeach
    </div> --}}



    <h1 class="text-3xl font-semibold mt-12">{{ $wisata->nama_wisata }} - {{ $wisata->kota->nama_kota }}</h1>
    <div class="flex gap-x-2 mt-2">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="w-3 fill-gray-600"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>

        <h1>{{ $wisata->location }}</h1>
    </div>

    <div class="mt-5 mb-7 grid grid-cols-4 place-items-center border-b-[1px] p-4 rounded-md">


        {{-- <div class="flex gap-0 ">
            <div>
                <img src='/icons/calendar.png' class='object-contain w-10 mx-12'/>
            </div>
            <div class="">
                <p class="font-bold text-xl text-center">Departure</p>
                <p class="font-semibold text-center">{{ \Carbon\Carbon::parse($wisata->tanggal)->format('d-F-Y , H:i').' WIB' }}</p>
            </div>
        </div> --}}

        <div class="flex gap-0">
            <div class="w-10 mx-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-orange-500 w-12 h-12 " style="transform: ;msFilter:;"><path d="M19 4H6V2H4v18H3v2h4v-2H6v-5h13a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1zm-1 9H6V6h12v7z"></path></svg>
            </div>
            <div class="">
                <p class="font-semibold text-xl">Type Tour</p>
                <p class='text-gray-500 capitalize'>{{ $wisata->tour_type }}</p>
            </div>
        </div>

        <div class="flex gap-0">
            <div class="w-10 mx-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-orange-500 w-12 h-12 " style="transform: ;msFilter:;"><path d="M11.707 2.293A.997.997 0 0 0 11 2H6a.997.997 0 0 0-.707.293l-3 3A.996.996 0 0 0 2 6v5c0 .266.105.52.293.707l10 10a.997.997 0 0 0 1.414 0l8-8a.999.999 0 0 0 0-1.414l-10-10zM13 19.586l-9-9V6.414L6.414 4h4.172l9 9L13 19.586z"></path><circle cx="8.353" cy="8.353" r="1.647"></circle></svg>
            </div>
            <div class="">
                <p class="font-semibold text-xl">Start Price</p>
                <p class='text-gray-500 capitalize'>Rp. {{ number_format($wisata->harga,0,',','.') }}</p>
            </div>
        </div>



        <div class="flex gap-0">
            <div class="w-10 mx-5 relative">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-orange-500 w-12 h-12 " style="transform: ;msFilter:;"><path d="M7 11h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zm0 4h2v2h-2zm4-4h2v2h-2zm0 4h2v2h-2z"></path><path d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zM19 8l.001 12H5V8h14z"></path></svg>

                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="absolute top-6 -right-4"  style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M12.25 2c-5.514 0-10 4.486-10 10s4.486 10 10 10 10-4.486 10-10-4.486-10-10-10zM18 13h-6.75V6h2v5H18v2z"></path></svg>

            </div>
            <div>
                <p class="font-semibold text-xl">Long Tour</p>
                <p class="text-gray-500 capitalize">{{ $wisata->long_tour }}</p>
            </div>
        </div>

        <div class="flex gap-0">
            <div class="w-10 mx-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-orange-500 w-12 h-12 " style="transform: ;msFilter:;"><path d="M19 2H9c-1.103 0-2 .897-2 2v6H5c-1.103 0-2 .897-2 2v9a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V4c0-1.103-.897-2-2-2zM5 12h6v8H5v-8zm14 8h-6v-8c0-1.103-.897-2-2-2H9V4h10v16z"></path><path d="M11 6h2v2h-2zm4 0h2v2h-2zm0 4.031h2V12h-2zM15 14h2v2h-2zm-8 .001h2v2H7z"></path></svg>


            </div>
            <div>
                <p class="font-semibold text-xl">Room Type</p>
                @if ($wisata->room_type == null)
                <p class="text-gray-500 capitalize">not staying</p>

                @else
                <p class="text-gray-500 capitalize">{{ $wisata->room_type }}</p>
                @endif
            </div>
        </div>



    </div>
{{-- 
    <a href="/checkout/{{ $wisata->slug }}">
        <button class='shadow-best px-4 py-4 rounded-xl bg-[#FD522C] text-white flex font-semibold mx-auto text-xl'>
            Booking Now
        </button>
    </a> --}}


    {{-- <div class="mb-20">
        <h1 class="py-5 text-3xl font-bold text-orange-500">Overview</h1>
        <p class="text-justify text-xl">
            {{ $wisata->deskripsi }}
        </p>
    </div> --}}


    {{-- step 1 input group start --}}

    <div class="flex justify-between mb-20 gap-x-10">
        <div class="w-full">
            <h1 class="py-5 text-3xl font-bold text-orange-500">Overview</h1>
            <p class="text-justify text-xl">
                {{ $wisata->deskripsi }}
            </p>
        </div>

        <form action="/checkout/{{ $wisata->slug }}" method="POST" class="border w-[30%] h-full relative rounded-lg p-2">
            @csrf
            <p class="text-sm text-center p-2 font-bold">Enter Number of Participants </p>
            <div class="flex justify-between p-2">
                <div class="">
                    <h1 for="first_name" class="block text-sm font-bold text-gray-900 dark:text-white capitalize">child Group
                    </h1>
                    <span class="text-xs text-red-600">5-12 years old</span>
                </div>

                <div class="">
                    <input type="number" id="child" name="child" min="0"
                        class="my-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-20 h-8 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0">
                </div>
            </div>

            <div class="flex justify-between p-2">
                <div class="">
                    <h1 for="first_name" class="block text-sm text-gray-900 font-bold capitalize">adult Group
                    </h1>
                    <span class="text-xs text-red-600">5-12 years old</span>
                </div>

                <div class="">
                    <input type="number" id="adult" name="adult" min="0"
                        class="my-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-20 h-8  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0">
                </div>
            </div>





            <div class="relative max-w-sm p-2">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                  <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                </div>

                <input datepicker datepicker-format="mm/dd/yyyy" type="text" autocomplete="off" id="date" name="tanggal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Select date">



              </div>

              
                <button type="submits" class='shadow-best m-2 px-2 py-2 rounded-xl bg-[#FD522C] text-white flex font-semibold mx-auto text-sm'>
                    Booking Now
                </button>
        




        </form>
    </div>

<<<<<<< HEAD
    {{-- step 1 input group end --}}
=======
                <div class="relative max-w-sm p-2">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input datepicker datepicker-format="mm/dd/yyyy" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Select date">
                </div>

                <a href="/checkout/{{ $wisata->slug }}">
                    <button
                        class='shadow-best m-2 px-2 py-2 rounded-xl bg-[#FD522C] text-white flex font-semibold mx-auto text-sm'>
                        Booking Now
                    </button>
                </a>
                
                <div class="border-b-2">
                    <p class="text-xs p-2">
                        <span class="font-semibold text-xs">Please note:</span>
                        After your purchase is confirmed we will email you a confirmation.
                    </p>
                </div>
>>>>>>> ee67057b59bf361170297f8753032e9cde4d0a08

                    <p class="text-xs p-2">
                        The prices are indicated above depending on the number of people
                    </p>

<<<<<<< HEAD
    @include('partials.facility')

    <div class="my-8">
        <h1 class="text-center font-bold text-2xl text-[#FD522C]">Itinerary Start with Bromo</h1>
    </div>

    @include('partials.dropdowntext')
    @include('partials.barang')

    
    <div class="mt-8">
        <h1 class="text-center font-bold text-2xl">We can tell you everything about {{ $wisata->nama_wisata }}</h1>
    </div>

    @if ($faq->count() > 0)
        
    <div class='mt-1 border bg-[#FD522C]'>
        <h1 class="text-center font-semibold text-white text-2xl">
            About {{ $wisata->nama_wisata }}
        </h1>
    </div>

    @foreach ($faq as $faq)
        
=======
                    <p class="text-xs p-2">
                        The prices are indicated above depending on the number of peopleIf you are organising for bigger groups over 15 pax, chat with us and we are able to assist you.
                    </p>
>>>>>>> ee67057b59bf361170297f8753032e9cde4d0a08


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

    @endforeach

    @endif











@endforeach
@if ($comment->count() > 0)
    

<div>
    <h1 class="text-4xl text-center font-semibold mt-8 mb-10">What About Customer Says</h1>

  <!-- component -->
<div class="grid grid-cols-3 gap-4 relative top-1/3">



@foreach ($comment as $comments)
    
    <!-- This is an example component -->
    <div class="relative grid grid-cols-1 gap-4 p-4 mb-8 border rounded-lg bg-white shadow-lg">
        <div class="relative flex gap-4">
            <img src="{{ asset('ft_user/'.$comments->user->image) }}" class="relative rounded-lg -top-8 -mb-4 bg-white border h-20 w-20" alt="" loading="lazy">
            <div class="flex flex-col w-full">
                <div class="flex flex-row justify-between">
                    <p class="relative text-xl whitespace-nowrap truncate overflow-hidden">{{ $comments->user->username }}</p>
                </div>
                <p class="text-gray-400 text-sm">{{ \Carbon\Carbon::parse($comments->created_at)->format('d F Y , h:i A') }}</p>
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
<h1 class='text-2xl font-bold border-black text-center mt-10 mb-4'>Destination On {{ $wisata->kota->nama_kota }}</h1>
@include('partials.most')
</div>

@endsection
