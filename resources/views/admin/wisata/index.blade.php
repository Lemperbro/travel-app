@extends('admin.layouts.main')

@section('container')
    <div class="px-4 py-6">

        <div class="flex flex-wrap my-auto gap-4 mx-auto justify-center">


            <div class="flex gap-4 order-2 lg:order-1">

                <!-- Button trigger modal -->
                <button type="button" onclick="filter.showModal()"
                    class="inline-block px-6 py-2.5 bg-green-600 text-white font-semibold text-sm leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out ">
                    FIlter City
                </button>

                <!-- Modal filter-->
                <dialog id="filter" class="modal modal-bottom sm:modal-middle">
                    {{-- isi model --}}
                    <form action="/admin/wisata/" class="modal-box bg-gray-200 dark:bg-gray-700">
                        <div class="mt-2">
                            <input id="all" class="form-radio h-5 w-5 text-green-500 " type="radio"
                                name="pilihDaerah" value="" {{ request('pilihDaerah') === null ? 'checked' : '' }} />
                            <label for="all" class="inline-flex items-center ml-2 cursor-pointer ">
                                <span class="text-gray-900 dark:text-white">All</span>
                            </label>
                        </div>

                        @foreach ($kota as $kota)
                            <div class="mt-2">
                                <input id="{{ $kota->slug }}" class="form-radio h-5 w-5 text-blue-500 " type="radio"
                                    name="pilihDaerah" value="{{ $kota->slug }}"
                                    {{ request('pilihDaerah') === $kota->slug ? 'checked' : '' }} />
                                <label for="{{ $kota->slug }}" class="inline-flex items-center ml-2 cursor-pointer ">
                                    <span class="text-gray-900 dark:text-white">{{ $kota->nama_kota }}</span>
                                </label>
                            </div>
                        @endforeach

                        <div
                            class=" flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-gray-200 rounded-b-md">
                            <label for="cancelFilter"
                                class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out">Close</label>
                            <button type="submit"
                                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">Selesai</button>

                        </div>
                    </form>
                    <form method="dialog" class="modal-box hidden">
                        <h3 class="font-bold text-lg">Hello!</h3>
                        <p class="py-4">Press ESC key or click the button below to close</p>
                        <div class="modal-action">
                            <!-- if there is a button in form, it will close the modal -->
                            <button id="cancelFilter" class="btn">Close</button>
                        </div>
                    </form>
                </dialog>
                {{-- akhir modal --}}

                <a href="/admin/wisata/add" class="bg-orange-600 text-white p-2 rounded-md font-semibold ">
                    <span class="block my-auto uppercase  h-full p-2">Add Tour</span>
                </a>
            </div>


            <form class="w-[100%] md:w-[80%] my-auto order-1  lg:order-2" action="/admin/wisata">
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
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
            </form>


        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 mt-8">





            @foreach ($data as $wisata)
                {{-- card 2 start --}}


                <div class="block rounded-lg p-4 shadow-best shadow-indigo-100 dark:bg-gray-700 bg-white relative">
                    <div class="absolute right-6 top-6 dark:bg-white bg-gray-900 rounded-md shadow-best4">

                        <div>
                            <button type="button"
                                class="inline-flex justify-center mt-1 mr-2 w-full options-menu-wisata{{ $wisata->id }}">

                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="24" height="24"
                                    class="text-white dark:text-gray-900 font-semibold" viewBox="0 0 24 24"
                                    style="transform: ;msFilter:;">
                                    <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path>
                                </svg>
                            </button>
                        </div>

                        <div
                            class="origin-top-right absolute right-0 mt-2 w-56 rounded-md  bg-white ring-1 ring-black ring-opacity-5 focus:outline-none shadow-best5 hidden dropdown-menu-wisata{{ $wisata->id }}">
                            <div class="py-1" role="none">

                                <a href="/admin/wisata/edit/{{ $wisata->id }}"
                                    class="inline-block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 w-full text-center">
                                    Edit
                                </a>

                                <a href="/extra/{{ $wisata->id }}"
                                    class="inline-block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 w-full text-center">
                                    Extra
                                </a>
                                <a href="/event/{{ $wisata->id }}"
                                    class="inline-block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 w-full text-center">
                                    Event
                                </a>

                                <a href="/admin/wisata/{{ $wisata->slug }}/session"
                                    class="inline-block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 w-full text-center">
                                    Session
                                </a>

                                <a href="/admin/wisata/faq/{{ $wisata->slug }}"
                                    class="inline-block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 w-full text-center">
                                    Manage FAQ
                                </a>



                                <button type="button" onclick="deleteWisata_{{ $wisata->id }}.showModal()"
                                    class="block px-4 py-2 text-sm text-red-700 hover:bg-red-100 hover:text-red-900 w-full">
                                    Delete
                                </button>


                                @if ($wisata->status == true)
                                    <form method="post" action="/admin/wisata/nonaktif/{{ $wisata->id }}">
                                        @csrf
                                        <button type="submit"
                                            class="block px-4 py-2 text-sm text-red-700 hover:bg-red-100 hover:text-red-900 w-full">Nonaktif</button>
                                    </form>
                                @elseif ($wisata->status == false)
                                    <form method="post" action="/admin/wisata/aktif/{{ $wisata->id }}">
                                        @csrf
                                        <button type="submit"
                                            class="block px-4 py-2 text-sm text-green-700 hover:bg-green-100 hover:text-green-900 w-full">Active</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>



                    @include('admin.wisata.actionMenu')

                    @php
                        $images = explode('|', $wisata->image);
                        $harga_wisata = $wisata->harga;
                        $season = App\Models\Session::where('wisata_id', $wisata->id)
                            ->where('startDate', '<=', $date_now)
                            ->where('endDate', '>=', $date_now)
                            ->where('type', 'session')
                            ->first();
                        $weekend = App\Models\Session::where('wisata_id', $wisata->id)
                            ->where('type', 'weekend')
                            ->first();
                        $label_price = null;
                        if ($season !== null) {
                            $harga_wisata = $season->price;
                            $label_price = 'Price High Season is Active';
                        } elseif ($weekend !== null) {
                            if ($day_now == 'Saturday' || $day_now == 'Sunday') {
                                $harga_wisata = $weekend->price;
                                $label_price = 'Price Weekend is Active';
                            }
                        }
                        
                    @endphp
                    <img alt="Home" src="{{ asset('image/' . $images[0]) }}"
                        class="h-56 w-full rounded-md object-cover" />

                    <div class="mt-4">
                        <div class="">
                            <div class="flex gap-2 flex-wrap justify-between mb-2">

                                <dd class="text-sm text-gray-700 dark:text-gray-200 my-auto">Rp.
                                    {{ number_format($harga_wisata, 0, ',', '.') }}</dd>
                                @if ($label_price !== null)
                                    <h1 class="bg-lime-500 p-1 rounded-md font-semibold text-base ">{{ $label_price }}
                                    </h1>
                                @endif
                            </div>

                            <div>
                                <dt class="sr-only">Address</dt>

                                <dd class="text-gray-900 dark:text-white font-semibold">{{ $wisata->nama_wisata }}</dd>
                            </div>
                        </div>

                        <div class="mt-6 grid grid-cols-3 items-center gap-8 text-xs">
                            <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
                                @if ($wisata->status == true)
                                    <span class="w-3 h-3 rounded-full bg-green-500"></span>
                                    <h1 class="text-gray-900 dark:text-white font-semibold text-xs uppercase">Active</h1>
                                @elseif ($wisata->status == false)
                                    <span class="w-3 h-3 rounded-full bg-red-500"></span>
                                    <h1 class="text-gray-900 dark:text-white font-semibold text-xs uppercase">Not Active
                                    </h1>
                                @endif
                            </div>

                            <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 96 960 960" fill="currentColor"
                                    class="text-gray-900 dark:text-white w-7 h-7">
                                    <path
                                        d="M480 758q103.95-83.86 156.975-161.43Q690 519 690 452q0-59-21.5-100t-53.009-66.88q-31.51-25.881-68.271-37.5Q510.459 236 480 236q-30.459 0-67.22 11.62-36.761 11.619-68.271 37.5Q313 311 291.5 352T270 452q0 67 53.025 144.57T480 758Zm0 76Q343 731 276.5 636.801q-66.5-94.2-66.5-184.554Q210 384 234.5 332.5T298 246q39-35 86.98-52.5 47.98-17.5 95-17.5T575 193.5q48 17.5 87 52.5t63.5 86.533Q750 384.066 750 452.456 750 543 683.5 637 617 731 480 834Zm.089-318Q509 516 529.5 495.411q20.5-20.588 20.5-49.5Q550 417 529.411 396.5q-20.588-20.5-49.5-20.5Q451 376 430.5 396.589q-20.5 20.588-20.5 49.5Q410 475 430.589 495.5q20.588 20.5 49.5 20.5ZM210 976v-60h540v60H210Zm270-524Z" />
                                </svg>

                                <div class="mt-1.5 sm:mt-0">
                                    <p class="text-gray-900 dark:text-gray-200 font-semibold">Location</p>

                                    <p class="font-medium text-gray-700 dark:text-gray-300">{{ $wisata->kota->nama_kota }}
                                    </p>
                                </div>
                            </div>

                            <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="text-gray-900 dark:text-white w-7 h-7" style="transform: ;msFilter:;">
                                    <path
                                        d="M19.965 8.521C19.988 8.347 20 8.173 20 8c0-2.379-2.143-4.288-4.521-3.965C14.786 2.802 13.466 2 12 2s-2.786.802-3.479 2.035C6.138 3.712 4 5.621 4 8c0 .173.012.347.035.521C2.802 9.215 2 10.535 2 12s.802 2.785 2.035 3.479A3.976 3.976 0 0 0 4 16c0 2.379 2.138 4.283 4.521 3.965C9.214 21.198 10.534 22 12 22s2.786-.802 3.479-2.035C17.857 20.283 20 18.379 20 16c0-.173-.012-.347-.035-.521C21.198 14.785 22 13.465 22 12s-.802-2.785-2.035-3.479zm-9.01 7.895-3.667-3.714 1.424-1.404 2.257 2.286 4.327-4.294 1.408 1.42-5.749 5.706z">
                                    </path>
                                </svg>

                                <div class="mt-1.5 sm:mt-0">
                                    <p class="text-gray-900 dark:text-gray-200 font-semibold">Type Tour</p>

                                    <p class="font-medium text-gray-700 dark:text-gray-300">{{ $wisata->tour_type }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- card 2 akhir       --}}
            @endforeach



        </div>



        {{ $data->links('vendor.pagination.tailwind') }}


    </div>




    {{-- modal delete --}}










    @foreach ($data as $modal)
        <!-- Modal delete start-->

        <dialog id="deleteWisata_{{ $modal->id }}" class="modal modal-bottom sm:modal-middle">
            <form action="/admin/wisata/delete/{{ $modal->id }}" method="POST" class="modal-box bg-gray-200 dark:bg-gray-700">
                @csrf
                <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400 text-center">Are you sure
                    you want to delete this product?</h3>
                <div class="flex flex-wrap gap-x-2 mx-auto justify-center">

                    <button type="submit"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Yes, I'm sure
                    </button>
                    <label for="cancelDeleteWisata" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</label>

                </div>
            </form>

            <form method="dialog" class="modal-box hidden">
                <h3 class="font-bold text-lg">Hello!</h3>
                <p class="py-4">Press ESC key or click the button below to close</p>
                <div class="modal-action">
                    <!-- if there is a button in form, it will close the modal -->
                    <button id="cancelDeleteWisata" class="btn" >Close</button>
                </div>
            </form>
        </dialog>

            {{-- akhir modal delete --}}
    @endforeach
@endsection
