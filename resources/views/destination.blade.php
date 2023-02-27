@extends('layouts.main')

    <div>
        <img src='/img/des.png' class=''/>

        <div class='container'>
            <div class="mt-11 mb-7 grid grid-cols-3 grid-rows-4 gap-8">
              @foreach ($wisata as $wisata)
              @php
                $img = explode("|", $wisata->image);
              @endphp
                
                <a href="/wisata/{{ $wisata->slug }}" class="rounded overflow-hidden shadow-best4">
                  <img class="w-full h-64 object-cover" src=" {!! asset('/image/'.$img[0] ) !!}" alt="Mountain">
                  <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2 capitalize">{{ $wisata->nama_wisata }}</div>
                    <p class="text-gray-700 text-base line-clamp-4">
                      {{ $wisata->deskripsi }}
                    </p>
                  </div>
                  
                  <div class="px-6 pt-4 pb-2">
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $wisata->tour_type }}</span>
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $wisata->long_tour }}</span>
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $wisata->location }}</span>
                  </div>
                </a>
            @endforeach



            </div>


            <div class='w-[35%] mb-9 relative'>
            <img src='{{ asset('img/so.png') }}' class='object-contain'/>
            <h1 class='absolute top-2 mx-3 text-white font-semibold text-2xl'>
                Souvenir on bali
            </h1>
            </div>

            <div class='flex mt-10 container justify-between'>
                <div class='w-[40%]  my-auto'>
                  <h1 class='text-3xl text-center font-bold'>
                    Krisna
                  </h1>

                  <div class='flex mx-auto'>
                    <img src='{{ asset('icons/lok.png') }}' class='w-[12%] mx-12 object-contain'/>
                    <p class='mt-4 text-2xl font-semibold'>Jl. Raya Tuban No <br> 2X, Kuta</p>
                  </div>
                </div>
                <img src='{{ asset('img/tuban.png') }}' class='w-[50%] object-contain'/>
            </div>

            <div class='flex mt-10 container mb-28'>
            <img src='{{ asset('img/tuban.png') }}' class='w-[50%] object-contain'/>
                <div class='w-[40%]  my-auto'>
                  <h1 class='text-3xl text-center font-bold ml-24'>
                  Pasar Seni ubud
                  </h1>

                  <div class='flex mx-auto'>
                    <img src='{{ asset('icons/lok.png') }}' class='object-contain w-[30%] mx-12'/>
                    <p class='mt-4 text-2xl font-semibold'>Jl. Raya Ubud No.35, Ubud, Kecamatan Ubud, Kabupaten Gianya</p>
                  </div>
                </div>
                
            </div>

        </div>

    </div>
