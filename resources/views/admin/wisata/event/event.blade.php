@extends('admin.layouts.main')

@section('container')

<div class="px-4 py-6">
    <h1 class="text-gray-900 dark:text-white text-2xl font-semibold">Event</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 mt-10">


            
        <a href="/event/edit/{{ $id }}/min_jumlah" class="rounded-lg border-[1px] border-gray-400 p-2 bg-gray-700 cursor-pointer">
            @if ($datas->where('tipe', 'min_jumlah')->count() == null)
            <div class="">
                <h1 class="text-gray-900 dark:text-white text-center mb-5 font-semibold">Tipe Event <span class="italic">Minimal Jumlah Pembelian</span> </h1>
                    
                <h1 class="text-orange-500 font-semibold text-3xl text-center">Potongan 50%, Minimal Pembelian 10 </h1>
                
                
                <h1 class="text-white font-semibold p-2 bg-green-500 rounded-md flex justify-center my-4 m-auto">Klik Disini Untuk Mengatur Potongan Harga</h1>
                
            </div>
            @elseif ($datas->where('tipe', 'min_jumlah')->count() !== null)
            <h1 class="text-gray-900 dark:text-white text-center mb-5 font-semibold">Tipe Event <span class="italic">Minimal Jumlah Pembelian</span> </h1>

            <h1 class="text-orange-500 font-semibold text-3xl text-center">{{ $min_jumlah->judul }}</h1>
            @if ($min_jumlah->status == false)
                
            <form action="/event/aktif/{{ $min_jumlah->wisata_id }}/{{ $min_jumlah->tipe }}" method="POST" class="">
                @csrf
                <button type="submit" class="text-white font-semibold p-2 bg-green-500 rounded-md flex justify-center my-2 m-auto">Aktifkan</button>
                
            </form>

            @elseif ($min_jumlah->status == true)
            <form action="/event/nonaktif/{{ $min_jumlah->wisata_id }}/{{ $min_jumlah->tipe }}" method="POST" class="">
                @csrf
                <button type="submit" class="text-white font-semibold p-2 bg-red-500 rounded-md flex justify-center my-2 m-auto">Nonaktifkan</button>
                
            </form>
            @endif

            @endif
            
        </a>

        <a href="/event/edit/{{ $id }}/min_harga" class="rounded-lg border-[1px] border-gray-400 p-2 bg-gray-700 cursor-pointer">
            @if ($datas->where('tipe', 'min_harga')->count() == null)

            <div class="">
                <h1 class="text-gray-900 dark:text-white text-center mb-5 font-semibold">Tipe Event <span class="italic">Minimal Harga Pembelian</span> </h1>
                <h1 class="text-orange-500 font-semibold text-3xl text-center">Potongan 50%, Minimal Pembelian Rp. 100.000 </h1>
                

                <h1 class="text-white font-semibold p-2 bg-green-500 rounded-md flex justify-center my-4 m-auto">Klik Disini Untuk Mengatur Potongan Harga</h1>
                
            </div>
            @elseif($datas->where('tipe', 'min_harga')->count() !== null)

            <h1 class="text-gray-900 dark:text-white text-center mb-5 font-semibold">Tipe Event <span class="italic">Minimal Harga Pembelian</span> </h1>

            <h1 class="text-orange-500 font-semibold text-3xl text-center">{{ $min_harga->judul }}</h1>
            @if ($min_harga->status == false)
                
            <form action="/event/aktif/{{ $min_harga->wisata_id }}/{{ $min_harga->tipe }}" method="POST" class="">
                @csrf
                <button type="submit" class="text-white font-semibold p-2 bg-green-500 rounded-md flex justify-center my-2 m-auto">Aktifkan</button>
                
            </form>

            @elseif ($min_harga->status == true)
            <form action="/event/nonaktif/{{ $min_harga->wisata_id }}/{{ $min_harga->tipe }}" method="POST" class="">
                @csrf
                <button type="submit" class="text-white font-semibold p-2 bg-red-500 rounded-md flex justify-center my-2 m-auto">Nonaktifkan</button>
                
            </form>
            @endif

            @endif
            
        </a>


        <a href="/event/edit/{{ $id }}/aktif" class="rounded-lg border-[1px] border-gray-400 p-2 bg-gray-700 cursor-pointer">
            @if ($datas->where('tipe', 'aktif')->count() == null)

            <div class="">
                <h1 class="text-gray-900 dark:text-white text-center mb-5 font-semibold">Tipe Event <span class="italic">Ketika Di Aktifkan</span> </h1>
                <h1 class="text-orange-500 font-semibold text-3xl text-center">Potongan 50%</h1>
                

                <h1 class="text-white font-semibold p-2 bg-green-500 rounded-md flex justify-center my-4 m-auto">Klik Disini Untuk Mengatur Potongan Harga</h1>
                
            </div>
            @elseif ($datas->where('tipe', 'aktif')->count() !== null)
            <h1 class="text-gray-900 dark:text-white text-center mb-5 font-semibold">Tipe Event <span class="italic">Ketika Di Aktifkan</span> </h1>

            <h1 class="text-orange-500 font-semibold text-3xl text-center">{{ $aktif->judul }}</h1>

            @if ($aktif->status == false)
                
            <form action="/event/aktif/{{ $aktif->wisata_id }}/{{ $aktif->tipe }}" method="POST" class="">
                @csrf
                <button type="submit" class="text-white font-semibold p-2 bg-green-500 rounded-md flex justify-center my-2 m-auto">Aktifkan</button>
                
            </form>

            @elseif ($aktif->status == true)
            <form action="/event/nonaktif/{{ $aktif->wisata_id }}/{{ $aktif->tipe }}" method="POST" class="">
                @csrf
                <button type="submit" class="text-white font-semibold p-2 bg-red-500 rounded-md flex justify-center my-2 m-auto">Nonaktifkan</button>
                
            </form>
            @endif

            @endif            
        </a>

        
        
        
        
    </div>
    
    
    
</div>
@endsection
