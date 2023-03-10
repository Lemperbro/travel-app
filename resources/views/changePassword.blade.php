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

        @if (session('successChangePassword'))
        <div class="alert bg-green-200 rounded-lg py-5 px-6 mb-8 text-base text-black inline-flex items-center w-full alert-dismissible fade show " role="alert">
          <strong class="mr-1">{{ session('successChangePassword') }}</strong> 
          <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-yellow-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
          @endif

        <h1 class="py-2 text-2xl font-semibold">Change Password</h1>
        <!-- <p class="font- text-slate-600">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p> -->
      </div>
      <hr class="mt-4 mb-8" />

      <form method="post" action="/profile/change-password" enctype="multipart/form-data">
        @csrf


        <div class="grid grid-cols-2 gap-8">
            <div>
                <label for="current_password">Current Password</label>

                <div class="relative flex">
                <input type="password" name="current_password" id="password" class="w-full h-10 rounded-md mt-2">

                <div class="absolute right-5 top-1"  onclick="ShowPassword()">


                  <svg xmlns="http://www.w3.org/2000/svg" id="eyeShow" height="48" viewBox="0 96 960 960" width="48" class="w-7"><path d="M480.118 726Q551 726 600.5 676.382q49.5-49.617 49.5-120.5Q650 485 600.382 435.5q-49.617-49.5-120.5-49.5Q409 386 359.5 435.618q-49.5 49.617-49.5 120.5Q310 627 359.618 676.5q49.617 49.5 120.5 49.5Zm-.353-58Q433 668 400.5 635.265q-32.5-32.736-32.5-79.5Q368 509 400.735 476.5q32.736-32.5 79.5-32.5Q527 444 559.5 476.735q32.5 32.736 32.5 79.5Q592 603 559.265 635.5q-32.736 32.5-79.5 32.5ZM480 856q-146 0-264-83T40 556q58-134 176-217t264-83q146 0 264 83t176 217q-58 134-176 217t-264 83Zm0-300Zm-.169 240Q601 796 702.5 730.5 804 665 857 556q-53-109-154.331-174.5-101.332-65.5-222.5-65.5Q359 316 257.5 381.5 156 447 102 556q54 109 155.331 174.5 101.332 65.5 222.5 65.5Z"/></svg>

                  <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48" class="w-7 hidden" id="eyeHidden"><path d="m629 637-44-44q26-71-27-118t-115-24l-44-44q17-11 38-16t43-5q71 0 120.5 49.5T650 556q0 22-5.5 43.5T629 637Zm129 129-40-40q49-36 85.5-80.5T857 556q-50-111-150-175.5T490 316q-42 0-86 8t-69 19l-46-47q35-16 89.5-28T485 256q143 0 261.5 81.5T920 556q-26 64-67 117t-95 93Zm58 226L648 827q-35 14-79 21.5t-89 7.5q-146 0-265-81.5T40 556q20-52 55.5-101.5T182 360L56 234l42-43 757 757-39 44ZM223 402q-37 27-71.5 71T102 556q51 111 153.5 175.5T488 796q33 0 65-4t48-12l-64-64q-11 5-27 7.5t-30 2.5q-70 0-120-49t-50-121q0-15 2.5-30t7.5-27l-97-97Zm305 142Zm-116 58Z"/></svg>


                </div>

              </div>

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