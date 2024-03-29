@extends('layouts.main')


@section('container')
    <form action="/checkout/{{ $slug }}/payment" method="post" class="mb-32 mt-28  grid lg:grid-cols-2 "
        onclick="checkout()">
        @php
            
            if ($session !== null) {
                $harga = $session->price;
                $harga_child = $session->price_child;
                if ($session->price_child == null) {
                    $harga_child = $wisata->price_child;
                }
            } elseif ($session == null) {
                if ($weekend !== null) {
                    if ($day_departure == 'Saturday' || $day_departure == 'Sunday') {
                        $harga = $weekend->price;
                        $harga_child = $weekend->price_child;
                    } else {
                        $harga = $wisata->harga;
                        $harga_child = $wisata->price_child;
                    }
                } else {
                    $harga = $wisata->harga;
                    $harga_child = $wisata->price_child;
                }
            }
            //harga normal di kurangi harga diskon
            if ($child > 0 || $adult > 0) {
                $total_pesanan = $adult + $child;
                $priceWisata = $harga * $adult + $harga_child * $child;
                $priceWisata1 = $priceWisata;
            } else {
                $priceWisata = $harga;
                $priceWisata1 = $priceWisata;
                $total_pesanan = 1;
            }
            
            $total = $priceWisata; //harga sebelum diskon
            if (
                $wisata->event
                    ->where('tipe', 'aktif')
                    ->where('status', 1)
                    ->count() > 0
            ) {
                $event_aktif = App\Models\Event::where('wisata_id', $wisata->id)
                    ->where('tipe', 'aktif')
                    ->where('status', 1)
                    ->first();
                $priceWisata = $priceWisata - ($priceWisata * $event_aktif->potongan) / 100;
                $priceDiskon = $priceWisata1 - $priceWisata;
            }
            
            $priceWisata1 = $priceWisata; //jika ada diskon maka ini harga setelah dapat diskon
            if (
                $wisata->event
                    ->where('tipe', 'min_jumlah')
                    ->where('status', 1)
                    ->count() > 0
            ) {
                $event_min_jumlah = App\Models\Event::where('wisata_id', $wisata->id)
                    ->where('tipe', 'min_jumlah')
                    ->where('status', 1)
                    ->first();
                if ($total_pesanan >= $event_min_jumlah->min_jumlah) {
                    $priceWisata = $priceWisata1 - ($priceWisata1 * $event_min_jumlah->potongan) / 100;
                    $diskon_minjumlah = $priceWisata1 - $priceWisata;
                }
            }
            
            $priceWisata2 = $priceWisata; //jika ada diskon maka ini harga setelah dapat diskon
            if (
                $wisata->event
                    ->where('tipe', 'min_harga')
                    ->where('status', 1)
                    ->count() > 0
            ) {
                $event_min_harga = App\Models\Event::where('wisata_id', $wisata->id)
                    ->where('tipe', 'min_harga')
                    ->where('status', 1)
                    ->first();
                if ($priceWisata1 >= $event_min_harga->min_harga) {
                    $priceWisata = $priceWisata2 - ($priceWisata2 * $event_min_harga->potongan) / 100;
                    $diskon_minharga = $priceWisata2 - $priceWisata;
                }
            }
            $price_count = $priceWisata;
            
        @endphp

        <div class="">

            <div class="px-4 pt-2 ">

                <p class="text-xl font-medium">Order Summary</p>
                <p class="text-gray-400">Check your items.</p>

                <div class="mt-8 space-y-3 rounded-lg border bg-white px-2 py-4 sm:px-6">

                    @php
                        $img = explode('|', $wisata->image);
                    @endphp

                    <div class="flex flex-col rounded-lg bg-white sm:flex-row">

                        <img class="m-2 h-32 w-96 rounded-md border object-cover object-center"
                            src="{{ asset('image/' . $img[0]) }}" alt="" />
                        <div class="flex w-full flex-col px-4 py-4">
                            <span class="font-semibold text-xl">{{ $wisata->nama_wisata }}</span>
                            <p class="font-semibold text-base text-gray-500">{{ $wisata->tour_type }}</p>
                            <p class="text-base font-semibold">
                                Rp. {{ number_format($harga, 0, ',', '.') }}
                            </p>
                            @if ($session !== null)
                                <h1 class="bg-yellow-400 text-white font-semibold rounded-md text-center text-base mt-2 p-2">The departure you choose is high season, and you use high season prices</h1>
                            @elseif ($session == null)
                                @if ($day_departure == 'Saturday' || $day_departure == 'Sunday')
                                <h1 class="bg-yellow-400 text-white font-semibold rounded-md text-center text-base mt-2 p-2">The departure you select is a weekend day, and you use weekend days prices</h1>
                                @endif
                            @endif

                        </div>
                    </div>



                </div>

                @if ($wisata->extra->count() > 0)
                    {{-- addittional extra start --}}
                    <div class="mt-8">
                        <div class="">
                            <p class="text-xl font-semibold capitalize">extra (optional)</p>
                            <p class="text-xs text-gray-700">The following options are available with this product.</p>
                        </div>



                        @foreach ($wisata->extra as $extra)
                            <div class="flex md:flex-row gap-x-4 border-b-2 mt-2 justify-between py-4">

                                <div class="flex gap-x-4">
                                    <div class="w-[35%] flex items-center">
                                        <img src="{{ asset('image/' . $extra->image) }}" alt=""
                                            class="object-contain ">
                                    </div>

                                    <div class=" w-full flex-col flex">
                                        <div class="order-2">
                                            <p class="text-base md:text-lg font-semibold">{{ $extra->judul }}</p>
                                            <p class="text-sm mt-2 text-justify">{{ $extra->deskripsi }}</p>
                                        </div>

                                        @if ($extra->type == 'mobil')
                                            @php
                                                $mobil = App\Models\Kendaraan::get();
                                                $mobil_termurah = App\Models\Kendaraan::orderBy('harga', 'asc')->first();
                                            @endphp
                                            <div class="order-3">
                                                <select id="mobil" class="w-full rounded-md mt-2">

                                                    <option selected>Select Car</option>
                                                    @foreach ($mobil as $mobils)
                                                        <option value="{{ $mobils->id }},{{ $mobils->harga }}">
                                                            {{ $mobils->merek }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif

                                        @if ($extra->type == 'hotel')
                                            @php
                                                $hotel = App\Models\Hotel::where('wisata_id', $extra->wisata_id)->get();
                                                $hotel_termurah = App\Models\Hotel::where('wisata_id', $extra->wisata_id)
                                                    ->orderBy('harga', 'asc')
                                                    ->first();
                                            @endphp
                                            <div class="order-3">
                                                <select id="hotels" class="w-full rounded-md mt-2">
                                                    <option selected>Select Hotel</option>

                                                    @foreach ($hotel as $hotels)
                                                        <option value="{{ $hotels->id }},{{ $hotels->harga }}">
                                                            {{ $hotels->kategori_hotel }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        @endif

                                        <div class="order-1">
                                            @if ($extra->type == 'hotel')
                                                <p class="text-sm md:text-base font-semibold ">Start From Rp.
                                                    {{ number_format($hotel_termurah->harga, 0, ',', '.') }}</p>
                                            @elseif ($extra->type == 'mobil')
                                                @if ($mobil_termurah !== null)
                                                    <p class="text-sm md:text-base font-semibold ">Start From Rp.
                                                        {{ number_format($mobil_termurah->harga, 0, ',', '.') }}</p>
                                                @endif
                                            @else
                                                <p class="text-sm md:text-base font-semibold ">Rp.
                                                    {{ number_format($extra->harga, 0, ',', '.') }}</p>
                                            @endif
                                            <span class="text-xs ">per participant</span>
                                        </div>

                                    </div>
                                </div>

                                <div class="w-[25%] text-right ">



                                    <div class="items-end">
                                        @if (in_array($extra->type, ['hotel', 'mobil']))
                                            <input id="additional" type="checkbox"
                                                value=",{{ $extra->harga }}"
                                                @if ($extra->type !== 'hotel' && $extra->type !== 'mobil') name="extra[]" @endif
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 @if ($extra->type == 'hotel') hotel @endif @if ($extra->type == 'mobil') mobil @endif">
                                        @else
                                            <input id="additional" type="checkbox"
                                                value="{{ $extra->id }},{{ $extra->harga }}"
                                                @if ($extra->type !== 'hotel' && $extra->type !== 'mobil') name="extra[]" @endif
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 @if ($extra->type == 'hotel') hotel @endif @if ($extra->type == 'mobil') mobil @endif">
                                        @endif
                                    </div>

                                </div>

                            </div>
                        @endforeach

                    </div>
                    {{-- addittional extra end --}}
                @endif


            </div>
        </div>





        {{-- order details start --}}
        <div class="mt-10 bg-gray-50 px-4 pt-8">
            @csrf
            <p class="text-xl font-medium">Order Details</p>
            <p class="text-gray-400">Complete your order by providing your payment details.</p>

            <div class="">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">

                    <div class="w-full">
                        <label for="kota" class="font-semibold">Select City for pickup point </label>
                        <select name="kota" id="pickup" onclick="piickup()" class="w-full rounded-md ">
                            @foreach ($kota as $kota)
                                <option value="{{ $kota->slug }},{{ $kota->harga }}">{{ $kota->nama_kota }}</option>
                            @endforeach

                        </select>

                    </div>

                    <div class="w-full">
                        <label for="pickup" class="font-semibold">Pickup Point</label>
                        <textarea type="text" name="pickup" cols="1" rows="1" class="w-full rounded-md"></textarea>
                    </div>

                </div>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2 mb-2">

                    <div class="w-full">
                        <label for="kota" class="font-semibold">Select City For Dropout Point</label>
                        <select name="drop_kota" id="dropout" class="w-full rounded-md ">
                            @foreach ($drop as $drop)
                                <option value="{{ $drop->slug }}">{{ $drop->nama_kota }}</option>
                            @endforeach

                        </select>

                    </div>

                    <div class="w-full">
                        <label for="pickup" class="font-semibold">Dropout Point</label>
                        <textarea type="text" name="dropout" cols="1" rows="1" class="w-full rounded-md"></textarea>

                    </div>

                </div>
                <input type="hidden" id="destinasi" value="{{ $priceWisata }}">
                <p class="mt-4 text-gray-700">*If you want to change the departure time or something else, please write it below</p>
                <label for="note" class="font-semibold">Note</label>
                <textarea name="note" id="note" class="w-full h-20 mt-2 rounded-md">

              </textarea>

                @if ($adult > 1 || $child > 1)
                    <input type="hidden" id="priceWisata" value="{{ $price_count }}">
                @else
                    <input type="hidden" id="priceWisata" value="{{ $price_count }}">
                @endif

                <div id="hasil" class="mt-4 bg-yellow-100">

                </div>
                <div class="mt-5 grid gap-6">
                    <div class="relative border rounded-md p-4">

                        <table class="flex gap-x-4">
                            <thead>
                                <tr class="flex flex-col text-left">
                                    <th class="my-1">Nama Pembeli</th>
                                    <th class="my-1">No Telephone</th>
                                    <th class="my-1">Order Quantity</th>
                                    <th class="my-1">Departure</th>
                                    <input type="hidden" name="departure" value="{{ $tanggal }}">
                                </tr>
                            </thead>

                            <tr class="flex flex-col text-left">
                                <td class="my-1">:</td>
                                <td class="my-1">:</td>
                                <td class="my-1">:</td>
                                <td class="my-1">:</td>
                            </tr>

                            <tbody>


                                <tr class="flex flex-col text-left">
                                    <td class="my-1">{{ auth()->user()->username }}</td>
                                    <td class="my-1">{{ auth()->user()->no_tlpn }}</td>
                                    <td class="my-1">
                                        @if ($child > 0 || $adult > 0)
                                            {{ $child + $adult }}
                                        @else
                                            1
                                        @endif
                                    </td>
                                    <td class="my-1">{{ Carbon\Carbon::parse($tanggal)->format('Y-m-d h:i A') }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>


                </div>





                <h1 class="font-semibold mt-4">Select Your payment type</h1>
                <div class="flex justify-between">
                    <div class="flex items-center pl-2 w-[40%] rounded dark:border-gray-700">
                        <input checked id="payment_type" type="radio" value="full" name="payment_type"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="bordered-radio-1"
                            class="w-full py-2 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Payy
                            Full</label>
                    </div>
                    <div class="flex items-center pl-4 w-[40%] rounded dark:border-gray-700">
                        <input id="payment_type" type="radio" value="dp" name="payment_type"
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
                            <p class="text-sm font-semibold text-gray-900">Destination</p>
                            <p class="font-semibold text-gray-900">Rp. <span id="destinationPrice">
                                    {{ number_format($total, 0, ',', '.') }}

                                </span></p>
                        </div>

                        <div class="ml-4">
                            @if ($adult > 1)
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-medium text-gray-900">Adult</p>
                                    <p class="text-sm font-medium text-gray-900">
                                        {{ number_format($harga, 0, ',', '.') }} x {{ $adult }}</p>
                                    <p class="text-sm font-medium text-gray-900">Rp.
                                        {{ number_format($harga * $adult, 0, ',', '.') }}</p>
                                </div>
                                <input type="hidden" name="adult" value="{{ $adult }}">
                            @endif
                            @if ($child > 1)
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-medium text-gray-900">Child</p>
                                    <p class="text-sm font-medium text-gray-900">
                                        {{ number_format($harga_child, 0, ',', '.') }} x {{ $child }} </p>
                                    <p class="text-sm font-medium text-gray-900">Rp.
                                        {{ number_format($harga_child * $child, 0, ',', '.') }}</p>
                                </div>
                                <input type="hidden" name="child" value="{{ $child }}">
                            @endif
                        </div>

                        <div class="flex items-center justify-between" id="extra">
                            <p class="text-sm font-semibold text-gray-900" id="extra_nama"></p>
                            <p class="font-semibold text-gray-900" id="extra_jumlah"></p>
                            <p class="font-semibold text-gray-900" id="extra_harga"></p>
                            <div id="jumlah_pesanan" class="hidden" data-data="{{ json_encode($child + $adult) }}">
                            </div>
                        </div>

                        @if ($wisata->event->where('tipe', 'aktif')->where('status', 1)->count() > 0)
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-semibold text-gray-900">Diskon</p>
                                <p class="font-semibold text-gray-900">- Rp. <span>
                                        {{ number_format($priceDiskon, 0, ',', '.') }}
                                    </span></p>
                            </div>
                        @endif

                        @if ($wisata->event->where('tipe', 'min_jumlah')->where('status', 1)->count() > 0)
                            @if ($total_pesanan >= $event_min_jumlah->min_jumlah)
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-semibold text-gray-900">{{ $event_min_jumlah->judul }}</p>
                                    <p class="font-semibold text-gray-900">- Rp. <span>
                                            {{ number_format($diskon_minjumlah, 0, ',', '.') }}
                                        </span></p>
                                </div>
                            @endif
                        @endif

                        @if ($wisata->event->where('tipe', 'min_harga')->where('status', 1)->count() > 0)
                            @if ($priceWisata1 >= $event_min_harga->min_harga)
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-semibold text-gray-900">{{ $event_min_harga->judul }}</p>
                                    <p class="font-semibold text-gray-900">- Rp. <span>
                                            {{ number_format($diskon_minharga, 0, ',', '.') }}
                                        </span></p>
                                </div>
                            @endif
                        @endif

                        <div class="flex items-center justify-between">
                            <p class="text-sm font-semibold text-gray-900">Pickup</p>
                            <p class="font-semibold text-gray-900">Rp. <span
                                    id="pickupPrice">{{ number_format($firstpricePickup, 0, ',', '.') }}</span></p>
                        </div>

                        <div class="flex items-center justify-between">
                            <p class="text-sm font-semibold text-gray-900">Total</p>
                            <p class="font-semibold text-gray-900">Rp. <span id="total">
                                    @if ($adult > 1 || $child > 1)
                                        {{ number_format($price_count + $firstpricePickup, 0, ',', '.') }}
                                </span>
                            @else
                                {{ number_format($price_count + $firstpricePickup, 0, ',', '.') }}</span>
                                @endif
                            </p>
                        </div>


                        <div class="flex items-center justify-between" id="payment_type_area">
                            <p class="text-sm font-semibold text-gray-900" id="payment_title"></p>
                            <p class="font-semibold text-gray-900" id="payment_value"></p>
                        </div>



                    </div>
                </div>

            </div>

            <div class="flex items-center p-2 mt-4">
                <input id="Agree" name="agree" type="checkbox"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                    onclick="setujuh()">
                <label for="Agree" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                    data-modal-target="popup-modal" data-modal-toggle="popup-modal">I agree with the <a href="#"
                        class="text-blue-600 dark:text-blue-500 hover:underline">terms and
                        conditions</a>.</label>
            </div>


            <div id="popup-modal" tabindex="-1"
                class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-xl max-h-full">
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
                        <div class="p-6">
                            <h1 class="font-semibold lg:text-xl text-center">Terms</h1>
                            <h3 class="text-lg font-normal text-gray-500 dark:text-gray-400 mt-3">
                                {!! $terms->terms !!}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit"
                class="mt-4 mb-8 w-full rounded-md bg-gray-900 px-6 py-3 font-medium text-white disabled:bg-gray-500"
                id="checkout-btn" disabled onclick="loading()">Place Order
            </button>
        </div>


        </div>

        {{-- order details end --}}


    </form>




@endsection
