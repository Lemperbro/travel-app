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
                <p class='font-semibold'>Rp. {{ number_format($wisata->harga,0,',','.') }}</p>
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
                <p class="font-bold text-xl text-center">Departure</p>
                <p class="font-semibold text-center">{{ \Carbon\Carbon::parse($wisata->tanggal)->format('d-F-Y , H:i').' WIB' }}</p>
            </div>
            </div>

        <div class="flex gap-0">
            <div>
                <img src='/icons/hotel.png' class='object-contain w-10 mx-12'/>
            </div>
            <div>
                <p class="font-bold text-xl">Long Tour</p>
                <p class="font-semibold uppercase">{{ $wisata->long_tour }}</p>
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
        <h1 class="text-center font-bold text-2xl">We can tell you everything about {{ $wisata->nama_wisata }}</h1>
    </div>

    @if ($faq->count() > 0)
        
    <div class='mt-1 border bg-[#FD522C]'>
        <h1 class="text-center font-semibold text-white text-2xl">
            About {{ $wisata->nama_wisata }}
        </h1>
    </div>

    @foreach ($faq as $faq)
        


    <div class="mt-1">
        <details class="text-justify text-sm font-semibold cursor-pointer">
            <summary class="bg-[#D9D9D9] text-lg font-semibold p-2 border">
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
