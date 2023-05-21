@extends('admin.layouts.main')

@section('container')

<div class="px-4 py-6">
    
    <form action="/event/edit/{{ $id }}/{{ $tipe }}" method="POST" class="mx-10">
        @csrf
        <h1 class="text-gray-900 dark:text-white text-2xl font-semibold mt-4 mb-10">Edit Event</h1>
        <div>
            <label for="judul" class="text-gray-900 dark:text-white mb-2">Judul</label>
            <input type="text" name="judul" id="judul" class="w-full p-2 rounded-md bg-gray-300 dark:bg-gray-700 text-gray-900 dark:text-white" @if ($data !== null)
                value="{{ $data->judul }}"
            @endif>
        </div>
        @if ($tipe == 'min_harga')
            
        <div class="mt-4">
            <label for="min_harga" class="text-gray-900 dark:text-white mb-2">Min Harga</label>
            <input type="number" name="min_harga" id="min_harga" class="w-full p-2 rounded-md bg-gray-300 dark:bg-gray-700 text-gray-900 dark:text-white" @if ($data !== null)
            value="{{ $data->min_harga }}"
        @endif>
        </div>
        @elseif ($tipe == 'min_jumlah')
        <div class="mt-4">
            <label for="min_jumlah" class="text-gray-900 dark:text-white mb-2">Min Jumlah</label>
            <input type="number" name="min_jumlah" id="min_jumlah" class="w-full p-2 rounded-md bg-gray-300 dark:bg-gray-700 text-gray-900 dark:text-white" @if ($data !== null)
            value="{{ $data->min_jumlah }}"
        @endif>
        </div>
        @endif
        <div class="mt-4">
            <label for="potongan" class="text-gray-900 dark:text-white mb-2">Potongan</label>
            <input type="text" name="potongan" id="potongan" class="w-full p-2 rounded-md bg-gray-300 dark:bg-gray-700 text-gray-900 dark:text-white" @if ($data !== null)
            value="{{ $data->potongan }}"
        @endif>
        </div>

        <button type="submit" class="text-white font-semibold py-2 px-4 bg-green-500 mt-10 rounded-md">
            Save
        </button>
    </form>

    
</div>
@endsection
