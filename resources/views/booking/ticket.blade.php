@extends('layouts.two')

<div class="flex flex-col items-center justify-center min-h-screen font-mono ">
    <img alt="" class="object-contain w-[70%] shadow-best" id="preview">
    <button id="download" class="p-2 bg-gray-900 text-white rounded-md mt-4" onclick="ticket()">Download Ticket</button>
    <div class="w-[1517px] overflow-x-scroll mx-auto rounded-xl border py-4 object-contain absolute -top-[10000px]"
        id="ticket">
        <div class="container">
            <div class="py-2 px-2 flex justify-between">
                <div class="">
                    <p class="text-2xl font-semibold">E-Ticket</p>
                    <p class="text-sm">GrowIn Travel</p>
                </div>
                <div class="">
                    <h1 class="text-md">order code</h1>
                    <h1 class="font-semibold">{{ $data->doc_no }}</h1>
                </div>
            </div>
            <div class="flex items-center mt-2">
                <div class="w-64">
                    <span class="">
                        <img src="{{ asset('img/logo.png') }}" class="" id="foto">
                    </span>
                </div>
                <div class="ml-auto px-8 text-center">
                    <h1 class="text-lg  ">{{ \Carbon\Carbon::parse($data->departure)->format('d,F,Y') }}
                        - {{ \Carbon\Carbon::parse($data->departure)->format('h:i A') }} WIB</h1>
                    <h1 class="font-semibold text-2xl">
                        {{ $data->wisata->nama_wisata }} - {{ $data->wisata->kota->nama_kota }}
                    </h1>
                </div>

                <div class="ml-auto px-8 text-center">
                    <h1 class="text-2xl font-semibold">Name Customer</h1>
                    <h1 class="font-semibold text-xl capitalize">{{ $data->user->username }}</h1>
                </div>
            </div>

            <div class=" border-black border-b-2 my-5"></div>



            <div class="items-center grid grid-cols-3">
                <div class="flex flex-col">
                    <div class="w-full flex-none text-xl text-orange-600 font-bold leading-none">Pick Up</div>
                    <div class="flex mt-2 w-[150px] gap-x-4">
                        <div class="text-lg">
                            <h1 class="font-semibold">Kota</h1>
                            <h1 class="font-semibold">Location</h1>
                        </div>
                        <div class="text-lg">
                            <h1 class="font-semibold"> : </h1>
                            <h1 class="font-semibold"> : </h1>
                        </div>
                        <div class="text-lg">
                            <h1 class="capitalize">{{ $data->pickup_kota }}</h1>
                            <h1 class="capitalize">{{ $data->pickup_point }}</h1>
                        </div>
                    </div>


                </div>

                <div class="flex flex-col ">

                    <div class="w-full flex-none text-xl text-orange-600 font-bold leading-none">Drop Point</div>
                    <div class="flex mt-2 w-[150px] gap-x-4">
                        <div class="text-lg">
                            <h1 class="font-semibold">Kota</h1>
                            <h1 class="font-semibold">Location</h1>
                        </div>
                        <div class="text-lg">
                            <h1 class="font-semibold">:</h1>
                            <h1 class="font-semibold">:</h1>
                        </div>
                        <div class="text-lg">
                            <h1 class="capitalize">{{ $data->drop_kota }}</h1>
                            <h1 class="capitalize">{{ $data->drop_point }}</h1>
                        </div>
                    </div>

                </div>

                <div class=" text-center border-red-600">
                    <h1 class="text-4xl font-semibold  pb-2">Status</h1>
                    <div class="border-black border-b-2 my-2 mx-10"></div>
                    @if ($data->dp !== null)
                        <h1 class="text-3xl font-semibold text-green-600">Pay Dp</h1>
                    @elseif($data->dp == null)
                        <h1 class="text-3xl font-semibold text-green-600">Pay Full</h1>
                    @endif
                    </h1>

                </div>
            </div>

            <div class=" border-black border-b-2 my-5"></div>

            <div class="grid grid-cols-5">
                <div class=" text-center">
                    <h1 class="font-semibold text-xl capitalize mb-2">guide</h1>
                    <h1 class="text-base capitalize">{{ $data->guide->nama }}</h1>
                </div>

                <div class="text-center">
                    <h1 class="font-semibold text-xl capitalize mb-2">driver</h1>
                    <h1 class="text-base capitalize">{{ $data->driver->nama }}</h1>
                </div>
                <div class="text-center">
                    <h1 class="font-semibold text-xl capitalize mb-2">vehicle</h1>
                    <h1 class="text-base capitalize">{{ $data->vehicle->merek }}</h1>
                </div>

                <div class="text-xl">
                    <h1 class="capitalize text-xl font-semibold text-center mb-[5px]">order quantity</h1>
                    @if ($data->adult !== null || $data->child !== null)
                        <div class="grid grid-cols-2 gap-x-2 ">
                            <div>
                                <h1 class="text-center font-semibold">Adult</h1>
                                <h1 class="text-center">{{ $data->adult }}</h1>
                            </div>

                            <div>
                                <h1 class="text-center font-semibold">Child</h1>
                                <h1 class="text-center">{{ $data->child }}</h1>
                            </div>

                        </div>
                    @else
                        <h1 class="text-center">1</h1>
                    @endif
                </div>

                <div class="text-xl">
                    <h1 class="capitalize font-semibold">additional extra</h1>
                    <div class="">
                        @if ($data->extra_id !== null)

                            @php
                                $explode_extra = explode(',', $data->extra_id);
                                $array_map = array_map('intval', $explode_extra);
                                
                                $extra = App\Models\Extra::whereIn('id', $array_map)->get();
                            @endphp
                            <div class="flex gap-x-2">
                                <ul class="gap-4 ">
                                    @if ($hotel !== null)
                                        <li class="text-base"><span class="font-bold">+</span>
                                            {{ $hotel->kategori_hotel }}
                                        </li>
                                    @endif
                                    @if ($mobil !== null)
                                        <li class="text-base"><span class="font-bold">+</span> {{ $mobil->merek }}
                                        </li>
                                    @endif
                                    @foreach ($extra as $extras)
                                        <li class="text-base"><span class="font-bold">+</span> {{ $extras->judul }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            Nothing
                        @endif
                    </div>
                    <div class=" border-black border-b-2 my-5"></div>

                    <div class="flex gap-x-4 justify-between">
                        <div>
                            <h1>Dp</h1>
                            <h1>Total</h1>
                        </div>
                        <div>
                            <h1>:</h1>
                            <h1>:</h1>
                        </div>
                        <div>
                            @if ($data->dp !== null)
                            <h1>Rp. {{ number_format($data->dp, 0, ',', '.') }}</h1>
                            @endif
                            <h1>Rp. {{ number_format($data->amount, 0, ',', '.') }}</h1>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>




</div>
