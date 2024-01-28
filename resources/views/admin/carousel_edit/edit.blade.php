@extends('admin.layouts.main')

@section('container')
    <div class="px-4 py-8">
        <h1 class="text-gray-900 dark:text-white font-semibold text-2xl">Edit Carousel </h1>

        <div class="rounded-lg relative w-[100%] sm:w-[85%] lg:w-[60%] xl:w-[35%] mx-auto mt-2">
            <img src="{{ asset('carousel/img/' . $data['image']) }}" alt="" id="view_image" class="w-full h-[380px] rounded-lg object-cover" >
            <div class="absolute inset-0 bg-black/50">
                <h1
                    id="text_view" class="top-[50%] -translate-y-[50%] left-[50%] -translate-x-[50%] absolute text-white font-semibold text-center text-2xl w-full px-4">
                    {{ $data['text'] }}</h1>
            </div>
        </div>

        <form action="/carousels/edit/{{ $index }}" method="POST" class="mt-8 w-[100%] sm:w-[80%] md:w-[70%] lg:w-[60%] mx-auto" enctype="multipart/form-data">
            @csrf
            <div class="flex justify-center">
                <label for="image" class="bg-gray-600 p-2 rounded-md text-white inline-block ">Choose Image</label>
                <input type="file" id="image" name="image" class="hidden">
            </div>
            <div class="mt-4">
                <label for="text" class="text-gray-900 dark:text-white">Input Text</label>
                <textarea type="text" id="text" name="text" class="rounded-md h-20 w-full bg-gray-200 dark:bg-gray-800 mt-2 dark:text-white text-gray-900">
                    {{ $data['text'] }}
                    </textarea>
            </div>
            <div class="flex flex-wrap gap-4 justify-between mt-4">
                <div class="flex gap-x-2">
                    <a href="/carousels" class="bg-red-600 text-white p-2 rounded-md">Cancel</a>
                    <button type="submit" class="bg-lime-600 text-white p-2 rounded-md">Save</button>
                </div>
                <button type="button" class="bg-gray-600 text-white p-2 rounded-md" onclick="see_carousel()">See Results</button>
            </div>
        </form>

    </div>
@endsection
