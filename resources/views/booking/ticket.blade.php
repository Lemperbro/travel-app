@extends('layouts.two')

<div class="flex flex-col items-center justify-center min-h-screen font-mono ">
    <img  alt="" class="object-contain w-[70%]" id="preview">
    <button id="download" class="p-2 bg-gray-900 text-white rounded-md mt-4" onclick="ticket()">Download Ticket</button>
    <div class="w-[1517px] overflow-x-scroll mx-auto rounded-xl border py-4 object-contain absolute -top-[10000px]" id="ticket">
        <div class="container">
            <div class="py-2 px-2 flex justify-between">
                <div class="">
                    <p class="text-2xl font-semibold">E-Ticket</p>
                    <p class="text-sm">GrowIn Travel</p>
                </div>
                <div class="text-center">
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
                    <h1 class="text-2xl font-bold ">{{ \Carbon\Carbon::parse($data->wisata->tanggal)->format('d,F,Y') }}
                        - {{ \Carbon\Carbon::parse($data->wisata->tanggal)->format('h:i') }} WIB</h1>
                    <h1 class="font-semibold text-lg">
                        {{ $data->wisata->nama_wisata }} - {{ $data->wisata->kota->nama_kota }}
                    </h1>
                </div>

                <div class="ml-auto px-8 text-center">
                    <h1 class="text-2xl font-semibold">Name Customer</h1>
                    <h1 class="font-semibold text-xl">{{ $data->user->username }}</h1>
                </div>
            </div>

            <div class=" border-black border-b-2 my-5"></div>



            <div class="items-center grid grid-cols-3">
                <div class="flex flex-col">
                    <div class="w-full flex-none text-xl text-orange-600 font-bold leading-none">Pick Up</div>
                    <div class="flex mt-2 w-[150px] gap-x-4">
                        <div class="text-lg">
                            <h1>Kota</h1>
                            <h1>Location</h1>
                        </div>
                        <div class="text-lg">
                            <h1> : </h1>
                            <h1> : </h1>
                        </div>
                        <div class="text-lg">
                            <h1>{{ $data->pickup_kota }}</h1>
                            <h1>{{ $data->pickup_point }}</h1>
                        </div>
                    </div>


                </div>

                <div class="flex flex-col ">

                    <div class="w-full flex-none text-xl text-orange-600 font-bold leading-none">Drop Point</div>
                    <div class="flex mt-2 w-[150px] gap-x-4">
                        <div class="text-lg">
                            <h1>Kota</h1>
                            <h1>Location</h1>
                        </div>
                        <div class="text-lg">
                            <h1>:</h1>
                            <h1>:</h1>
                        </div>
                        <div class="text-lg">
                            <h1>{{ $data->drop_kota }}</h1>
                            <h1>{{ $data->drop_point }}</h1>
                        </div>
                    </div>

                </div>

                <div class=" text-center border-red-600">
                    <h1 class="text-4xl font-semibold text-orange-600">Status</h1>
                    <div class=" border-black border-b-2 my-2 mx-10"></div>
                    @if ($data->dp !== null)
                    <h1 class="text-3xl font-semibold">Pay dp</h1>
                @elseif($data->dp == null)
                   <h1 class="text-3xl font-semibold">Pay Full</h1> 
                @endif
            </h1>

                </div>
            </div>

            <div class=" border-black border-b-2 my-5"></div>

            <div class="grid grid-cols-4">
                <div class="flex text-xl gap-x-2">
                    <h1>guide</h1>
                    <h1>:</h1>
                    <h1>{{ $data->guide->nama }}</h1>
                </div>

                <div class="flex text-xl gap-x-2">
                    <h1>driver</h1>
                    <h1>:</h1>
                    <h1>{{ $data->driver->nama }}</h1>
                </div>

                <div class="flex text-xl gap-x-2">
                    <h1>Group</h1>
                    <div class="ml-3">
                        <h1>adult</h1>
                        <h1>child</h1>
                    </div>
                    <div class="">
                        <h1>:</h1>
                        <h1>:</h1>
                    </div>
                    <div class="">
                        @if ($data->adult !== null)
                        <div class="text-left">
                            <h1>
                                {{ $data->adult }}
                            </h1>
                        </div>
                    @endif

                        @if ($data->child !== null)
                        <div class="text-left">
                            <h1>
                                {{ $data->child }}
                            </h1>
                        </div>
                    @endif
                    </div>
                </div>

                <div class="text-xl">
                    <h1>additional extra</h1>
                    <div class="">
                        @if ($data->extra_id !== null)
                        
                        @php
                        $explode_extra = explode(',', $data->extra_id);
                        $array_map = array_map('intval', $explode_extra);
                        
                        $extra = App\Models\Extra::whereIn('id',$array_map)->get();
                        @endphp
                        <div class="flex gap-x-2">
                        <h1 class="text-gray-900 dark:text-white font-semibold">Extra:</h1>
                          <ul class="gap-4">

                            @foreach ($extra as $extras)
                            <li class="">{{ $extras->judul }}</li>
                            @endforeach
                          </ul>
                        </div>
                        @else
                        Nothing
                        @endif
                      </div>
                    <div class=" border-black border-b-2 my-5"></div>
                    <div class="pl-3=-  ">
                        <h1>Rp. {{ number_format($data->amount, 0, ',', '.') }}</h1>
                    </div>
                </div>
            </div>

        </div>
    </div>

    
    
    
</div>





