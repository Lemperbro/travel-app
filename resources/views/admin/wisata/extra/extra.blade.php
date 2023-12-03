@extends('admin.layouts.main')

@section('container')
    <div class="px-4 py-6">
        <h1 class="text-gray-900 dark:text-white text-2xl font-semibold">Extra</h1>



        <a href="/extra/add/{{ $id }}"
            class="text-white font-semibold p-2 rounded-md bg-orange-700 mt-5 inline-block">Add Extra</a>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 mt-10">

            @foreach ($datas as $data)
                @php
                    
                    $mobil = App\Models\Kendaraan::orderBy('harga', 'asc')->first();
                @endphp
                @if ($data->type == 'hotel')
                    @php
                        $hotel = App\Models\Hotel::where('wisata_id', $data->wisata_id)
                            ->orderBy('harga', 'asc')
                            ->first();
                        $harga = $hotel->harga;
                    @endphp
                @elseif ($data->type == 'mobil')
                    @php
                        if ($mobil !== null) {
                            $harga = $mobil->harga;
                        } else {
                            $harga = 0;
                        }
                    @endphp
                @else
                    @php
                        $harga = $data->harga;
                    @endphp
                @endif
                <div
                    class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <img class="object-cover w-full rounded-t-lg h-96 md:h-full md:w-[35%] md:rounded-none md:rounded-l-lg"
                        src="{{ asset('image/' . $data->image) }}" alt="">
                    <div class="flex flex-col justify-between p-4 leading-normal w-[100%]">
                        <h1 class="dark:text-white/80 text-gray-900/80 mb-2 ">Type (<span
                                class="font-semibold">{{ $data->type }}</span>)</h1>
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $data->judul }}
                        </h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $data->deskripsi }}</p>
                        <h1 class="text-white font-semibold mb-2">
                            @if ($data->type == 'mobil' || $data->type == 'hotel')
                                Start From Rp. {{ number_format($harga, 0, ',', '.') }}
                                @if ($data->type == 'mobil' && $mobil == null)
                                    <a href="/kendaraan" class="text-white bg-yellow-400 p-2 rounded-md">Please Input
                                        Vehicle</a>
                                @endif
                            @else
                                Rp. {{ number_format($harga, 0, ',', '.') }}
                            @endif
                        </h1>

                        <div class="flex gap-x-2">
                            <form action="/extra/edit_redirect/{{ $data->id }}" method="POST" class="mt-[6px]">
                                @csrf
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" class="fill-green-400" style="transform: ;msFilter:;">
                                        <path d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z"></path>
                                        <path
                                            d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z">
                                        </path>
                                    </svg>
                                </button>
                            </form>

                            <button type="button" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop-{{ $data->id }}" class="my-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    class="fill-red-500" style="transform: ;msFilter:;">
                                    <path
                                        d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z">
                                    </path>
                                </svg>
                            </button>

                        </div>
                    </div>
                </div>
            @endforeach






        </div>



    </div>



    @foreach ($datas as $delete)
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
                        <form action="/extra/delete/{{ $delete->id }}" method="POST">
                            @csrf
                            <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400 text-center">Are you sure
                                you want to Delete this Extra</h3>
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
@endsection
