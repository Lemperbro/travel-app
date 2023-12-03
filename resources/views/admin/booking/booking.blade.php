@extends('admin.layouts.main')

@section('container')
    <!-- Client Table -->
    <div class="p-4 md:p-8 rounded-lg">
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-hidden ">


                <h1 class="text-gray-900 dark:text-white font-semibold text-2xl text-center mb-4">All Booking</h1>


                <form action="/admin/booking" method="get" class="w-full md:w-[80%] mx-auto">
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="search" id="default-search" name="search" value="{{ request('search') }}"
                            class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-orange-500 focus:border-orange-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                            placeholder="Search">
                        <button type="submit"
                            class="text-white absolute right-2.5 bottom-2.5 bg-orange-700 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">Search</button>
                    </div>

                    <div class="flex gap-x-2 mx-auto justify-center mt-4">
                        <h1 class="font-semibold my-auto pb-4 pl-4 md:pl-0 text-gary-900 dark:text-white">Filter</h1>
                        <div class="flex flex-row gap-x-4 overflow-x-auto pb-4 my-auto">
                            <button type="submit"
                                class="py-2 px-3 border  dark:border-gray-700 rounded-lg my-auto inline-block  @if (request('filter') == null) bg-orange-600 text-white @else dark:bg-gray-800 text-gray-900 @endif dark:text-white">
                                <h1 class="">All</h1>
                            </button>
                            <button type="submit" name="filter" value="PAID"
                                class="py-2 px-3 border  rounded-lg my-auto inline-block @if (request('filter') == 'PAID') bg-orange-600 text-white @else dark:bg-gray-800 dark:border-gray-700 text-gray-900 @endif dark:text-white">
                                <h1 class="w-[85px]">Paid</h1>
                            </button>
                            <button type="submit" name="filter" value="PENDING"
                                class="py-2 px-3 border     rounded-lg my-auto inline-block @if (request('filter') == 'PENDING') bg-orange-600 text-white @else dark:bg-gray-800 dark:border-gray-700 text-gray-900 @endif dark:text-white">
                                <h1 class="w-[85px]">Pending</h1>
                            </button>
                            <button type="submit" name="filter" value="EXPIRED"
                                class="py-2 px-3 border     rounded-lg my-auto inline-block @if (request('filter') == 'EXPIRED') bg-orange-600 text-white @else dark:bg-gray-800 dark:border-gray-700 text-gray-900 @endif dark:text-white">
                                <h1 class="w-[85px]">Expired</h1>
                            </button>
                            <button type="submit" name="filter" value="done"
                                class="py-2 px-3 border     rounded-lg my-auto inline-block @if (request('filter') == 'done') bg-orange-600 text-white @else dark:bg-gray-800 dark:border-gray-700 text-gray-900 @endif dark:text-white">
                                <h1 class="w-[85px]">Done</h1>
                            </button>
                            <button type="submit" name="filter" value="cancel"
                                class="py-2 px-3 border     rounded-lg my-auto inline-block @if (request('filter') == 'cancel') bg-orange-600 text-white @else dark:bg-gray-800 dark:border-gray-700 text-gray-900 @endif dark:text-white">
                                <h1 class="w-[85px]">Cancel</h1>
                            </button>
                            <button type="submit" name="filter" value="refund"
                                class="py-2 px-3 border     rounded-lg my-auto inline-block @if (request('filter') == 'refund') bg-orange-600 text-white @else dark:bg-gray-800 dark:border-gray-700 text-gray-900 @endif dark:text-white">
                                <h1 class="w-[85px]">Refund</h1>
                            </button>
                        </div>
                    </div>

                </form>

                <div class="overflow-x-auto">

                    <table class="min-w-full my-10 ">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-gray-700 uppercase border-b-2 dark:border-gray-400 bg-gray-300 dark:text-white dark:bg-gray-800 text-center">
                                <th class="px-4 py-3">No</th>
                                <th class="px-4 py-3">No Order</th>
                                <th class="px-4 py-3">Client</th>
                                <th class="px-2 ">Amount</th>
                                <th class="px-2 ">Payment Status</th>
                                <th class="px-2 ">Destination</th>
                                <th class="px-2 ">Type Tour</th>
                                <th class="px-4 py-3 ">Departure</th>
                                <th class="px-4 py-3 ">Order Status</th>
                                <th class="px-4 py-3 ">Action</th>
                            </tr>
                        </thead>

                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $datas)
                            <tbody
                                class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800 border-b-[1px] dark:border-gray-500">

                                <tr
                                    class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm text-center">{{ $no++ }}</td>

                                    <td class="px-4 py-3 text-sm text-center">{{ $datas->doc_no }}</td>

                                    <td class="flex px-4 py-3 justify-center">
                                        <div class="flex items-center text-sm">
                                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                <img class="object-cover w-full h-full rounded-full"
                                                    src="{{ asset('ft_user/' . $datas->user->image) }}" alt=""
                                                    loading="lazy" />
                                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                                </div>
                                            </div>
                                            <div>
                                                <p class="font-semibold text-center">{{ $datas->user->username }}</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-4 py-3 text-sm text-center">Rp.
                                        {{ number_format($datas->amount, 0, ',', '.') }}</td>

                                    <td class="px-4 py-3 text-xs text-center ">
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-black rounded-full {{ $datas->payment_status == 'PAID' ? 'bg-green-300' : '' }} {{ $datas->payment_status == 'PENDING' ? 'bg-yellow-300' : '' }} {{ $datas->payment_status == 'EXPIRED' ? 'bg-red-300' : '' }}">
                                            {{ $datas->payment_status }}
                                        </span>
                                    </td>

                                    <td class="px-4 py-3 text-sm text-center">{{ $datas->wisata->nama_wisata }}</td>

                                    <td class="px-4 py-3 text-sm text-center">{{ $datas->wisata->tour_type }}</td>
                                    <td class="px-4 py-3 text-sm text-center">
                                        {{ \Carbon\Carbon::parse($datas->departure)->format('d-F-Y h:i A') }}</td>

                                    <td class="px-4 py-3 text-xs text-center">
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight rounded-full capitalize text-black {{ $datas->status === 'menunggu' ? 'bg-yellow-300' : '' }}  {{ in_array($datas->status, ['ditolak', 'cancel', 'refund']) ? ' bg-red-300' : '' }} {{ in_array($datas->status, ['dikonfirmasi', 'done']) ? 'text-black bg-green-300' : '' }}">
                                            @if ($datas->status == 'dikonfirmasi')
                                                Confirmed
                                            @elseif ($datas->status == 'ditolak')
                                                Rejected
                                            @elseif ($datas->status == 'menunggu')
                                                Waiting
                                            @else
                                            {{ $datas->status }}
                                            @endif
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 flex gap-x-2">
                                        <div class="flex justify-center view_booking mx-auto"
                                            data-target="view_booking_area_{{ $loop->iteration }}">

                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="24"
                                                height="24"
                                                class="eye_open_view_booking_area_{{ $loop->iteration }} fill-cyan-400">
                                                <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                <path
                                                    d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                            </svg>


                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="24"
                                                height="24"
                                                class="eye_close_view_booking_area_{{ $loop->iteration }} fill-cyan-400 hidden">
                                                <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                <path
                                                    d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z" />
                                            </svg>



                                        </div>

                                        <button type="button" onclick="reschedule_{{ $datas->id }}.showModal()">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" class="fill-white" style="transform: ;msFilter:;">
                                                <path
                                                    d="M21 20V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2zM9 18H7v-2h2v2zm0-4H7v-2h2v2zm4 4h-2v-2h2v2zm0-4h-2v-2h2v2zm4 4h-2v-2h2v2zm0-4h-2v-2h2v2zm2-5H5V7h14v2z">
                                                </path>
                                            </svg>
                                        </button>
                                    </td>

                                </tr>
                                <tr class="border-b-[1px] border-gray-300 dark:border-gray-700 hidden view_booking_area"
                                    id="view_booking_area_{{ $loop->iteration }}">
                                    <td class="py-4" colspan="10">
                                        <div class="w-full grid grid-cols-11 gap-x-2">
                                            <div class="text-center">
                                                <h1 class="text-gray-900 dark:text-white font-semibold">
                                                    Order Quantity</h1>
                                                <h3 class="text-gray-900 dark:text-white ">
                                                    @if ($datas->adult !== null || $datas->child !== null)
                                                        {{ $datas->adult + $datas->child }}
                                                    @else
                                                        1
                                                    @endif
                                                </h3>
                                            </div>

                                            <div class="text-center">
                                                <h1 class="text-gray-900 dark:text-white font-semibold">
                                                    Pickup Point</h1>
                                                <h3 class="text-gray-900 dark:text-white ">
                                                    {{ $datas->pickup_kota }} -
                                                    {{ $datas->pickup_point }}</h3>
                                            </div>


                                            <div class="text-center">
                                                <h1 class="text-gray-900 dark:text-white font-semibold">
                                                    Dropout Point</h1>
                                                <h3 class="text-gray-900 dark:text-white ">
                                                    {{ $datas->drop_kota }} -
                                                    {{ $datas->drop_point }}</h3>
                                            </div>

                                            <div class="text-center">
                                                <h1 class="text-gray-900 dark:text-white font-semibold">
                                                    Guide</h1>
                                                <h3 class="text-gray-900 dark:text-white ">
                                                    {{ $datas->guide->nama }}
                                                </h3>
                                            </div>

                                            <div class="text-center">
                                                <h1 class="text-gray-900 dark:text-white font-semibold">
                                                    Driver</h1>
                                                <h3 class="text-gray-900 dark:text-white ">
                                                    {{ $datas->driver->nama }}
                                                </h3>
                                            </div>

                                            <div class="text-center">
                                                <h1 class="text-gray-900 dark:text-white font-semibold">
                                                    Vehicle</h1>
                                                <h3 class="text-gray-900 dark:text-white ">
                                                    {{ $datas->vehicle->merek }}
                                                </h3>
                                            </div>

                                            <div class="text-center">
                                                <h1 class="text-gray-900 dark:text-white font-semibold">
                                                    Number Phone</h1>
                                                <h3 class="text-gray-900 dark:text-white ">
                                                    {{ $datas->user->no_tlpn }}
                                                </h3>
                                            </div>

                                            <div class="text-center">
                                                <h1 class="text-gray-900 dark:text-white font-semibold">
                                                    Price Refund</h1>
                                                <h3 class="text-gray-900 dark:text-white ">
                                                    @if ($datas->status == 'refund')
                                                        @php
                                                            $refund = App\Models\Refund::where('pemesanan_id', $datas->id)
                                                                ->where('doc_no', $datas->doc_no)
                                                                ->first();
                                                        @endphp
                                                        {{ number_format($refund->refund_amount, 0, ',', '.') }}
                                                    @else
                                                        <span class="text-gray-900 dark:text-white">Nothing</span>
                                                    @endif
                                                </h3>
                                            </div>


                                            <div class="text-center">
                                                <h1 class="text-gray-900 dark:text-white font-semibold">
                                                    Total</h1>
                                                <h3 class="text-gray-900 dark:text-white ">
                                                    {{ number_format($datas->amount, 0, ',', '.') }}</h3>
                                            </div>

                                            <div class="text-center">
                                                <h1 class="text-gray-900 dark:text-white font-semibold">
                                                    Payment Type</h1>
                                                <h3 class="text-gray-900 dark:text-white ">
                                                    @if ($datas->dp !== null)
                                                        Dp (Rp.
                                                        {{ number_format($datas->dp, 0, ',', '.') }})
                                                    @else
                                                        Full
                                                    @endif
                                                </h3>
                                            </div>

                                            <div class="">
                                                <h1 class="text-gray-900 dark:text-white font-semibold text-left">
                                                    Extra</h1>
                                                @if ($datas->extra_id !== null)
                                                    @php
                                                        $explode_extra = explode(',', $datas->extra_id);
                                                        $array_map = array_map('intval', $explode_extra);
                                                        
                                                        $extra = App\Models\Extra::whereIn('id', $array_map)->get();
                                                    @endphp
                                                    <div class="flex justify-center mx-auto text-gray-900 dark:text-white">
                                                        <ul class="list-disc">
                                                            @foreach ($extra as $extras)
                                                                <li class="text-left">
                                                                    {{ $extras->judul }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @else
                                                    <span class="text-gray-900 dark:text-white text-left">Nothing</span>
                                                @endif
                                            </div>
                                        </div>
                                    </td>

                                </tr>


                            </tbody>
                        @endforeach
                    </table>
                </div>




                @if ($data->count() === 0)
                    <h1 class="text-center text-2xl p-4 text-gray-900 dark:text-white">kosong</h1>
                @endif

                {{ $data->links('vendor.pagination.tailwind') }}
            </div>



        </div>
    </div>
@endsection


@foreach ($data as $reschedule)
    <!-- Modal reschedule start-->


    <dialog id="reschedule_{{ $reschedule->id }}" class="modal modal-bottom sm:modal-middle">
        <form action="/admin/reschedule/{{ $reschedule->doc_no }}" method="POST" class="modal-box bg-gray-200 dark:bg-gray-700">
            @csrf
            <h3 class="mb-5 text-lg font-normal text-gray-900 dark:text-gray-200 text-center">Reschedule
            </h3>

            <div class="my-4">
                <label for="Date" class="text-gray-900 dark:text-white">Date</label>
                <input type="datetime-local" name="date" class="w-full rounded-md p-2 mt-2 bg-gray-200 dark:bg-gray-600 text-gray-900 dark:text-white date2">
            </div>

            <div class="flex flex-wrap gap-x-2 mx-auto justify-center">


                <label for="closeReschedule"
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                    cancel
                </label>
                <button type="submit"
                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                    Send
                </button>

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
