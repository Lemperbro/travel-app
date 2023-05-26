@extends('layouts.main')

@section('container')
<div class="mx-4 min-h-screen w-full sm:mx-8 xl:mx-auto">
  <h1 class="border-b pb-2 text-4xl font-semibold">Settings</h1>

  <div class="grid grid-cols-8 pt-3 sm:grid-cols-10">

    <div class="relative my-4 w-56 sm:hidden">


      <select name="" id="" onchange="location = this.value;">
        <option value="profile">
            <a href="">My Profile</a>
        </option>

        <option value="/change password">
            <a href="">Change Password</a>
        </option>

        <option value="/my booking" >
            <a href="">My Booking</a>
        </option>

        <option value="/Waiting for payment">
            <a href="">Waiting for payment</a>
        </option>

        <option value="/Waiting for payment">
            <a href="">Order Histori</a>
        </option>
      </select>
    </div>

    @include('partials.sidebarprofile')

    <div class="col-span-8 overflow-hidden rounded-xl sm:bg-gray-50 sm:px-8 sm:shadow py-10">
      <div class="pt-4">


        <h1 class="py-2 text-2xl font-semibold">All Of Your Order</h1>
      </div>
      <hr class="mt-4 mb-8" />

      <div class="container px-5 mx-auto">
        <div class="grid grid-cols-2 gap-8">
  
              
          <div class="w-full hover:scale-105 duration-500">
            <div class=" flex items-center  justify-between p-4  rounded-lg bg-white shadow-best">

              <div>
                <h2 class="text-gray-900 text-lg font-bold"></h2>
                <h3 class="mt-2 text-xl font-bold text-orange-500 text-left">Bromo </h3>

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
                    <h1 class="text-xs"></h1>
                    <h1 class="text-xs"></h1>
                    <h1 class="text-xs font-semibold text-yellow-400"></h1>
                    <h1 class="text-xs">

                    </h1>
                    <h1 class="text-xs">
 
                    </h1>
                    <h1 class="text-xs">

                    </h1>
                  </div>
                </div>

                  



              </div>
  
  
            </div>
    
          </div>
          
          
        </div>
      
      
    </div>

  </div>
</div>
@endsection