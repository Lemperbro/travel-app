@extends('layouts.main')

@section('container')
<div class="mx-4 min-h-screen w-full sm:mx-8 xl:mx-auto">
  <h1 class="border-b pb-2 text-4xl font-semibold">Settings</h1>

  <div class="grid grid-cols-8 pt-3 sm:grid-cols-10">

    <div class="relative my-4 w-56 sm:hidden">
      {{-- <input class="peer hidden" type="checkbox" name="select-1" id="select-1" />
      <label for="select-1" class="flex w-full cursor-pointer select-none rounded-lg border p-2 px-3 text-sm text-gray-700 ring-blue-700 peer-checked:ring">Accounts </label>
      <svg xmlns="http://www.w3.org/2000/svg" class="pointer-events-none absolute right-0 top-3 ml-auto mr-5 h-4 text-slate-700 transition peer-checked:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
      </svg>
      
      <ul class="max-h-0 select-none flex-col overflow-hidden rounded-b-lg shadow-md transition-all duration-300 peer-checked:max-h-56 peer-checked:py-3">
        <li class="cursor-pointer px-3 py-2 text-sm text-slate-600 hover:bg-blue-700 hover:text-white">Accounts</li>
        <li class="cursor-pointer px-3 py-2 text-sm text-slate-600 hover:bg-blue-700 hover:text-white">Team</li>
        <li class="cursor-pointer px-3 py-2 text-sm text-slate-600 hover:bg-blue-700 hover:text-white">Others</li>
      </ul> --}}

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
        <h1 class="py-2 text-2xl font-semibold">Account settings</h1>
        <!-- <p class="font- text-slate-600">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p> -->
      </div>
      <hr class="mt-4 mb-8" />

      <form method="post" action="/profile/update" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col mx-auto my-4 justify-center gap-y-4 mb-4">
            <input type="file" name="image" class=" mx-auto w-[10%] rounded-md">
            <label for="image" class="text-center font-semibold">Change Profile Image</label>
        </div>

        <div class="grid grid-cols-2 gap-8">
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" class="w-full h-10 rounded-md mt-2" value="{{ $data->username }}">
            </div>
            <div>
                <label for="email">Email</label>
                <input type="text" name="email" class="w-full h-10 rounded-md mt-2" value="{{ $data->email }}">
            </div>
            <div>
                <label for="no_tlpn">No Telephone</label>
                <input type="text" name="no_tlpn" class="w-full h-10 rounded-md mt-2" value="{{ $data->no_tlpn }}">
            </div>
            <div>
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" class="w-full h-10 rounded-md mt-2" value="{{ $data->alamat }}">
            </div>
        </div>

        <button type="submit" class="bg-orange-600 text-white p-2 rounded-md mt-8">Simpan</button>

      </form>
      
      
    </div>

  </div>
</div>
@endsection