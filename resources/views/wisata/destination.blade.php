@extends('layouts.main')

<div>
    <div class="relative">
        <img src='/img/des.png' class='h-56 lg:h-80 object-cover w-full' />
        <div class="absolute w-full bg-black/50 z-10 h-full top-0">
            <h1
                class='absolute top-[65%] -translate-y-[50%] text-center text-white left-[50%] -translate-x-[50%] text-2xl md:text-4xl font-bold w-full'>
                {{ $kota->nama_kota }}</h1>
        </div>
    </div>

    <div class="px-4 md:px-0 md:container">


        <div class=" grid grid-cols-1 sm:grid-cols-2  lg:grid-cols-3 xl:grid-cols-4 gap-5 mt-10">


            {{-- card 2 start --}}
            @foreach ($wisata as $wisatas)
                @php
                    $images = explode('|', $wisatas->image);
                    $event = App\Models\Event::where('wisata_id', $wisatas->id)
                        ->where('tipe', 'aktif')
                        ->where('status', 1)
                        ->first();
                    
                    $session = App\Models\Session::where('wisata_id', $wisatas->id)
                        ->where('startDate', '<=', Carbon\Carbon::now()->format('Y-m-d'))
                        ->where('endDate', '>=', Carbon\Carbon::now()->format('Y-m-d'))
                        ->where('type', 'session')
                        ->first();
                    
                    $weekend = App\Models\Session::where('wisata_id', $wisatas->id)
                        ->where('type', 'weekend')
                        ->first();
                    $day = Carbon\Carbon::now()->format('l');
                    
                @endphp
                <a href="/wisata/{{ $wisatas->slug }}" class="block rounded-lg p-4 shadow-best dark:bg-gray-700 bg-white">
                    <img alt="Home" src="{{ asset('image/' . $images[0]) }}"
                        class="h-56 w-full rounded-md object-cover" />

                    <div class="mt-2">
                        <dl>
                            <div>
                                <dt class="sr-only">Price</dt>

                                <dd class="text-sm text-orange-600 font-semibold flex gap-x-2">
                                    @if ($session !== null)
                                        Start From Rp. {{ number_format($session->price, 0, ',', '.') }}
                                    @else
                                        @if ($weekend !== null)
                                            @if ($day == 'Saturday' || $day == 'Sunday')
                                                Start From Rp. {{ number_format($weekend->price, 0, ',', '.') }}
                                            @else
                                                Start From Rp. {{ number_format($wisatas->harga, 0, ',', '.') }}
                                            @endif
                                        @else
                                            Start From Rp. {{ number_format($wisatas->harga, 0, ',', '.') }}
                                        @endif
                                    @endif
                                    @if ($event !== null)
                                        <h1
                                            class="bg-orange-600 p-[2px] px-1 text-[10px] my-auto rounded-md text-white ml">
                                            {{ $event->judul }}</h1>
                                    @endif
                                </dd>

                            </div>

                            <div>
                                <dt class="sr-only">Address</dt>

                                <dd class="text-gray-900 dark:text-white font-semibold text-xl">
                                    {{ $wisatas->nama_wisata }}</dd>
                            </div>
                            <div>
                                <p class="text-gray-700 text-base line-clamp-3">
                                    {{ $wisatas->deskripsi }}
                                </p>

                            </div>
                        </dl>

                        <div class="mt-6 grid grid-cols-3 items-center gap-8 text-xs">
                            <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="currentColor" viewBox="0 0 24 24"
                                    class="text-orange-600 dark:text-white w-7 h-7" style="transform: ;msFilter:;">
                                    <path
                                        d="M21 6h-4V3a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v7H3a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1zM6 18H4v-2h2v2zm0-4H4v-2h2v2zm5 4H9v-2h2v2zm0-4H9v-2h2v2zm0-4H9V8h2v2zm0-4H9V4h2v2zm4 12h-2v-2h2v2zm0-4h-2v-2h2v2zm0-4h-2V8h2v2zm0-4h-2V4h2v2zm5 12h-2v-2h2v2zm0-4h-2v-2h2v2zm0-4h-2V8h2v2z">
                                    </path>
                                </svg>

                                <div class="mt-1.5 sm:mt-0">
                                    <p class="text-gray-900 dark:text-gray-200 font-semibold">City</p>

                                    <p class="font-medium text-gray-700 dark:text-gray-300">
                                        {{ $wisatas->kota->nama_kota }}</p>
                                </div>
                            </div>

                            <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
                                <div class="relative inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" class="fill-orange-600 w-7 h-7 "
                                        style="transform: ;msFilter:;">
                                        <path
                                            d="M7 11h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zm0 4h2v2h-2zm4-4h2v2h-2zm0 4h2v2h-2z">
                                        </path>
                                        <path
                                            d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zM19 8l.001 12H5V8h14z">
                                        </path>
                                    </svg>

                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" class="absolute top-3 -right-1 w-4"
                                        style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                        <path
                                            d="M12.25 2c-5.514 0-10 4.486-10 10s4.486 10 10 10 10-4.486 10-10-4.486-10-10-10zM18 13h-6.75V6h2v5H18v2z">
                                        </path>
                                    </svg>

                                </div>

                                <div class="mt-1.5 sm:mt-0">
                                    <p class="text-gray-900 dark:text-gray-200 font-semibold">Long Tour</p>

                                    <p class="font-medium text-gray-700 dark:text-gray-300">{{ $wisatas->long_tour }}
                                    </p>
                                </div>
                            </div>

                            <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="text-orange-600 dark:text-white w-7 h-7" style="transform: ;msFilter:;">
                                    <path
                                        d="M19.965 8.521C19.988 8.347 20 8.173 20 8c0-2.379-2.143-4.288-4.521-3.965C14.786 2.802 13.466 2 12 2s-2.786.802-3.479 2.035C6.138 3.712 4 5.621 4 8c0 .173.012.347.035.521C2.802 9.215 2 10.535 2 12s.802 2.785 2.035 3.479A3.976 3.976 0 0 0 4 16c0 2.379 2.138 4.283 4.521 3.965C9.214 21.198 10.534 22 12 22s2.786-.802 3.479-2.035C17.857 20.283 20 18.379 20 16c0-.173-.012-.347-.035-.521C21.198 14.785 22 13.465 22 12s-.802-2.785-2.035-3.479zm-9.01 7.895-3.667-3.714 1.424-1.404 2.257 2.286 4.327-4.294 1.408 1.42-5.749 5.706z">
                                    </path>
                                </svg>

                                <div class="mt-1.5 sm:mt-0">
                                    <p class="text-gray-900 dark:text-gray-200 font-semibold">Type Tour</p>

                                    <p class="font-medium text-gray-700 dark:text-gray-300">{{ $wisatas->tour_type }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach

            {{-- card 2 end  --}}




        </div>
        {{-- {{ $best->links('vendor.pagination.tailwind') }} --}}





    </div>


    @if ($wisata->count() === 0)
        <h1 class="text-center font-semibold text-3xl">NOTHING</h1>
    @endif

</div>
