@extends('layouts.main')

@section('container')
<div class="mx-4 min-h-screen w-full sm:mx-8 xl:mx-auto">
  <h1 class="border-b pb-2 text-4xl font-semibold">Settings</h1>

  <div class="grid grid-cols-8 pt-3 sm:grid-cols-10">

    <div class="relative my-4 w-56 sm:hidden">


      <select name="" id="" onchange="location = this.value;">
        <option value="profile" {{ request()->is('profile') ? 'selected' : '' }}>
            <a href="">My Profile</a>
        </option>

        <option value="/change password" {{ request()->is('change password') ? 'selected' : '' }}>
            <a href="">Change Password</a>
        </option>

        <option value="/my booking" {{ request()->is('my booking') ? 'selected' : '' }}>
            <a href="">My Booking</a>
        </option>

        <option value="/Waiting for payment" {{ request()->is('Waiting for payment') ? 'selected' : '' }}>
            <a href="">Waiting for payment</a>
        </option>
      </select>
    </div>

    @include('partials.sidebarprofile')

    <div class="col-span-8 overflow-hidden rounded-xl sm:bg-gray-50 sm:px-8 sm:shadow py-10">
      <div class="pt-4">
              @if (session('success'))

            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-200 dark:bg-gray-800 dark:text-green-400" role="alert">
              {{ session('success') }}
            </div>
              @endif

        <h1 class="py-2 text-2xl font-semibold">Waiting For Payment</h1>
      </div>
      <hr class="mt-4 mb-8" />

      <div class="container px-5 mx-auto">
        <div class="grid grid-cols-2 gap-8">
  
          @foreach ($data as $tagihan)
              
          <div class="w-full hover:scale-105 duration-500">
            <div class=" flex items-center  justify-between p-4  rounded-lg bg-white shadow-best">

              <div>
                <h2 class="text-gray-900 text-lg font-bold">{{ $tagihan->wisata->nama_wisata }} - {{ $tagihan->wisata->kota->nama_kota }}</h2>
                <h3 class="mt-2 text-xl font-bold text-orange-500 text-left">Rp. {{ $tagihan->amount }}</h3>

                <div class="flex justify-between mt-2 gap-4">
                  <div class="text-xs">
                    <h1 class="font-semibold">Departure</h1>
                    <h1 class="font-semibold">Tour Type</h1>
                    <h1 class="font-semibold">Status</h1>
                    <h1 class="font-semibold">Driver</h1>
                    <h1 class="font-semibold">Guide</h1>
                    <h1 class="font-semibold">Vehicle</h1>
                  </div>
                  <div class="text-xs">
                    <h1 class="font-semibold">:</h1>
                    <h1 class="font-semibold">:</h1>
                    <h1 class="font-semibold">:</h1>
                    <h1 class="font-semibold">:</h1>
                    <h1 class="font-semibold">:</h1>
                    <h1 class="font-semibold">:</h1>
                  </div>
                  <div class="text-xs">
                    <h1 class="text-xs">{{ \Carbon\Carbon::parse($tagihan->wisata->tanggal)->format('d-F-Y, h:i') }}</h1>
                    <h1 class="text-xs">{{ $tagihan->wisata->tour_type }}</h1>
                    <h1 class="text-xs font-semibold text-yellow-400">{{ $tagihan->payment_status }}</h1>
                    <h1 class="text-xs">
                      @if ($tagihan->driver == null)
                        {{ 'Waiting' }}
                      @elseif ($tagihan->driver !== null)
                        {{ $tagihan->driver->nama }}
                      @endif
                    </h1>
                    <h1 class="text-xs">
                      @if ($tagihan->guide == null)
                      {{ 'Waiting' }}
                    @elseif ($tagihan->guide !== null)
                      {{ $tagihan->guide->nama }}
                    @endif
                    </h1>
                    <h1 class="text-xs">
                      @if ($tagihan->vehicle == null)
                      {{ 'Waiting' }}
                    @elseif ($tagihan->vehicle !== null)
                      {{ $tagihan->vehicle->merek }}
                    @endif
                    </h1>
                  </div>
                </div>

                @if ($tagihan->status == 'menunggu')
                  <h1 class="bg-yellow-300 text-black font-semibold p-2 rounded-md mt-2">Waiting for confirmation from admin</h1>
                @endif

                @if ($tagihan->status == 'dikonfirmasi')
                <a href="{{ $tagihan->payment_link }}" target="_blank" class="text-sm mt-6 px-4 py-2 bg-orange-600  text-white rounded-lg  inline-block tracking-wider hover:bg-orange-700 outline-none font-semibold">Pay Now</a>
                @endif


              </div>
  
  
            </div>
    
          </div>
          
          @endforeach
          
        </div>
      
      
    </div>

  </div>
</div>
@endsection