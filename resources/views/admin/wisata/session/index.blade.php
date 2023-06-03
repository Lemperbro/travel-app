@extends('admin.layouts.main')

@section('container')
<div class="px-4 py-8">
  <h1 class="text-center font-semibold text-white text-2xl mb-8">Hight Session For Bromo Year 2023</h1>
  <div class="flex gap-x-4">

    <a href="/admin/wisata/{{ $slug }}/session/add" class="text-white bg-green-600 p-2 rounded-md font-semibold">
      Add Hight Session
    </a>
    
    <form action="/admin/wisata/{{ $slug }}/session/deleteAll" method="POST">
      @csrf
      <button class="bg-red-700 text-white font-semibold p-2 rounded-md">Delete All</button>
    </form>
  </div>

  @if ($data->count() > 0)
    
  <div class="grid grid-cols-5 gap-4 my-8">

    @foreach ($data as $datas)
    <div class="text-white font-semibold bg-gray-600 rounded-md pt-6 pb-12 border text-center inline-block text-xl relative">
      {{ \Carbon\Carbon::parse($datas->startDate)->format('d/F/Y') }} - {{ \Carbon\Carbon::parse($datas->endDate)->format('d/F/Y') }}
      <div class="mt-2">
        <h1 class="text-base">Adult : Rp. {{ number_format($datas->price,0,',','.') }}</h1>
        @if ($datas->price_child !== null)
        <h1 class="text-base">Child : Rp. {{ number_format($datas->price_child,0,',','.') }}</h1>
          
        @endif
      </div>
      <form action="/admin/wisata/{{ $datas->id }}/session/delete" method="POST">
        @csrf
        <button type="submit" class="bg-red-600 p-2 rounded-md absolute bottom-2 right-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-white" style="transform: ;msFilter:;"><path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z"></path></svg>
        </button>
      </form>
    </div>
    @endforeach
    
  </div>
  @else
  <h1 class="text-gray-500 font-semibold flex m-auto text-3xl justify-center mt-10">Nothing</h1>
  @endif

</div>
@endsection