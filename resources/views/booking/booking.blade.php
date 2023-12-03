@extends('layouts.main')

@section('container')
    <div class="px-4 md:px-0 min-h-screen w-full  xl:mx-auto">
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

        @if (session('retail_outlet'))
        @endif
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

                    <h1 class="py-2 text-2xl font-semibold">Booking</h1>

                    <form action="/booking" method="get" class="hidden lg:block lg:pl-3.5">
                        <div class="flex items-center md:py-8 flex-wrap">
                            <button type="submit" name="filter"
                                class="hover:text-white border border-orange-400 hover:bg-orange-600 rounded-full text-base font-medium px-5 py-2.5 text-center mr-3 @if (request('filter') == null) bg-orange-600 text-white @endif">All
                                Transaction</button>

                            <button type="submit" name="filter" value="cancel"
                                class="hover:text-white border border-orange-400 hover:bg-orange-600 rounded-full text-base font-medium px-5 py-2.5 text-center mr-3 @if (request('filter') == 'cancel') bg-orange-600 text-white @endif">Cancel</button>

                            <button type="submit" name="filter" value="refund"
                                class="hover:text-white border border-orange-400 hover:bg-orange-600 rounded-full text-base font-medium px-5 py-2.5 text-center mr-3 @if (request('filter') == 'refund') bg-orange-600 text-white @endif">Refund</button>



                        </div>
                    </form>

                </div>
                <hr class="mt-4 mb-8" />

                <div class="grid grid-cols-1 gap-y-4 mt-4">
                    @foreach ($data as $tagihan)
                        <div class="border-[2px] rounded-md w-full p-4 ">
                            {{-- <div class="w-[30%] h-[300px]">
                                <img src="{{ asset('image/024f977da658fb95a9c8593c4e9d1bbeaf6fd8c9725aeb00e349bcbcb9ad404c.jpg') }}" alt="" class="w-full object-cover h-full rounded-md shadow-best">
                            </div>
                            <div> --}}

                            @php
                                $created_at = Carbon\Carbon::parse($tagihan->created_at);
                                $now = Carbon\Carbon::now();
                                
                            @endphp

                            <div class="flex flex-wrap justify-between mb-2 gap-4">
                                <h1 class="text-gray-600">
                                    @if ($created_at->diffInMinutes($now) < 60)
                                        {{ $created_at->diffForHumans() }}
                                    @else
                                        {{ $created_at->format('d F Y') }}
                                    @endif
                                </h1>
                                <div class="flex gap-x-4 text-sm md:text-base">
                                    <h1 class="flex flex-wrap gap-x-2">Order Status : <span
                                            class="@if (in_array($tagihan->status, ['cancel', 'refund', 'ditolak'])) text-red-600 @else text-green-600 @endif uppercase font-semibold">
                                            @if ($tagihan->status == 'dikonfirmasi')
                                                Confirmed
                                            @elseif($tagihan->status == 'menunggu')
                                                waiting for confirmation
                                            @elseif ($tagihan->status == 'ditolak')
                                                rejected
                                            @else
                                                {{ $tagihan->status }}
                                            @endif
                                        </span></h1>
                                    <h1 class="flex flex-wrap">Payment Status : <span
                                            class="@if ($tagihan->payment_status == 'PAID') text-green-600 @elseif($tagihan->payment_status == 'PENDING') text-yellow-500 @else text-red-600 @endif capitalize font-semibold">{{ $tagihan->payment_status }}</span>
                                    </h1>
                                </div>
                            </div>
                            <div class="flex flex-wrap justify-between">
                                <div class="order-1">
                                    <h2 class="text-gray-900 text-lg font-bold">{{ $tagihan->wisata->nama_wisata }}</h2>

                                    {{-- @if ($tagihan->status == 'cancel' || $tagihan->status == 'refund' || $tagihan->status == 'ditolak')
                                        <h1
                                            class="text-xl text-white bg-red-400 font-bold px-2 rounded-md text-center inline-block">
                                            {{ $tagihan->status }}
                                        </h1>
                                    @else
                                        <h1 class="text-xl text-white bg-green-400 font-bold px-2 rounded-md text-center">
                                            {{ $tagihan->payment_status }}
                                        </h1>
                                    @endif --}}

                                    @if ($tagihan->status == 'cancel')
                                        <h1 class="my-2 text-green-600 font-semibold text-sm md:text-base lg:text-lg">please
                                            wait for a refund from
                                            the admin, the admin will contact you as soon as possible</h1>
                                    @endif
                                </div>

                                <div class="font-semibold order-2 ">
                                    <h1 class="text-sm md:text-base">Order Quantity</h1>
                                    <h1 class="text-center text-sm md:text-base">
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
                                    <h1 class="font-semibold text-sm md:text-base">Departure</h1>
                                    <h1 class="text-xs md:text-sm">
                                        {{ \Carbon\Carbon::parse($tagihan->departure)->format('d F Y h:i A') }}</h1>
                                </div>

                                <div class="text-left">
                                    <h1 class="font-semibold text-sm md:text-base">Payment Type</h1>
                                    <h1 class="text-xs md:text-sm">
                                        @if ($tagihan->dp !== null)
                                            Pay Dp
                                        @elseif($tagihan->dp == null)
                                            Pay Full
                                        @endif
                                    </h1>
                                </div>

                                <div class="text-left">
                                    <h1 class="font-semibold text-sm md:text-base">Tour Type</h1>
                                    <h1 class="text-xs md:text-sm">
                                        {{ $tagihan->wisata->tour_type }}
                                    </h1>
                                </div>

                                <div class="text-left">
                                    <h1 class="font-semibold text-sm md:text-base">Driver</h1>
                                    <h1 class="text-xs md:text-sm">
                                        @if ($tagihan->driver == null)
                                            {{ 'Waiting' }}
                                        @elseif ($tagihan->driver !== null)
                                            {{ $tagihan->driver->nama }}
                                        @endif
                                    </h1>
                                </div>

                                <div class="text-left">
                                    <h1 class="font-semibold text-sm md:text-base">Guide</h1>
                                    <h1 class="text-xs md:text-sm">
                                        @if ($tagihan->guide == null)
                                            {{ 'Waiting' }}
                                        @elseif ($tagihan->guide !== null)
                                            {{ $tagihan->guide->nama }}
                                        @endif
                                    </h1>
                                </div>

                                <div class="text-left">
                                    <h1 class="font-semibold text-sm md:text-base">Vehicle</h1>
                                    <h1 class="text-xs md:text-sm">
                                        @if ($tagihan->vehicle == null)
                                            {{ 'Waiting' }}
                                        @elseif ($tagihan->vehicle !== null)
                                            {{ $tagihan->vehicle->merek }}
                                        @endif
                                    </h1>
                                </div>

                                @if ($tagihan->adult !== null)
                                    <div class="text-left">
                                        <h1 class="font-semibold text-sm md:text-base">Adult</h1>
                                        <h1 class="text-xs md:text-sm">
                                            {{ $tagihan->adult }}
                                        </h1>
                                    </div>
                                @endif

                                @if ($tagihan->child !== null)
                                    <div class="text-left">
                                        <h1 class="font-semibold text-sm md:text-base">Child</h1>
                                        <h1 class="text-xs md:text-sm">
                                            {{ $tagihan->child }}
                                        </h1>
                                    </div>
                                @endif

                                <div class="">
                                    @if ($tagihan->extra_id !== null)
                                        @php
                                            $explode_extra = explode(',', $tagihan->extra_id);
                                            $array_map = array_map('intval', $explode_extra);
                                            
                                            $extra = App\Models\Extra::whereIn('id', $array_map)->get();
                                        @endphp
                                        <div class="flex">
                                            <h1
                                                class="text-gray-900 dark:text-white font-semibold mr-2 text-sm md:text-base">
                                                Extra :</h1>
                                            <ul class="gap-4 my-auto">

                                                @foreach ($extra as $extras)
                                                    <li class="text-xs md:text-sm ">{{ $extras->judul }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>

                            </div>

                            <div class="mt-4">

                                <div class="flex">
                                    <h1 class="font-semibold text-sm md:text-base">Total</h1>
                                    <h1 class="mx-2 text-sm md:text-base">:</h1>
                                    <h1 class="text-sm md:text-base">Rp. {{ number_format($tagihan->amount, 0, ',', '.') }}
                                    </h1>
                                </div>

                                @if ($tagihan->dp !== null)
                                    <div class="flex">
                                        <h1 class="font-semibold text-sm md:text-base">Dp</h1>
                                        <h1 class="ml-6 mr-2 text-sm md:text-base">:</h1>
                                        <h1 class="text-sm md:text-base">Rp. {{ number_format($tagihan->dp, 0, ',', '.') }}
                                        </h1>
                                    </div>
                                @endif

                            </div>

                            <div class="justify-center md:float-right flex flex-wrap gap-2 sm:gap-4 mt-4">
                                @if ($tagihan->status !== 'cancel' && $tagihan->status !== 'refund')
                                    @if ($tagihan->status == 'dikonfirmasi' && $tagihan->payment_status == 'PAID')
                                        <button type="button" onclick="Reschedule_{{ $tagihan->id }}.showModal()"
                                            class="px-4 py-2 bg-green-600 text-white rounded-lg text-sm">Reschedule</button>
                                        <button type="button"
                                            class="text-sm  px-4 py-2 bg-red-600  text-white rounded-lg  inline-block tracking-wider hover:bg-orange-700 outline-none font-bold"
                                            onclick="CancelBooking_{{ $tagihan->id }}.showModal()">
                                            Cancel
                                        </button>

                                        <div class="my-auto">
                                            <a href="/tiket/{{ $tagihan->doc_no }}" target="_blank"
                                                class="text-sm px-4 py-2 bg-orange-600  text-white rounded-lg  inline-block tracking-wider hover:bg-orange-700 outline-none font-bold">Look
                                                Ticket
                                            </a>
                                        </div>
                                    @endif



                                    {{-- <a href="/comment/{{ $tagihan->doc_no }}" target="_blank" class="text-sm mt-6 px-4 py-2 bg-orange-600  text-white rounded-lg  inline-block tracking-wider hover:bg-orange-700 outline-none">Comment</a> --}}
                                    @if ($tagihan->comment === 0 && $tagihan->status == 'done')
                                        <!-- Modal toggle -->
                                        <div class="my-auto">
                                            <h1 data-modal-target="defaultModal-{{ $tagihan->doc_no }}"
                                                data-modal-toggle="defaultModal-{{ $tagihan->doc_no }}"
                                                class="text-white bg-orange-600 hover:bg-orange-700 text-sm px-4 py-2 rounded-lg  inline-block tracking-wider font-bold outline-none cursor-pointer">
                                                Comment 
                                            </h1>
                                        </div>
                                    @endif
                                @endif

                            </div>
                            {{-- </div> --}}

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


@foreach ($data as $delete)
    <!-- Modal cancel start-->

    <dialog id="CancelBooking_{{ $delete->id }}" class="modal modal-bottom sm:modal-middle">
        <form action="/booking/cancel/{{ $delete->doc_no }}" method="POST" class="modal-box bg-white">
            @csrf
            <svg aria-hidden="true" class="mx-auto mb-4 text-red-600 w-14 h-14 dark:text-gray-200" fill="none"
                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400 text-center">Are you sure
                you want to Cancel this Order</h3>

            @if ($delete->payment_channel == 'RETAIL_OUTLET')
                <div class="my-4 mx-6">
                    <label for="number" class="text-gray-500">Name Card Or Credit Card (Exp:
                        Bri,Mandiri,Bni....)</label>
                    <input type="text" name="payment_vendor"
                        class="w-full rounded-md p-2 mt-2 border border-gray-500" required>
                </div>

                <div class="my-4 mx-6">
                    <label for="number" class="text-gray-500">Account Number Or Credit Card</label>
                    <input type="number" name="number_refund"
                        class="w-full rounded-md p-2 mt-2 border border-gray-500" required>
                </div>
            @endif

            <div class="flex flex-wrap gap-x-2 mx-auto justify-center">

                <button type="submit" id="submitCancel"
                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                    Yes, I'm sure
                </button>
                <a href="/booking" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</a>

            </div>
            

        </form>
        <form method="dialog" class=" hidden">

            <div class="modal-action">
                <!-- if there is a button in form, it will close the modal -->
                <label for="submitCancel">Yes, I'm sure</label>
                <button id="closeModalCancel" class="btn">Close</button>
            </div>
        </form>
    </dialog>
    {{-- modal cancel end --}}
@endforeach




@foreach ($data as $reschedule)
    <!-- Modal reschedule start-->

    <dialog id="Reschedule_{{ $reschedule->id }}" class="modal modal-bottom sm:modal-middle">
        <form action="/reschedule/{{ $reschedule->doc_no }}" target="_blank" class="bg-white modal-box">
            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400 text-center">Request
                Reschedule</h3>

            <div class="my-2">
                <label for="Date" class="">Date</label>
                <input type="date" name="date" class="w-full rounded-md p-2 mt-2 date2">
            </div>

            <div class="flex flex-wrap gap-x-2 mx-auto justify-center">

                <button type="submit"
                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                    Send
                </button>
                <a href="/booking" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                    cancel</a>
            </div>
        </form>
        <form method="dialog" class="modal-box hidden">
            <h3 class="font-bold text-lg">Hello!</h3>
            <p class="py-4">Press ESC key or click the button below to close</p>
            <div class="modal-action">
                <!-- if there is a button in form, it will close the modal -->
                <button id="closeReschedule" class="btn">Close</button>
            </div>
        </form>
    </dialog>
        {{-- modal reschedule end --}}
@endforeach
