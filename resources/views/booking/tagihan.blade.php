@extends('layouts.main')

@section('container')
    <div class=" min-h-screen w-full px-4 md:px-0 xl:mx-auto">
        <h1 class="border-b pb-2 text-4xl font-semibold">Settings</h1>
        <div class="relative my-8 sm:hidden ">



            <ul class="flex flex-wrap gap-x-4 w-full justify-center">
                <li class="font-semibold {{ request()->is('profile') ? 'text-orange-600' : '' }}">
                    <a href="/profile">My Profile</a>
                </li>
                <li class="font-semibold {{ request()->is('profile/change-password') ? 'text-orange-600' : '' }}">
                    <a href="/profile/change-password">Change Password</a>
                </li>
                <li class="font-semibold {{ request()->is('booking') ? 'text-orange-600' : '' }}">
                    <a href="/booking">My Booking</a>
                </li>
                <li class="font-semibold {{ request()->is('tagihan') ? 'text-orange-600' : '' }}">
                    <a href="/tagihan">Waiting For Payment</a>
                </li>
            </ul>
        </div>
        <div class="grid grid-cols-8 pt-3 sm:grid-cols-10">


            @include('partials.sidebarprofile')

            <div class="col-span-8 overflow-hidden rounded-xl sm:bg-gray-50 sm:px-8 sm:shadow py-10">
                <div class="pt-4">
                    @if (session('success'))
                        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-200 dark:bg-gray-800 dark:text-green-400"
                            role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <h1 class="py-2 text-2xl font-semibold">Waiting For Payment</h1>
                </div>
                <hr class="mt-4 mb-8" />

                <div class="md:container mx-auto">



                    {{-- percobaan start --}}
                    <div class="grid grid-cols-1 gap-y-4 mt-4">
                        @foreach ($data as $tagihan)
                            @php
                                $created_at = Carbon\Carbon::parse($tagihan->created_at);
                                $now = Carbon\Carbon::now();
                                
                            @endphp
                            <div class="border-[2px] rounded-md w-full p-4">
                                <h1 class="text-gray-600">
                                    @if ($created_at->diffInMinutes($now) < 60)
                                        {{ $created_at->diffForHumans() }}
                                    @else
                                        {{ $created_at->format('d F Y') }}
                                    @endif
                                </h1>
                                <div class="flex flex-wrap justify-between gap-4">
                                    <div>
                                        <h1 class="font-semibold text-base lg:text-lg">{{ $tagihan->wisata->nama_wisata }}</h1>
                                        @if ($tagihan->status == 'menunggu')
                                            <h1 class="bg-yellow-200 text-black font-semibold py-1 px-2 rounded-md mt-2 text-sm md:text-base">
                                                Waiting for confirmation from admin</h1>
                                        @elseif ($tagihan->status == 'dikonfirmasi')
                                            <h1 class="bg-yellow-200 text-black font-semibold py-1 px-2 rounded-md mt-2 text-sm md:text-base">
                                                Waiting for Payment</h1>
                                        @endif
                                    </div>

                                    <div class="font-semibold">
                                        <h1 class="text-sm md:text-base">Order Quantity</h1>
                                        <h1 class="text-center">
                                            @if ($tagihan->adult !== null || $tagihan->child !== null)
                                                {{ $tagihan->adult + $tagihan->child }}
                                            @else
                                                1
                                            @endif
                                        </h1>
                                    </div>



                                </div>

                                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-4 ">

                                    <div class="text-left">
                                        <h1 class="font-semibold">Departure</h1>
                                        <h1>{{ \Carbon\Carbon::parse($tagihan->departure)->format('d F Y h:i A') }}</h1>
                                    </div>

                                    <div class="text-left">
                                        <h1 class="font-semibold">Payment Type</h1>
                                        <h1>
                                            @if ($tagihan->dp !== null)
                                                Pay Dp
                                            @elseif($tagihan->dp == null)
                                                Pay Full
                                            @endif
                                        </h1>
                                    </div>

                                    <div class="text-left">
                                        <h1 class="font-semibold">Tour Type</h1>
                                        <h1>
                                            {{ $tagihan->wisata->tour_type }}
                                        </h1>
                                    </div>

                                    <div class="text-left">
                                        <h1 class="font-semibold">Driver</h1>
                                        <h1>
                                            @if ($tagihan->driver == null)
                                                {{ 'Waiting' }}
                                            @elseif ($tagihan->driver !== null)
                                                {{ $tagihan->driver->nama }}
                                            @endif
                                        </h1>
                                    </div>

                                    <div class="text-left">
                                        <h1 class="font-semibold">Guide</h1>
                                        <h1>
                                            @if ($tagihan->guide == null)
                                                {{ 'Waiting' }}
                                            @elseif ($tagihan->guide !== null)
                                                {{ $tagihan->guide->nama }}
                                            @endif
                                        </h1>
                                    </div>

                                    <div class="text-left">
                                        <h1 class="font-semibold">Vehicle</h1>
                                        <h1>
                                            @if ($tagihan->vehicle == null)
                                                {{ 'Waiting' }}
                                            @elseif ($tagihan->vehicle !== null)
                                                {{ $tagihan->vehicle->merek }}
                                            @endif
                                        </h1>
                                    </div>

                                    @if ($tagihan->adult !== null)
                                        <div class="text-left">
                                            <h1 class="font-semibold">Adult</h1>
                                            <h1>
                                                {{ $tagihan->adult }}
                                            </h1>
                                        </div>
                                    @endif

                                    @if ($tagihan->child !== null)
                                        <div class="text-left">
                                            <h1 class="font-semibold">Child</h1>
                                            <h1>
                                                {{ $tagihan->child }}
                                            </h1>
                                        </div>
                                    @endif

                                </div>

                                <div class="mt-4">

                                    <div class="flex">
                                        <h1 class="font-semibold">Total</h1>
                                        <h1 class="mx-2">:</h1>
                                        <h1>Rp. {{ number_format($tagihan->amount, 0, ',', '.') }}</h1>
                                    </div>

                                    @if ($tagihan->dp !== null)
                                        <div class="flex">
                                            <h1 class="font-semibold">Dp</h1>
                                            <h1 class="ml-6 mr-2">:</h1>
                                            <h1>Rp. {{ number_format($tagihan->dp, 0, ',', '.') }}</h1>
                                        </div>
                                    @endif

                                </div>


                                <div class="flex float-right gap-x-4">


                                    <button type="button" class="px-2 py-2 bg-red-600 text-white font-semibold rounded-md"
                                        data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop-{{ $tagihan->id }}">Cancel</button>

                                    @if ($tagihan->status == 'dikonfirmasi')
                                        <a href="{{ $tagihan->payment_link }}" target="_blank"
                                            class="px-2 py-2 bg-green-600 text-white font-semibold rounded-md">
                                            Pay Now
                                        </a>
                                    @endif
                                </div>




                            </div>
                        @endforeach
                    </div>
                    {{-- percobaan end --}}


                </div>

            </div>





        </div>
    @endsection

    @foreach ($data as $delete)
        <!-- Modal cancel start-->
        <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
            id="staticBackdrop-{{ $delete->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">

            <div class="modal-dialog relative w-auto pointer-events-none">
                <div
                    class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white dark:bg-gray-700 bg-clip-padding rounded-md outline-none text-current">
                    <div
                        class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">


                        <button type="button"
                            class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                            data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>
                    <div class="modal-body relative p-4">
                        {{-- isi model --}}
                        <form action="/booking/cancel/{{ $delete->doc_no }}" method="POST">
                            @csrf




                            <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400 text-center">Are you
                                sure you want to Cancel this Order</h3>
                            <div class="flex flex-wrap gap-x-2 mx-auto justify-center">

                                <button type="submit"
                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                    Yes, I'm sure
                                </button>
                                <button data-bs-dismiss="modal" type="button"
                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                    cancel</button>

                            </div>

                    </div>


                    </form>

                </div>
            </div>
        </div>
        {{-- modal cancel end --}}
    @endforeach
