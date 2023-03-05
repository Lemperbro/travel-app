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



        </div>

    </div>
