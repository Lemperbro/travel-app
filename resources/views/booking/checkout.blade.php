@extends('layouts.main')


@section('container')
    <div class="mb-32 mt-28">
        <div class="grid sm:px-10 lg:grid-cols-2 lg:px-20 xl:px-32">
            <div class="px-4 pt-2">
                <p class="text-xl font-medium">Order Summary</p>
                <p class="text-gray-400">Check your items.</p>
                <div class="mt-8 space-y-3 rounded-lg border bg-white px-2 py-4 sm:px-6">

                    @php
                        $img = explode('|', $wisata->image);
                    @endphp

                    <div class="flex flex-col rounded-lg bg-white sm:flex-row">

                        <img class="m-2 h-24 w-96 rounded-md border object-cover object-center"
                            src="{{ asset('image/' . $img[0]) }}" alt="" />
                        <div class="flex w-full flex-col px-4 py-4">
                            <span class="font-semibold">{{ $wisata->nama_wisata }}</span>
                            <p class="text-lg font-bold">Rp. {{ number_format($wisata->harga, 0, ',', '.') }}</p>

                            <div class="mt-2">
                                <p class="font-semibold text-sm">Type Tour</p>
                                <p class="font-semibold text-lg">{{ $wisata->tour_type }}</p>
                            </div>

                        </div>
                    </div>

                    <table class="flex gap-x-4">

                        <tbody>

                        </tbody>
                    </table>


                </div>


                <div class="mt-8">
                    <div class="">
                        <p class="text-xl font-semibold ">Optional additonal extra on - {{ $wisata->nama_wisata }}</p>
                        <p class="text-xs text-gray-700">The following options are available with this product.</p>
                    </div>

                    <div class="flex gap-x-6 mt-8 border-b-2">

                        <div class="w-[25%] pt-8">
                            <img src="{{ asset('img/car.jpg') }}" alt="" class="object-contain ">
                        </div>

                        <div class=" w-[40%] pt-8">
                            <p class="text-lg font-semibold">lorem judul</p>
                            <p class="text-sm mt-2 text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo voluptas alias excepturi dolores </p>
                        </div>

                        <div class="w-[30%] py-8 ">

                            <div class="">
                                <p class="text-lg font-semibold pl-2">Rp. 80000</p>
                                <span class="text-xs pl-2">per participant</span>
                            </div>
                            
                            <div class=" m-2 px-2 flex justify-center items-center">
                                <input id="link-checkbox" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            </div>

                        </div>
                    </div>

                </div>


            </div>
            <form action="/checkout/{{ $slug }}/payment" method="post" class="mt-10 bg-gray-50 px-4 pt-8 lg:mt-0">
                @csrf
                <p class="text-xl font-medium">Order Details</p>
                <p class="text-gray-400">Complete your order by providing your payment details.</p>

                <div class="">

                    <div class="grid grid-cols-2 gap-x-4 mt-2">

                        <div class="w-full">
                            <label for="kota">Select City for pickup point </label>
                            <select name="kota" id="pickup" onclick="piickup()" class="w-full rounded-md ">
                                @foreach ($kota as $kota)
                                    <option value="{{ $kota->slug }},{{ $kota->harga }}">{{ $kota->nama_kota }}</option>
                                @endforeach

                            </select>

                        </div>

                        <div class="w-full">
                            <label for="pickup">Pickup Point</label>
                            <textarea type="text" name="pickup" cols="1" rows="1" class="w-full rounded-md"></textarea>
                        </div>

                    </div>

                    {{-- const destination = new Intl.NumberFormat('id-ID', {
          style: 'currency',
          currency: '',
          minimumFractionDigits: 0
        }).format(Pricewisata.value); --}}
                    <div class="grid grid-cols-2 gap-x-4 mt-2 mb-2">

                        <div class="w-full">
                            <label for="kota">Select City For Dropout Point</label>
                            <select name="drop_kota" id="dropout" class="w-full rounded-md ">
                                @foreach ($drop as $drop)
                                    <option value="{{ $drop->slug }}">{{ $drop->nama_kota }}</option>
                                @endforeach

                            </select>

                        </div>

                        <div class="w-full">
                            <label for="pickup">Dropout Point</label>
                            <textarea type="text" name="dropout" cols="1" rows="1" class="w-full rounded-md"></textarea>

                        </div>

                    </div>
                    <input type="hidden" id="destinasi" value="{{ $wisata->harga }}">
                    <label for="note" class="">Note</label>
                    <textarea name="note" id="note" class="w-full h-20 mt-2 rounded-md">

      </textarea>

                    <input type="hidden" id="priceWisata" value="{{ $wisata->harga }}">
                    <div id="hasil" class="mt-4 bg-yellow-100">

                    </div>
                    <div class="mt-5 grid gap-6">
                        <div class="relative border rounded-md p-4">

                            <table class="flex gap-x-4">
                                <thead>
                                    <tr class="flex flex-col text-left">
                                        <th class="my-2">Nama Pembeli</th>
                                        <th class="my-2">No Telephone</th>
                                    </tr>
                                </thead>

                                <tr class="flex flex-col text-left">
                                    <td class="my-2">:</td>
                                    <td class="my-2">:</td>
                                </tr>

                                <tbody>


                                    <tr class="flex flex-col text-left">
                                        <td class="my-2">{{ auth()->user()->username }}</td>
                                        <td class="my-2">{{ auth()->user()->no_tlpn }}</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>


                    </div>


                    <div class="flex items-center p-2 mt-4">
                        <input id="link-checkbox" type="checkbox" value=""
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="link-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                            data-modal-target="popup-modal" data-modal-toggle="popup-modal">I agree with the <a
                                href="#" class="text-blue-600 dark:text-blue-500 hover:underline">terms and
                                conditions</a>.</label>
                    </div>


                    <div id="popup-modal" tabindex="-1"
                        class="fixed border top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                    class="absolute top-3 right-1 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                    data-modal-hide="popup-modal">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-6 text-center">
                                    <h3 class="text-lg font-normal text-gray-500 dark:text-gray-400 mt-3">Are you sure you
                                        want to delete this product?</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between">
                        <div class="flex items-center pl-2 w-[40%] rounded dark:border-gray-700">
                            <input id="bordered-radio-1" type="radio" value="" name="bordered-radio"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="bordered-radio-1"
                                class="w-full py-2 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Payy
                                Full</label>
                        </div>
                        <div class="flex items-center pl-4 w-[40%] rounded dark:border-gray-700">
                            <input checked id="bordered-radio-2" type="radio" value="" name="bordered-radio"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="bordered-radio-2"
                                class="w-full py-2 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">DP
                                50%</label>
                        </div>
                    </div>


                    <!-- Total -->

                    <div class="flex items-center justify-between">

                        <div class="mt-6 border-t border-b py-2 w-full">
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-gray-900">Destination</p>
                                <p class="font-semibold text-gray-900">Rp. <span
                                        id="destinationPrice">{{ number_format($wisata->harga, 0, ',', '.') }}</span></p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-gray-900">Pickup</p>
                                <p class="font-semibold text-gray-900">Rp. <span
                                        id="pickupPrice">{{ number_format($firstpricePickup, 0, ',', '.') }}</span></p>
                            </div>

                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-gray-900">Total</p>
                                <p class="font-semibold text-gray-900">Rp. <span
                                        id="total">{{ number_format($wisata->harga + $firstpricePickup, 0, ',', '.') }}</span>
                                </p>
                            </div>

                        </div>
                    </div>

                </div>

                <button type="submit"
                    class="mt-4 mb-8 w-full rounded-md bg-gray-900 px-6 py-3 font-medium text-white">Place Order</button>
            </form>


        </div>
    </div>
@endsection
