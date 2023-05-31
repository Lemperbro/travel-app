@extends('layouts.main')

@section('container')
    <div class="mx-4 min-h-screen w-full sm:mx-8 xl:mx-auto">
        <h1 class="border-b pb-2 text-4xl font-semibold">Settings</h1>

        <div class="grid grid-cols-8 pt-3 sm:grid-cols-10">

            <div class="relative my-4 w-56 sm:hidden">


                <select name="" id="" onchange="location = this.value;">
                    <option value="profile" {{ request()->is('profile') ? 'selected' : '' }}>
                        <a href="">My Profile</a>
                    </option>

                    <option value="/change password" {{ request()->is('change password') ? 'selected' : '' }}>
                        <a href="">Change Password</a>
                    </option>

                    <option value="/my booking" {{ request()->is('my booking') ? 'selected' : '' }}>
                        <a href="">My Booking</a>
                    </option>

                    <option value="/Waiting for payment" {{ request()->is('Waiting for payment') ? 'selected' : '' }}>
                        <a href="">Waiting for payment</a>
                    </option>
                </select>
            </div>

            @include('partials.sidebarprofile')

            <div class="col-span-8 overflow-hidden rounded-xl sm:bg-gray-50 sm:px-8 sm:shadow py-10">
                <div class="pt-4">
                    @if (session('success'))
                        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-200 dark:bg-gray-800 dark:text-green-400"
                            role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <h1 class="py-2 text-2xl font-semibold">Booking</h1>

                    <form action="#" method="GET" class="hidden lg:block lg:pl-3.5">

                        <div class="flex gap-x-8">

                            <label for="topbar-search" class="sr-only">Search</label>
                            <div class="relative w-[40%]">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input type="text" name="email" id="topbar-search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="search">

                            </div>

                            <div class="w-[40%]">
                                <input datepicker type="text" id="date" name="tanggal"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full block p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Select date" autocomplete="off" />
                            </div>

                            <div class="w-[40%]">
                                <input datepicker type="text" id="date" name="tanggal"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm w-full rounded-lg block p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Select date" autocomplete="off" />
                            </div>

                        </div>

                    </form>


                    <div class="flex items-center md:py-8 flex-wrap">

                      <button type="button" class="hover:text-white border border-orange-400 bg-white hover:bg-orange-600 rounded-full text-base font-medium px-5 py-2.5 text-center mr-3">All categories</button>

                      <button type="button" class="hover:text-white border border-orange-400 bg-white hover:bg-orange-600 rounded-full text-base font-medium px-5 py-2.5 text-center mr-3">Shoes</button>

                      <button type="button" class="hover:text-white border border-orange-400 bg-white hover:bg-orange-600 rounded-full text-base font-medium px-5 py-2.5 text-center mr-3">Bags</button>

                      <button type="button" class="hover:text-white border border-orange-400 bg-white hover:bg-orange-600 rounded-full text-base font-medium px-5 py-2.5 text-center mr-3">Electronics</button>



                  </div>

                </div>
                <hr class="mt-4 mb-8" />

                <div class="grid grid-cols-1 gap-y-4 mt-4">
                    @foreach ($data as $tagihan)
                        <div class="border-[2px] rounded-md w-full p-4">
                            <h1 class="text-gray-600">{{ \Carbon\Carbon::parse($tagihan->created_at)->format('d F Y') }}
                            </h1>
                            <div class="flex justify-between">
                                <div>
                                    <h2 class="text-gray-900 text-lg font-bold">{{ $tagihan->wisata->nama_wisata }}</h2>
                                    <h1 class="text-xl text-white bg-green-400 font-bold px-2 rounded-md text-center">
                                        {{ $tagihan->payment_status }}</h1>
                                </div>

                                <div class="font-semibold">
                                    <h1>Order Quantity</h1>
                                    <h1 class="text-center">
                                        @if ($tagihan->adult !== null || $tagihan->child !== null)
                                            {{ $tagihan->adult + $tagihan->child }}
                                        @else
                                            1
                                        @endif
                                    </h1>
                                </div>



                            </div>

                            <div class="grid grid-cols-4 gap-4 mt-4 ">

                                <div class="text-left">
                                    <h1 class="font-semibold">Departure</h1>
                                    <h1>{{ \Carbon\Carbon::parse($tagihan->departure)->format('d F Y') }}</h1>
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

                            <div class="float-right">
                                <a href="/cobadownload/{{ $tagihan->doc_no }}" target="_blank"
                                    class="text-sm mt-6 px-4 py-2 bg-orange-600  text-white rounded-lg  inline-block tracking-wider hover:bg-orange-700 outline-none font-bold">Look
                                    Ticket</a>

                                {{-- <a href="/comment/{{ $tagihan->doc_no }}" target="_blank" class="text-sm mt-6 px-4 py-2 bg-orange-600  text-white rounded-lg  inline-block tracking-wider hover:bg-orange-700 outline-none">Comment</a> --}}
                                @if ($tagihan->comment === 0)
                                    <!-- Modal toggle -->
                                    <h1 data-modal-target="defaultModal-{{ $tagihan->doc_no }}"
                                        data-modal-toggle="defaultModal-{{ $tagihan->doc_no }}"
                                        class="text-white bg-orange-600 hover:bg-orange-700 text-sm mt-6 px-4 py-2 rounded-lg  inline-block tracking-wider font-bold outline-none cursor-pointer">
                                        Comment
                                    </h1>
                                @endif


                            </div>

                        </div>
                    @endforeach
                </div>

                @if ($data->count() == 0 || $data == null)
                    <h1 class="text-2xl font-semibold text-center">There are no booking activities at this time</h1>
                @endif



            </div>

        </div>

    </div>
    </div>
@endsection

@foreach ($data as $modal)
    <!-- Modal toggle -->


    <!-- Main modal -->
    <div id="defaultModal-{{ $modal->doc_no }}" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
        <div class="relative w-full h-full max-w-2xl md:h-auto">
            <!-- Modal content -->
            <form class="relative bg-white rounded-lg shadow dark:bg-gray-700" action="/comment/{{ $modal->doc_no }}"
                method="post">
                @csrf

                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Write Your Reviews Here
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="defaultModal-{{ $modal->doc_no }}">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Reviews About This
                        Tour</label>
                    <textarea name="testi" id="" cols="30" rows="10" class="w-full"></textarea>
                </div>

                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="defaultModal-{{ $modal->doc_no }}" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>

                    <button type="submit"
                        class="text-white bg-orange-600 hover:bg-orange-700 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">Send</button>
                </div>

            </form>
        </div>
    </div>
@endforeach
