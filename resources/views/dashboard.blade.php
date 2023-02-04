@extends('layouts.main')


@section('container')
<div class="grid grid-cols-3 mx-auto">

@foreach ($coba as $data)    

    <div class="shadow-md p-2 h-96 overflow-hidden">
        <img src="{{ asset('storage/'.$data->image) }}" alt="" class="w-[300px] object-cover">
        <h1 class="font-semibold text-xl mt-4">{{ $data->nama_wisata }}</h1>
        <p class="mt-4">{{ $data->deskripsi }}</p>
    </div>

@endforeach

</div>

@endsection