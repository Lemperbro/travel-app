@extends('layouts.main')


@section('container')



@include('partials.carousel')
<div class="grid grid-cols-3 mx-auto border justify-between w-full ">

    @foreach ($best_kota as $data)

    <a href="" class="shadow-md p-2 h-96 overflow-hidden ">
        <img src="{{ asset('storage/'.$data->image) }}" alt="" class="w-[300px] object-cover ">
        <h1 class="font-semibold text-xl mt-4 text-red-500">{{ $data->nama_kota }}</h1>
        <p>kota terbanyak di kunjungi : {{ $data->popularitas }}</p>
    </a>

    @endforeach





</div>

<div class="grid grid-cols-4">


    @foreach ($kota as $data)
        <a href="/wisata/{{ $data->id }}" class="hadow-md p-2 h-96 overflow-hidden inline-block">
            <img src="{{ asset('storage/'.$data->image) }}" alt="">
            <h1>{{ $data->nama_kota }}</h1>
        </a>
    @endforeach
</div>

@include('partials.dropdowntext')
<div class="grid grid-cols-4">
    @foreach ($best as $data)
    <a href="/wisata/{{ $data->id }}" class="hadow-md p-2 h-96 overflow-hidden inline-block">
        <img src="{{ asset('storage/'.$data->image) }}" alt="">
        <h1>{{ $data->nama_wisata }}</h1>
        <p>di booking : {{ $data->diboking }}</p>
    </a>
@endforeach
</div>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur voluptatibus quos vel hic esse vitae laboriosam, ipsa distinctio amet est, in commodi minima maxime dolorem earum cupiditate aut ex molestias?</p>

@endsection