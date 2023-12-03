@extends('admin.layouts.main')

@section('container')
    <div class="px-4 py-8">
        <h1 class="text-gray-900 dark:text-white font-semibold text-2xl">Manage Carousel </h1>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 mt-4">
            @foreach ($data["carousel"] as $item)
                    <div class="rounded-lg relative">
                        <img src="{{ asset('carousel/img/' . $item["image"]) }}" alt=""
                            class="rounded-lg object-cover w-full h-[350px]">
                        <div class="absolute inset-0 bg-black/50">
                            <h1
                                class="top-[50%] -translate-y-[50%] left-[50%] -translate-x-[50%] absolute text-white font-semibold text-center text-2xl w-full px-4">
                                {{ $item["text"] }}</h1>
                        </div>
                        <a href="/carousels/edit/{{ $loop->iteration }}"
                            class="bg-lime-500 rounded-l-full absolute w-[25%] xl:w-[20%] h-12 bottom-4 right-0 z-10 flex ">
                            <span class="flex gap-x-1 m-auto justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    style="transform: ;msFilter:;" class="fill-white my-auto">
                                    <path d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z"></path>
                                    <path
                                        d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z">
                                    </path>
                                </svg>
                                <span class=" text-center font-semibold my-auto text-xl text-white">
                                    Edit
                                </span>
                            </span>

                        </a>
                    </div>
            @endforeach
        </div>

    </div>
@endsection
