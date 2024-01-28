@extends('admin.layouts.main')
<!-- This is an example component -->

@section('container')
    <div class="px-4 py-6 overflow-hidden">


        <form class="w-[80%] mx-auto my-5" action="/supir/">
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
            ADD TEAM
        </button>

        <div class="flex flex-col mt-8 rounded-lg ">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
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
                    <div class="overflow-x-auto">



                        <div class="grid grid-cols-3 gap-4 mt-8">

                            @foreach ($data as $datas)
                                <div
                                    class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                                    <img class="object-cover w-full rounded-t-lg h-96 md:h-full md:w-[35%] md:rounded-none md:rounded-l-lg"
                                        src="{{ asset('image/' . $datas->image) }}" alt="">
                                    <div class="flex flex-col justify-between p-4 leading-normal w-[65%]">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                            {{ $datas->nama }}</h5>
                                        <h1 class="text-white font-semibold mb-2">{{ $datas->jabatan }}</h1>
                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $datas->profile }}
                                        </p>

                                        <div class="flex gap-x-2">

                                            <button data-bs-toggle="modal"
                                                data-bs-target="#exampleModalLong-{{ $datas->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" class="fill-green-400"
                                                    style="transform: ;msFilter:;">
                                                    <path
                                                        d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z">
                                                    </path>
                                                    <path
                                                        d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z">
                                                    </path>
                                                </svg>
                                            </button>

                                            <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop-{{ $datas->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" class="fill-red-500" style="transform: ;msFilter:;">
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
                    class="modal-content border-none  relative flex flex-col w-[800px] pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current m-auto dark:bg-slate-700 shadow-lg">
                    <div class="modal-header flex flex-shrink-0 items-center justify-between p-4  rounded-t-md">

                        <form action="/admin/team/edit/{{ $edit->id }}" method="POST" class="w-full px-4"
                            enctype="multipart/form-data">
                            <h1 class="text-center font-semibold text-2xl text-gray-900 dark:text-white">EDIT TEAM</h1>
                            @csrf

                            <img src="{{ asset('image/' . $edit->image) }}" alt=""
                                class="flex w-36 h-36 justify-center object-cover">
                            <div class="mt-4">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="file_input">Upload Image</label>
                                <input
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    id="file_input" type="file" name="image">
                            </div>

                            <div class="mt-4">
                                <label for="nama" class="text-gray-900 dark:text-white">Name</label>
                                <input type="text" name="nama" id="nama"
                                    class="w-full h-12 rounded-md p-2 border mt-4 bg-gray-200 dark:bg-gray-800 text-gray-900 dark:text-white"
                                    value="{{ $edit->nama }}">
                            </div>
                            <div class="mt-4">
                                <label for="jabatan" class="text-gray-900 dark:text-white">jabatan</label>
                                <input type="text" name="jabatan" id="jabatan"
                                    class="w-full h-12 rounded-md p-2 border mt-4 bg-gray-200 dark:bg-gray-800 text-gray-900 dark:text-white"
                                    value="{{ $edit->jabatan }}">
                            </div>
                            <div class="mt-4">
                                <label for="alamat" class="text-gray-900 dark:text-white">profile</label>
                                <input type="text" name="profile" id="profile"
                                    class="w-full h-12 rounded-md p-2 border mt-4 bg-gray-200 dark:bg-gray-800 text-gray-900 dark:text-white"
                                    value="{{ $edit->profile }}">
                            </div>

                            <div class="flex gap-x-4 mt-4">
                                <button type="submit" id="btn-select-file"
                                    class="bg-green-600 py-2 px-4 rounded-md text-white">SEND</button>
                                <a href="/team" class="bg-red-600 px-4 py-2 text-white rounded-md">UNDO</a>
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
                class="modal-content border-none shadow-lg relative flex flex-col w-[800px] pointer-events-auto dark:bg-slate-700 bg-white bg-clip-padding rounded-md outline-none text-current m-auto">
                <div class="modal-header flex flex-shrink-0 items-center justify-between p-4  rounded-t-md">

                    <form action="admin/team/add" method="POST" class="w-full px-4" enctype="multipart/form-data">
                        <h1 class="text-center font-semibold text-2xl dark:text-white">ADD TEAM</h1>

                        @csrf

                        <div class="mt-4">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="file_input">Upload Image</label>
                            <input
                                class="block w-full text-sm text-gray-900 font-semibold border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="file_input" type="file" name="image">
                        </div>

                        <div class="mt-4">
                            <label class="text-gray-900 dark:text-white font-semibold" for="nama">Name</label>
                            <input type="text" name="nama" id="nama"
                                class="w-full h-12 rounded-md p-2 border mt-4 g-gray-200 dark:bg-gray-800 text-gray-900 dark:text-white">
                        </div>
                        <div class="mt-4">
                            <label class="text-gray-900 dark:text-white font-semibold" for="no_tlpn">Jabatan</label>
                            <input type="text" name="jabatan" id="jabatan"
                                class="w-full h-12 rounded-md p-2 border mt-4 g-gray-200 dark:bg-gray-800 text-gray-900 dark:text-white">
                        </div>
                        <div class="mt-4">
                            <label class="text-gray-900 dark:text-white font-semibold" for="alamat">Profile</label>
                            <input type="text" name="profile" id="profile"
                                class="w-full h-12 rounded-md p-2 border mt-4 g-gray-200 dark:bg-gray-800 text-gray-900 dark:text-white">
                        </div>

                        <div class="flex gap-x-4 mt-4">
                            <button type="submit" class="bg-green-600 py-2 px-4 rounded-md text-white">Send</button>
                            <a href="/team" class="bg-red-600 px-4 py-2 text-white rounded-md">Undo</a>
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
                        <form action="/admin/team/delete/{{ $delete->id }}" method="POST">
                            @csrf




                            <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400 text-center">Are you sure
                                you want to Delete this Team?</h3>
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
