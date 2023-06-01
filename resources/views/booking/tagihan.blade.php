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
        {{-- <div class="grid grid-cols-2 gap-8">
  
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
                    <h1 class="font-semibold">Extra</h1>
                    <h1 class="font-semibold">Payment</h1>
                  </div>
                  <div class="text-xs">
                    <h1 class="font-semibold">:</h1>
                    <h1 class="font-semibold">:</h1>
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
          
          @endforeach --}}
          
        {{-- </div> --}}
      

        {{-- percobaan start --}}
        <div class="grid grid-cols-1 gap-y-4 mt-4">
          @foreach ($data as $tagihan)
            <div class="border-[2px] rounded-md w-full p-4">
              <h1 class="text-gray-600">{{ \Carbon\Carbon::parse($tagihan->created_at)->format('d F Y') }}</h1>
              <div class="flex justify-between">
                <div>
                  <h1 class="font-semibold text-xl">{{ $tagihan->wisata->nama_wisata }}</h1>
                  @if ($tagihan->status == 'menunggu')
                  <h1 class="bg-yellow-200 text-black font-semibold py-1 px-2 rounded-md mt-2">Waiting for confirmation from admin</h1>
                  @elseif ($tagihan->status == 'dikonfirmasi')
                  <h1 class="bg-yellow-200 text-black font-semibold py-1 px-2 rounded-md mt-2">Waiting for Payment</h1>
                  @endif
                </div>

                <div class="font-semibold">
                  <h1>Order Quantity</h1>
                  <h1 class="text-center">
                    @if ($tagihan->adult !== null || $tagihan->child !== null)
                      {{ $tagihan->adult + $tagihan->child }}
                      @else
                      1
                    @endif
                  </h1>
                </div>

                

              </div>

              <div class="grid grid-cols-4 gap-4 mt-4 ">

                <div class="text-left">
                  <h1 class="font-semibold">Departure</h1>
                  <h1>{{ \Carbon\Carbon::parse($tagihan->departure)->format('d F Y') }}</h1>
                </div>

                <div class="text-left">
                  <h1 class="font-semibold">Payment Type</h1>
                  <h1>
                    @if ($tagihan->dp !== null )
                      Pay Dp
                    @elseif($tagihan->dp == null)
                      Pay Full
                    @endif
                  </h1>
                </div>

                <div class="text-left">
                  <h1 class="font-semibold">Tour Type</h1>
                  <h1>
                    {{ $tagihan->wisata->tour_type }}
                  </h1>
                </div>

                <div class="text-left">
                  <h1 class="font-semibold">Driver</h1>
                  <h1>
                  @if ($tagihan->driver == null)
                    {{ 'Waiting' }}
                  @elseif ($tagihan->driver !== null)
                    {{ $tagihan->driver->nama }}
                  @endif
                  </h1>
                </div>

                <div class="text-left">
                  <h1 class="font-semibold">Guide</h1>
                  <h1>
                  @if ($tagihan->guide == null)
                    {{ 'Waiting' }}
                  @elseif ($tagihan->guide !== null)
                    {{ $tagihan->guide->nama }}
                  @endif
                  </h1>
                </div>

                <div class="text-left">
                  <h1 class="font-semibold">Vehicle</h1>
                  <h1>
                  @if ($tagihan->vehicle == null)
                    {{ 'Waiting' }}
                  @elseif ($tagihan->vehicle !== null)
                    {{ $tagihan->vehicle->merek }}
                  @endif
                  </h1>
                </div>

                @if ($tagihan->adult !== null)
                <div class="text-left">
                  <h1 class="font-semibold">Adult</h1>
                  <h1>
                    {{ $tagihan->adult }}
                  </h1>
                </div>
                @endif
                
                @if ($tagihan->child !== null)
                <div class="text-left">
                  <h1 class="font-semibold">Child</h1>
                  <h1>
                    {{ $tagihan->child }}
                  </h1>
                </div>
                @endif

              </div>

              <div class="mt-4">

                  <div class="flex">
                    <h1 class="font-semibold">Total</h1>
                    <h1 class="mx-2">:</h1>
                    <h1>Rp. {{ number_format($tagihan->amount,0,',','.') }}</h1>
                  </div>

                  @if ($tagihan->dp !== null)
                  <div class="flex">
                    <h1 class="font-semibold">Dp</h1>
                    <h1 class="ml-6 mr-2">:</h1>
                    <h1>Rp. {{ number_format($tagihan->dp,0,',','.') }}</h1>
                  </div>
                  @endif

                </div>


                <div class="flex float-right gap-x-4">

                  <form action="/booking/cancel/{{ $tagihan->doc_no }}" method="POST">
                    @csrf
                    <button type="submit" class="px-2 py-2 bg-red-600 text-white font-semibold rounded-md">Cancel</button>
                  </form>

                  @if ($tagihan->status == 'dikonfirmasi')
                  <a href="{{ $tagihan->payment_link }}" class="px-2 py-2 bg-green-600 text-white font-semibold rounded-md">
                    Pay Now
                  </a>
                  @endif
                </div>




            </div>
          @endforeach
        </div>
        {{-- percobaan end --}}


    </div>

  </div>





</div>
@endsection