@extends('admin.layouts.main')
<!-- This is an example component -->

@section('container')
    <div class="px-4 py-8">


        <div class="flex flex-wrap my-auto gap-4 mx-auto justify-center">
            <a href="/admin/kota/add"
                class="bg-orange-600 py-2 px-4 rounded-md flex justify-center md:justify-start order-2 md:order-1 w-full md:w-auto">
                <h1 class=" text-white font-semibold my-auto">ADD CITY</h1>
            </a>

            <form class="w-[100%] md:w-[80%] my-auto order-1 md:order-2" action="/admin/kota">
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

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 mt-8 ">


            @php
                $coba = 0;
            @endphp


            {{-- card 2 start --}}
            @foreach ($data as $query)
                <div class="block rounded-lg p-4 shadow-best dark:bg-gray-700 bg-white relative">
                    {{-- action menu start --}}
                    <div class="absolute right-6 top-6 dark:bg-white bg-gray-900 rounded-md shadow-best4">
                        <div>
                            <button type="button"
                                class="inline-flex justify-center  mt-1 mr-2 w-full options-menu{{ $query->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="24" height="24"
                                    class="text-white dark:text-gray-900 font-semibold" viewBox="0 0 24 24"
                                    style="transform: ;msFilter:;">
                                    <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path>
                                </svg>
                            </button>
                        </div>

                        <div
                            class="origin-top-right absolute right-0 mt-2 w-56 rounded-md  bg-white ring-1 ring-black ring-opacity-5 focus:outline-none shadow-best5 hidden dropdown-menu{{ $query->id }}">
                            <div class="py-1" role="none">

                                <button type="button"
                                    class="inline-block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 w-full"
                                    onclick="edit_{{ $query->id }}.showModal()">
                                    Edit
                                </button>


                                <button type="button" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop-{{ $query->id }}"
                                    class="block px-4 py-2 text-sm text-red-700 hover:bg-red-100 hover:text-red-900 w-full">
                                    Delete
                                </button>

                            </div>
                        </div>
                    </div>

                    @include('admin.kota.actionMenu')
                    {{-- action menu end  --}}

                    @php
                        $images = explode('|', $query->image);
                    @endphp

                    <img alt="Home" src="{{ asset('image/' . $images[0]) }}"
                        class="h-56 w-full rounded-md object-cover" />

                    <div class="mt-2">
                        <dl>
                            <div>
                                <dt class="sr-only">Price</dt>

                                <dd class="text-sm text-gray-700 dark:text-gray-200 font-semibold">Start From Rp.
                                    {{ number_format($query->harga, 0, ',', '.') }}</dd>
                            </div>

                            <div>
                                <dt class="sr-only">Address</dt>

                                <dd class="text-gray-900 dark:text-white font-semibold text-xl">{{ $query->nama_kota }}</dd>
                            </div>

                    </div>
                    </dl>


                </div>
            @endforeach
            {{-- card 2 end --}}
        </div>

    </div>

    @if ($data->count() === 0)
        <!-- component -->
        <div class=" flex flex-col items-center justify-center mt-10">

            <svg xmlns="http://www.w3.org/2000/svg" class="w-44 fill-gray-900 dark:fill-white h-44" width="24"
                height="24" viewBox="0 0 24 24" style="transform: ;msFilter:;">
                <path
                    d="M20 6c0-2.168-3.663-4-8-4S4 3.832 4 6v2c0 2.168 3.663 4 8 4s8-1.832 8-4V6zm-8 13c-4.337 0-8-1.832-8-4v3c0 2.168 3.663 4 8 4s8-1.832 8-4v-3c0 2.168-3.663 4-8 4z">
                </path>
                <path d="M20 10c0 2.168-3.663 4-8 4s-8-1.832-8-4v3c0 2.168 3.663 4 8 4s8-1.832 8-4v-3z"></path>
            </svg>


            <div class="flex flex-col items-center justify-center">
                <p class="text-3xl md:text-4xl lg:text-5xl text-gray-900 dark:text-white mt-12">{{ request('search') }} Not
                    Found</p>
                <p class="md:text-lg lg:text-xl text-gray-600 dark:text-slate-300 mt-8">Sorry, {{ request('search') }} you
                    are looking for could not be found.</p>

            </div>
        </div>
    @endif

    {{ $data->links('vendor.pagination.tailwind') }}



    </div>








    <!-- Modal Edit-->
    {{-- @foreach ($data as $edit)
        <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto backdrop-blur-sm"
            id="exampleModalLong-{{ $edit->id }}" tabindex="-1" aria-labelledby="exampleModalLongLabel"
            aria-hidden="true">
            <div class="modal-dialog relative w-auto pointer-events-none ">
                <div
                    class="modal-content border-none shadow-lg relative flex flex-col w-[400px] md:w-[500px] lg:w-[800px] pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current left-[50%] -translate-x-[50%] mt-[30%] p-2 md:p-4 lg:p-10">
                    <div
                        class="modal-header flex flex-shrink-0 items-center justify-between border-b border-gray-200 rounded-t-md border">

                        <form action="/admin/kota/edit/{{ $edit->id }}" method="POST" class="w-full px-4"
                            enctype="multipart/form-data">
                            <h1 class="text-center font-semibold text-2xl">EDIT CITY</h1>
                            @csrf
                            <div class="w-full">
                                <label for="image">Gambar</label>

                                <input type="file" name="image[]"
                                    class="w-full border object-cover block rounded-md mt-4" multiple>

                            </div>
                            <div class="mt-4">
                                <label for="nama">Nama Kota</label>
                                <input type="text" name="nama" id="nama"
                                    class="w-full h-12 rounded-md p-2 border mt-4" value="{{ $edit->nama_kota }}">
                            </div>
                            <div class="mt-4">
                                <label for="harga">Harga</label>
                                <input type="text" name="harga" id="harga"
                                    class="w-full h-12 rounded-md p-2 border mt-4" value="{{ $edit->harga }}">
                            </div>

                            <div class="flex gap-x-4 mt-4">
                                <button type="submit" class="bg-green-600 py-2 px-4 rounded-md text-white">Kirim</button>
                                <a href="/admin/kota" class="bg-red-600 px-4 py-2 text-white rounded-md">Batal</a>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    @endforeach --}}


    @foreach ($data as $edit)
        <dialog id="edit_{{ $edit->id }}" class="modal modal-bottom sm:modal-middle">
            <form action="/admin/kota/edit/{{ $edit->id }}" method="POST" class="modal-box"
                enctype="multipart/form-data">
                <h1 class="text-center font-semibold text-2xl">EDIT CITY</h1>
                @csrf
                <div class="w-full">
                    <label for="image">Gambar</label>

                    <input type="file" name="image[]" class="w-full border object-cover block rounded-md mt-4" multiple>

                </div>
                <div class="mt-4">
                    <label for="nama">Nama Kota</label>
                    <input type="text" name="nama" id="nama" class="w-full h-12 rounded-md p-2 border mt-4"
                        value="{{ $edit->nama_kota }}">
                </div>
                <div class="mt-4">
                    <label for="harga">Harga</label>
                    <input type="number" name="harga" id="harga" class="w-full h-12 rounded-md p-2 border mt-4"
                        value="{{ $edit->harga }}">
                </div>

                <div class="flex gap-x-4 mt-4">
                    <button type="submit" class="bg-green-600 py-2 px-4 rounded-md text-white">Kirim</button>
                    <a href="/admin/kota" class="bg-red-600 px-4 py-2 text-white rounded-md">Batal</a>
                </div>
            </form>
        </dialog>
    @endforeach


    @foreach ($data as $delete)
        <!-- Modal delete-->
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
                        <form action="/kota/delete/{{ $delete->id }}" method="POST">
                            @csrf




                            <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400 text-center">Are you sure
                                you want to delete this City</h3>
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
        {{-- akhir modal --}}
    @endforeach
@endsection
