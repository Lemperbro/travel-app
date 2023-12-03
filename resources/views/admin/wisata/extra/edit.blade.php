@extends('admin.layouts.main')

@section('container')

<div class="px-4 py-6">
    
    <form action="/extra/edit/{{ $data->id }}" method="POST" class="md:mx-14 lg:mx-32" enctype="multipart/form-data">
        @csrf
        <h1 class="text-gray-900 dark:text-white text-2xl font-semibold mb-10 mt-4">Edit Extra</h1>
        <div>
            <label for="image" class="text-gray-900 dark:text-white">Image</label>
            <input type="file" name="image" id="image" class="w-full  bg-gray-300 dark:bg-gray-700 rounded-md mt-2 text-gray-900 dark:text-white">
        </div>
        <div class="mt-4">
            <label for="judul" class="text-gray-900 dark:text-white ">Judul</label>
            <input type="text" name="judul" id="judul" class="w-full p-2 rounded-md bg-gray-300 dark:bg-gray-700 mt-2 text-gray-900 dark:text-white" value="{{ $data->judul }}">
        </div>
        <div class="mt-4">
            <label for="type" class="text-gray-900 dark:text-white ">Type</label>
            <select name="type" id="type" class="w-full p-2 rounded-md bg-gray-300 dark:bg-gray-700 mt-2 text-gray-900 dark:text-white" onclick="type()">
                <option value="hotel" @if($data->type == 'hotel') selected @endif>Hotel</option>
                <option value="mobil" @if($data->type == 'mobil') selected @endif>Mobil</option>
                <option value="other" @if($data->type == 'other') selected @endif>Other</option>
            </select>
        </div>
        @if ($data->type == 'hotel')
            
        <div class="mt-4" id="hotel">
            <label class="text-gray-900 dark:text-white mb-4">Add Type Hotel</label>
            @foreach ($hotel as $hotels)
                
            <div id="hotel_area" class="mt-2 mb-10">
                <input type="hidden" class="hidden" name="hotel_id[]" value="{{ $hotels->id }}">
                <div class="grid grid-cols-2 gap-x-4">
                    <div>
                        <label class="text-gray-900 dark:text-white mb-2 text-sm">Kategori Hotel</label>
                        <input type="text" name="hotel[]" value="{{ $hotels->kategori_hotel }}" class="w-full p-2 rounded-md bg-gray-300 dark:bg-gray-700 mt-2 text-gray-900 dark:text-white">
                    </div>
                    <div>
                        <label class="text-gray-900 dark:text-white mb-2 text-sm">Harga</label>
                        <input type="text" name="harga_hotel[]" value="{{ $hotels->harga }}" class="w-full p-2 rounded-md bg-gray-300 dark:bg-gray-700 mt-2 text-gray-900 dark:text-white">
                    </div>
                </div>
                <h1 class="text-white bg-red-600 w-6 h-6 rounded-md float-right mt-2 font-semibold cursor-pointer text-center" id="remove_hotel">-</h1>
            </div>
            @endforeach
            
        </div>
        <h1 class="text-white bg-green-600 w-6 h-6 rounded-md mt-8 cursor-pointer text-center " id="add_hotel">+</h1>
        @endif
        <div class="mt-4">
            <label for="deskripsi" class="text-gray-900 dark:text-white ">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="w-full p-2 rounded-md bg-gray-300 dark:bg-gray-700 mt-2 text-gray-900 dark:text-white">
                {{ $data->deskripsi }}
            </textarea>
        </div>

        
            
        <div class="mt-4 @if ($data->type == 'hotel' || $data->type == 'mobil') hidden @endif" id="harga">
            <label for="harga" class="text-gray-900 dark:text-white">Harga</label>
            <input type="number" name="harga" id="harga" class="w-full p-2 rounded-md bg-gray-300 dark:bg-gray-700 mt-2 text-gray-900 dark:text-white" value="{{ $data->harga }}">
        </div>
        

        <button type="submit" class="text-white font-semibold py-2 px-4 bg-green-500 mt-10 rounded-md">
            Save
        </button>
    </form>

    
</div>
@endsection
