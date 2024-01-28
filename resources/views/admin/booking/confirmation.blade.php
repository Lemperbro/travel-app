@extends('admin.layouts.main')

@section('container')

    <main class="pt-20 -mt-2">
        <div class="mx-auto p-2">
            <!-- row -->

            <div class="flex flex-wrap flex-row">

                <div class="flex-shrink max-w-full px-4 w-full mb-6">
                    <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg h-full">
                        <p class="text-xl font-bold mt-3 mb-5 dark:text-white">Confirmation Booking</p>
                        <div class="flex flex-wrap flex-row -mx-4">
                            <div class="flex-shrink max-w-full px-4 w-full">

                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="flex mb-1 text-sm text-red-800 dark:text-red-400" role="alert">
                                            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3"
                                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Info</span>
                                            <div>
                                                <span class="font-medium">Error </span>{{ $error }}
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <form action="#" class="">
                                    <div class="overflow-x-auto mb-6">
                                        <table
                                            class="min-w-full table-sorter table-bordered  text-gray-600 dark:text-gray-400">
                                            <thead>
                                                <tr class="bg-gray-100 dark:bg-gray-900 dark:bg-opacity-40">
                                                    <th class=" px-4  py-4">Customers</th>
                                                    <th class=" px-4  py-4">Email</th>
                                                    <th class=" px-4  py-4">Departure</th>
                                                    <th class=" px-4  py-4">Status</th>
                                                    <th class=" px-4 text-center  py-4">Booking Number</th>
                                                    <th data-sortable="false">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($data as $client)
                                                    <tr class="border-b-[1px] border-gray-300 dark:border-gray-700">

                                                        <td class="py-4 ">
                                                            <div class="flex items-center justify-center m-auto gap-x-4">
                                                                <img class="h-8 w-8 rounded-full"
                                                                    src="{{ asset('ft_user/' . $client->user->image) }}">
                                                                <h1 class="leading-3">{{ $client->user->username }}</h1>
                                                            </div>
                                                        </td>
                                                        <td class=" text-center ">{{ $client->user->email }}</td>
                                                        <td class=" text-center ">
                                                            {{ \Carbon\Carbon::parse($client->departure)->format('d-F-Y h:i A') }}
                                                        </td>
                                                        <td class=" text-center ">
                                                            <span
                                                                class="text-sm px-2 py-1 font-semibold leading-tight {{ $client->status == 'menunggu' ? 'text-yellow-700 bg-yellow-100' : '' }} {{ $client->status == 'ditolak' ? 'bg-red-600 text-white' : '' }} rounded-full">{{ $client->status }}</span>
                                                        </td>
                                                        <td class="text-center  ">{{ $client->doc_no }}</td>
                                                        <td class="text-center  ">
                                                            <div class="flex justify-center m-auto gap-x-4">
                                                                <div class="view_booking"
                                                                    data-target="view_booking_area_{{ $loop->iteration }}">

                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 576 512" width="24" height="24"
                                                                        class="eye_open_view_booking_area_{{ $loop->iteration }} fill-cyan-400">
                                                                        <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                                        <path
                                                                            d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                                                    </svg>


                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 640 512" width="24" height="24"
                                                                        class="eye_close_view_booking_area_{{ $loop->iteration }} fill-cyan-400 hidden">
                                                                        <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                                        <path
                                                                            d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z" />
                                                                    </svg>



                                                                </div>
                                                                <h1 class="cursor-pointer bg-white rounded-full inline-block ltr:mr-2 rtl:ml-2 hover:text-red-500"
                                                                    onclick="cancel_{{ $client->id }}.showModal()">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24"
                                                                        style="fill: rgba(220, 20, 60, 1)">
                                                                        <path
                                                                            d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z">
                                                                        </path>
                                                                    </svg>
                                                                </h1>

                                                                <h1 class="cursor-pointer bg-white rounded-full inline-block ltr:mr-2 rtl:ml-2 hover:text-green-500"
                                                                    onclick="confirm_{{ $client->id }}.showModal()">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24"
                                                                        style="fill: rgba( 0, 128, 0, 1);transform: ;msFilter:;">
                                                                        <path
                                                                            d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z">
                                                                        </path>
                                                                    </svg>
                                                                </h1>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="border-b-[1px] border-gray-300 dark:border-gray-700 hidden view_booking_area"
                                                        id="view_booking_area_{{ $loop->iteration }}">
                                                        <td class="py-4" colspan="6">

                                                            <div class="w-full grid grid-cols-6">

                                                                <div class="text-center">
                                                                    <h1 class="text-gray-900 dark:text-white font-semibold">
                                                                        Order Quantity</h1>
                                                                    <h3 class="text-gray-900 dark:text-white ">
                                                                        @if ($client->adult !== null || $client->child !== null)
                                                                            {{ $client->adult + $client->child }}
                                                                        @else
                                                                            1
                                                                        @endif
                                                                    </h3>
                                                                </div>

                                                                <div class="text-center">
                                                                    <h1 class="text-gray-900 dark:text-white font-semibold">
                                                                        Pickup Point</h1>
                                                                    <h3 class="text-gray-900 dark:text-white ">
                                                                        {{ $client->pickup_kota }} -
                                                                        {{ $client->pickup_point }}</h3>
                                                                </div>


                                                                <div class="text-center">
                                                                    <h1 class="text-gray-900 dark:text-white font-semibold">
                                                                        Dropout Point</h1>
                                                                    <h3 class="text-gray-900 dark:text-white ">
                                                                        {{ $client->drop_kota }} -
                                                                        {{ $client->drop_point }}</h3>
                                                                </div>


                                                                <div class="text-center">
                                                                    <h1 class="text-gray-900 dark:text-white font-semibold">
                                                                        Total</h1>
                                                                    <h3 class="text-gray-900 dark:text-white ">
                                                                        {{ number_format($client->amount, 0, ',', '.') }}
                                                                    </h3>
                                                                </div>

                                                                <div class="text-center">
                                                                    <h1 class="text-gray-900 dark:text-white font-semibold">
                                                                        Payment Type</h1>
                                                                    <h3 class="text-gray-900 dark:text-white ">
                                                                        @if ($client->dp !== null)
                                                                            Dp (Rp.
                                                                            {{ number_format($client->dp, 0, ',', '.') }})
                                                                        @else
                                                                            Full
                                                                        @endif
                                                                    </h3>
                                                                </div>

                                                                <div class="text-center">
                                                                    <h1 class="text-gray-900 dark:text-white font-semibold">
                                                                        Extra</h1>
                                                                    @if ($client->extra_id !== null)
                                                                        @php
                                                                            $explode_extra = explode(',', $client->extra_id);
                                                                            $array_map = array_map('intval', $explode_extra);
                                                                            
                                                                            $extra = App\Models\Extra::whereIn('id', $array_map)->get();
                                                                        @endphp
                                                                        <div class="flex justify-center">
                                                                            <ul class="list-disc">
                                                                                @foreach ($extra as $extras)
                                                                                    <li class="text-left">
                                                                                        {{ $extras->judul }}</li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    @else
                                                                        Nothing
                                                                    @endif
                                                                </div>

                                                            </div>
                                                            <div class="text-center">
                                                                <h1>Note</h1>
                                                                @if ($client->note !== null)
                                                                    {{ $client->note }}
                                                                @else
                                                                    Nothing
                                                                @endif
                                                            </div>

                                                        </td>

                                                    </tr>
                                                @endforeach


                                            </tbody>
                                        </table>


                                    </div>
                                </form>
                                @if ($data->count() == 0)
                                    <tr>
                                        <td colspan="6">
                                            <div class="mx-auto my-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                    viewBox="0 0 448 512" class="fill-white w-12 h-12 mx-auto">
                                                    <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                    <path
                                                        d="M448 80v48c0 44.2-100.3 80-224 80S0 172.2 0 128V80C0 35.8 100.3 0 224 0S448 35.8 448 80zM393.2 214.7c20.8-7.4 39.9-16.9 54.8-28.6V288c0 44.2-100.3 80-224 80S0 332.2 0 288V186.1c14.9 11.8 34 21.2 54.8 28.6C99.7 230.7 159.5 240 224 240s124.3-9.3 169.2-25.3zM0 346.1c14.9 11.8 34 21.2 54.8 28.6C99.7 390.7 159.5 400 224 400s124.3-9.3 169.2-25.3c20.8-7.4 39.9-16.9 54.8-28.6V432c0 44.2-100.3 80-224 80S0 476.2 0 432V346.1z" />
                                                </svg>
                                                <h1 class="text-gray-900 dark:text-white font-semibold text-center mt-2">
                                                    Nothing Transaction</h1>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    </div>
    </div>






    {{-- modal confirm start --}}
    @foreach ($data as $confirm)
        <dialog id="confirm_{{ $confirm->id }}" class="modal modal-bottom sm:modal-middle">
            <form action="/admin/booking/confirmation/{{ $confirm->id }}" method="POST"
                class="w-full px-4 modal-box bg-gray-200 dark:bg-gray-700">
                @csrf
                <h1 class="text-center font-semibold text-2xl dark:text-white">Confirmation</h1>


                <div class="mt-4">
                    <div class="">
                        <label for="harga" class="font-bold mb-1 text-gray-900 dark:text-white block">Driver</label>
                        <select type="text" name="driver"
                            class="w-full px-4 py-3 rounded-lg border-none  font-medium bg-gray-200 dark:bg-gray-900 text-gray-900 dark:text-white">
                            <option selected>Select Driver</option>
                            @foreach ($driver as $drivers)
                                <option value="{{ $drivers->id }}">{{ $drivers->nama }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="mt-4">
                        <label for="harga" class="font-bold mb-1 text-gray-900 dark:text-white block">Vehicle</label>
                        <select type="text" name="vehicle"
                            class="w-full px-4 py-3 rounded-lg border-none  font-medium bg-gray-200 dark:bg-gray-900 text-gray-900 dark:text-white">
                            <option selected>Select Vehicle</option>
                            @foreach ($vehicle as $vehicles)
                                <option value="{{ $vehicles->id }}">{{ $vehicles->merek }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4">
                        <label for="departure" class="font-bold mb-1 text-gray-900 dark:text-white block">Guide</label>
                        <select type="text" name="guide"
                            class="w-full px-4 py-3 rounded-lg border-none  font-medium bg-gray-200 dark:bg-gray-900 text-gray-900 dark:text-white">
                            <option selected>Select Guide</option>
                            @foreach ($guide as $guides)
                                <option value="{{ $guides->id }}">{{ $guides->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4">
                        <label for="time" class="font-bold mb-1 text-gray-900 dark:text-white block">Departure
                            Time</label>
                        <input type="time" name="time"
                            class="w-full px-4 py-3 rounded-lg border-none  font-medium bg-gray-200 dark:bg-gray-900 text-gray-900 dark:text-white">
                    </div>
                </div>

                <div class="text-center mt-8 flex gap-x-2 mx-auto justify-center">
                    <label for="cancelConfirm" class="bg-red-600 px-4 py-2 text-white rounded-md">Cancel</label>
                    <button type="submit" class="bg-green-600 py-2 px-4 rounded-md text-white">Confirmation</button>
                </div>
            </form>
            <form method="dialog" class="hidden">
                <h3 class="font-bold text-lg">Hello!</h3>
                <p class="py-4">Press ESC key or click the button below to close</p>
                <div class="modal-action">
                    <!-- if there is a button in form, it will close the modal -->
                    <button class="btn" id="cancelConfirm">Close</button>
                </div>
            </form>
        </dialog>
    @endforeach

    {{-- modal confirm end --}}





    @foreach ($data as $delete)
        <!-- Modal cancel start-->
        <dialog id="cancel_{{ $delete->id }}" class="modal modal-bottom sm:modal-middle">
            <form action="/admin/booking/confirmation/cancel/{{ $delete->id }}" method="POST" class="modal-box bg-white dark:bg-gray-700">
                @csrf




                <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400 text-center">Are you sure
                    you want to reject this Order</h3>
                <div class="flex flex-wrap gap-x-2 mx-auto justify-center">

                    <button type="submit"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Yes, I'm sure
                    </button>
                    <label for="cancelBtn"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                        cancel</label>

                </div>

            </div>


        </form>

            <form method="dialog" class="hidden">
                <h3 class="font-bold text-lg">Hello!</h3>
                <p class="py-4">Press ESC key or click the button below to close</p>
                <div class="modal-action">
                    <!-- if there is a button in form, it will close the modal -->
                    <button id="cancelBtn" class="btn">Close</button>
                </div>
            </form>
        </dialog>
        {{-- modal cancel end --}}
    @endforeach




@endsection
