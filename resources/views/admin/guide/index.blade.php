@extends('admin.layouts.main')
<!-- This is an example component -->

@section('container')
    <div class="px-4 py-6 overflow-hidden">


        <form class="w-full md:w-[80%] mx-auto my-5" action="/supir/">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="search" id="default-search" name="search" value="{{ request('search') }}"
                    class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="">
                <button type="submit"
                    class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>

        <button type="button"
            class="inline px-6 py-2.5 bg-blue-600 text-white font-bold text-sm  uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
            data-bs-toggle="modal" data-bs-target="#exampleModalLong">
            ADD GUIDE
        </button>

        @if ($errors->any())
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <ul class="px-5">
                    @foreach ($errors->all() as $error)
                        <li class="list-disc">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="flex flex-col mt-8 rounded-lg ">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-x-auto">


                        <table class="w-full">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-gray-700 uppercase border-b-2 dark:border-gray-400 bg-gray-300 dark:text-gray-400 dark:bg-gray-800 text-center">
                                    <th class=" px-4 py-3">No</th>
                                    <th class=" px-4 py-3">Name</th>
                                    <th class=" px-4 py-3">Profile</th>
                                    <th class=" px-4 py-3">Phone</th>
                                    <th class="px-2 ">Address</th>
                                    <th class="px-2 ">Action</th>
                                </tr>
                            </thead>

                            <tbody
                                class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800 border-b-[1px] dark:border-gray-500 ">

                                @foreach ($data as $no => $user)
                                    <tr
                                        class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3 text-sm  text-center">{{ $no + 1 }}</td>

                                        <td class="px-4 py-3 text-sm  text-center w-32 h-32 object-cover">
                                            {{ $user->nama }}
                                        </td>


                                        <td class="px-4 py-3   text-center w-32 h-32 object-cover">
                                            <img src="{{ asset('image/' . $user->image) }}" alt="">
                                        </td>

                                        <td class="px-4 py-3 text-sm  text-center">
                                            {{ $user->no_tlpn }}
                                        </td>

                                        <td class="px-4 py-3 text-sm  text-center">
                                            {{ $user->alamat }}
                                        </td>


                                        <td class="px-4 py-10 text-sm text-center flex gap-x-4 justify-center">
                                            <button type="button"
                                                class="inline-block px-2 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-[40%]"
                                                data-bs-toggle="modal"
                                                data-bs-target="#exampleModalLong-{{ $user->id }}">
                                                Edit
                                            </button>

                                            <button type="button" class="bg-red-600 p-2 rounded-md text-white"
                                                data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop-{{ $user->id }}">Delete</button>

                                        </td>

                                    </tr>
                                @endforeach


                            </tbody>
                        </table>





                    </div>
                </div>
            </div>
        </div>

    </div>


    {{-- modal edit start --}}
    @foreach ($data as $edit)
        <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto "
            id="exampleModalLong-{{ $edit->id }}" tabindex="-1" aria-labelledby="exampleModalLongLabel"
            aria-hidden="true">
            <div class="modal-dialog relative w-auto pointer-events-none">
                <div
                    class="modal-content border-none shadow-lg relative flex flex-col w-[800px] pointer-events-auto dark:bg-slate-800 bg-white bg-clip-padding rounded-md outline-none text-current m-auto">
                    <div
                        class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">

                        <form action="/admin/guide/edit/{{ $edit->id }}" method="POST" class="w-full px-4"
                            enctype="multipart/form-data">
                            <h1 class="text-center font-semibold text-2xl dark:text-white">EDIT GUIDE</h1>
                            @csrf

                            <div class="mt-4">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="file_input">Upload Image</label>
                                <input
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    id="file_input" type="file" name="image">
                            </div>

                            <div class="mt-4">
                                <label class="dark:text-white font-semibold" for="nama">Name</label>
                                <input type="text" name="nama" id="nama"
                                    class="dark:bg-gray-600 dark:text-white w-full h-12 rounded-md p-2 border mt-4"
                                    value="{{ $edit->nama }}">
                            </div>
                            <div class="mt-4">
                                <label class="dark:text-white font-semibold" for="no_tlpn">Telephone</label>
                                <input type="number" name="no_tlpn" id="no_tlpn"
                                    class="dark:bg-gray-600 dark:text-white w-full h-12 rounded-md p-2 border mt-4"
                                    value="{{ $edit->no_tlpn }}">
                            </div>
                            <div class="mt-4">
                                <label class="dark:text-white font-semibold" for="alamat">Address</label>
                                <input type="text" name="alamat" id="alamat"
                                    class="dark:bg-gray-600 dark:text-white w-full h-12 rounded-md p-2 border mt-4"
                                    value="{{ $edit->alamat }}">
                            </div>

                            <div class="flex gap-x-4 mt-4">
                                <button type="submit" id="btn-select-file"
                                    class="bg-green-600 py-2 px-4 rounded-md text-white">SEND</button>
                                <a href="/guide" class="bg-red-600 px-4 py-2 text-white rounded-md">UNDO</a>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    @endforeach
    {{-- modal edit end --}}



    {{-- modal add start --}}
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto "
        id="exampleModalLong" tabindex="-1" aria-labelledby="exampleModalLongLabel" aria-hidden="true">
        <div class="modal-dialog relative w-auto pointer-events-none">
            <div
                class="modal-content border-none shadow-lg relative flex flex-col w-[800px] pointer-events-auto dark:bg-slate-800 bg-white bg-clip-padding rounded-md outline-none text-current m-auto">
                <div
                    class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">

                    <form action="/admin/guide/add" method="POST" class="w-full px-4" enctype="multipart/form-data">
                        <h1 class="text-center font-semibold text-2xl dark:text-white">ADD GUIDE</h1>

                        @csrf

                        <div class="mt-4">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="file_input">Upload Image</label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="file_input" type="file" name="image">
                        </div>

                        <div class="mt-4">
                            <label class="dark:text-white font-semibold" for="nama">Name</label>
                            <input type="text" name="nama" id="nama"
                                class="dark:bg-gray-600 dark:text-white w-full h-12 rounded-md p-2 border mt-4">
                        </div>
                        <div class="mt-4">
                            <label class="dark:text-white font-semibold" for="no_tlpn">Telephon</label>
                            <input type="number" name="no_tlpn" id="no_tlpn"
                                class="dark:bg-gray-600 dark:text-white w-full h-12 rounded-md p-2 border mt-4">
                        </div>
                        <div class="mt-4">
                            <label class="dark:text-white font-semibold" for="alamat">Address</label>
                            <input type="text" name="alamat" id="alamat"
                                class="dark:bg-gray-600 dark:text-white w-full h-12 rounded-md p-2 border mt-4">
                        </div>
                        <div class="flex gap-x-4 mt-4">
                            <button type="submit" class="bg-green-600 py-2 px-4 rounded-md text-white">Send</button>
                            <a href="/guide" class="bg-red-600 px-4 py-2 text-white rounded-md">Undo</a>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    {{-- modal add end --}}


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
                        <form action="admin/guide/delete/{{ $delete->id }}" method="POST">
                            @csrf




                            <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400 text-center">Are you sure
                                you want to Delete this Guide?</h3>
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
