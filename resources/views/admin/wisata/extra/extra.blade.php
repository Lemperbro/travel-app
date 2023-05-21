@extends('admin.layouts.main')

@section('container')

<div class="px-4 py-6">
    <h1 class="text-gray-900 dark:text-white text-2xl font-semibold">Extra</h1>



    <a href="/extra/add/{{ $id }}" class="text-white font-semibold p-2 rounded-md bg-orange-700 mt-5 inline-block">Add Extra</a>

    <div class="grid grid-cols-3 gap-4 mt-10">

@foreach ($datas as $data)
    
<div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
    <img class="object-cover w-full rounded-t-lg h-96 md:h-full md:w-[35%] md:rounded-none md:rounded-l-lg" src="{{ asset('image/'.$data->image) }}" alt="">
    <div class="flex flex-col justify-between p-4 leading-normal w-[65%]">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $data->judul }}</h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $data->deskripsi }}</p>

            <div class="flex gap-x-2">
                <form action="/extra/edit_redirect/{{ $data->id }}" method="POST">
                    @csrf
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-green-400" style="transform: ;msFilter:;"><path d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z"></path><path d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z"></path></svg>
                </button>
            </form>
            
                <form action="/extra/delete/{{ $data->id }}" method="POST">
                    @csrf
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-red-500" style="transform: ;msFilter:;"><path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z"></path></svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endforeach


    

        

    </div>


    
</div>
@endsection
