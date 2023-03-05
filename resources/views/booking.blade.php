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

        <h1 class="py-2 text-2xl font-semibold">Booking</h1>
        <!-- <p class="font- text-slate-600">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p> -->
      </div>
      <hr class="mt-4 mb-8" />

      <div class="container px-5 mx-auto">
        <div class="grid grid-cols-2 gap-8">
  
          @foreach ($data as $tagihan)
              
          <div class="p-4 w-full hover:scale-105 duration-500 shadow-best5">
            <div class=" flex items-center  justify-between p-4  rounded-lg bg-white shadow-indigo-50 shadow-md">
              <div>
                <h2 class="text-gray-900 text-lg font-bold">{{ $tagihan->wisata->nama_wisata }}</h2>
                <h3 class="mt-2 text-xl font-bold text-orange-500 text-left">Rp. {{ $tagihan->amount }}</h3>
                <div class="flex gap-x-4 mt-2">
                  <h1 class="font-semibold">Status  :</h1>
                  <h1 class="text-yellow-400 uppercase">{{ $tagihan->payment_status }}</h1>
                </div>
                <p class="text-sm font-semibold text-gray-400">Last Transaction</p>
                <a href="{{ $tagihan->payment_link }}" target="_blank" class="text-sm mt-6 px-4 py-2 bg-orange-400  text-white rounded-lg  inline-block tracking-wider hover:bg-orange-500 outline-none">Download Ticket</a>
              </div>
  
  
            </div>
    
          </div>
          
          @endforeach
          
          
        </div>
      
      
    </div>

  </div>
</div>
@endsection