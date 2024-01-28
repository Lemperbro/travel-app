@extends('layouts.main')


<div class="relative">
    <img src='/gambar/op.png' class='w-full h-[300px] md:h-[300px] lg:h-[400px] xl:h-[500px] object-cover' />
    <h1
        class='absolute text-center text-white left-[50%] top-[60%] -translate-x-[50%] -translate-y-[50%] text-xl md:text-2xl lg:text-3xl xl:text-4xl font-bold w-full z-10'>
        ABOUT GROWIN TRAVEL INDONESIA</h1>
    <span class="absolute inset-0 bg-black/20"></span>
</div>


@section('container')
    <div class="px-4 md:px-0">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-8">
            @if ($data !== null)
                <div class='mb-9 mt-10'>
                    {!! $data->isi !!}
                </div>

                <div class=" mt-10">
                    <img src="{{ asset('about/' . $data->image) }}" alt="" class="object-cover h-full w-full">
                </div>
            @endif

        </div>
        <h1 class="font-semibold text-xl md:text-2xl lg:text-3xl xl:text-4xl text-center mt-8">Our team lineup</h1>
        <!-- component -->
        <div class="flex flex-wrap mt-6 justify-between">




<<<<<<< HEAD


=======
>>>>>>> 3f432bf1a8c679df0d4c4e7ed523e2a5d8ab63c0
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach ($team as $user)
                    <div class="relative overflow-hidden rounded-lg shadow-lg cursor-pointer bg-[#FF2E00]"
                        onclick="view_team_{{ $user->id }}.showModal()">
                        <img class="object-cover w-full h-64" src="{{ asset('image/' . $user->image) }}"
                            alt="Flower and sky" />

                        <span class="z-10 absolute bg-gradient-to-t from-black to-white/0 inset-0 h-64 top-20"></span>

                        <div class="absolute left-[50%] -translate-x-[50%] bottom-1 z-20 w-full"
                            data-modal-target="popup-modal" data-modal-toggle="popup-modal">
                            <h4 class=" text-base md:text-xl lg:text-2xl text-center font-semibold text-white">
                                {{ $user->nama }}</h4>
                            <p class="text-sm md:text-lg text-center text-gray-100 ">{{ $user->jabatan }}</p>

                        </div>

                    </div>
                @endforeach


            </div>


        </div>




        <div id="popup-modal" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
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
                        <h3 class="text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete
                            this
                            product?</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@foreach ($team as $view)
    <!-- Open the modal using ID.showModal() method -->
    <dialog id="view_team_{{ $view->id }}" class="modal modal-bottom sm:modal-middle">
        <div class="px-4 py-10">
            <form method="dialog" class="modal-box bg-white">
                <img src="{{ asset('image/' . $view->image) }}" alt="" class="w-full h-80 object-cover">
                <h1 class="pt-4 font-bold capitalize text-3xl">{{ $view->nama }}</h1>
                <h1 class="font-semibold">{{ $view->jabatan }}</h1>
                <p class="py-2 text-justify">{{ $view->profile }}</p>
                <div class="modal-action">
                    <!-- if there is a button in form, it will close the modal -->
                    <button class="btn bg-red">Close</button>
                </div>
            </form>
        </div>
    </dialog>
@endforeach
