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
        <h1 class="py-2 text-2xl font-semibold">Change Password</h1>
        <!-- <p class="font- text-slate-600">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p> -->
      </div>
      <hr class="mt-4 mb-8" />

      <form method="post" action="/profile/change-password" enctype="multipart/form-data">
        @csrf


        <div class="grid grid-cols-2 gap-8">
            <div>
                <label for="current_password">Current Password</label>
                <input type="password" name="current_password" class="w-full h-10 rounded-md mt-2">
            </div>
            <div>
                <label for="password">New Password</label>
                <input type="password" name="password" class="w-full h-10 rounded-md mt-2">
            </div>
            <div>
                <label for="password_confirmation">Konfimation Password</label>
                <input type="password" name="password_confirmation" class="w-full h-10 rounded-md mt-2" >
            </div>

        </div>

        <button type="submit" class="bg-orange-600 text-white p-2 rounded-md mt-8">Simpan</button>

      </form>
      
      
    </div>

  </div>
</div>
@endsection