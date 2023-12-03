@extends('layouts.main')

@section('container')
    <div class="min-h-screen w-full px-4 md:px-0 xl:mx-auto">
        <h1 class="border-b pb-2 text-4xl font-semibold">Settings</h1>


        <div class="relative my-8 sm:hidden ">



          <ul class="flex flex-wrap gap-x-4 w-full justify-center">
              <li class="font-semibold {{ request()->is('profile') ? 'text-orange-600' : '' }}">
                  <a href="/profile">My Profile</a>
              </li>
              <li class="font-semibold {{ request()->is('profile/change-password') ? 'text-orange-600' : '' }}">
                  <a href="/profile/change-password">Change Password</a>
              </li>
              <li class="font-semibold {{ request()->is('booking') ? 'text-orange-600' : '' }}">
                  <a href="/booking">My Booking</a>
              </li>
              <li class="font-semibold {{ request()->is('tagihan') ? 'text-orange-600' : '' }}">
                  <a href="/tagihan">Waiting For Payment</a>
              </li>
          </ul>
      </div>

        <div class="grid grid-cols-8 pt-3 sm:grid-cols-10">



            @include('partials.sidebarprofile')

            <div class="col-span-8 overflow-hidden rounded-xl sm:bg-gray-50 sm:px-8 sm:shadow py-10">
                <div class="pt-4">
                    @if (session('success'))
                        <div class="alert bg-green-200 rounded-lg py-5 px-6 mb-8 text-base text-black inline-flex items-center w-full alert-dismissible fade show "
                            role="alert">
                            <strong class="mr-1">{{ session('success') }}</strong>
                            <button type="button"
                                class="btn-close box-content w-4 h-4 p-1 ml-auto text-yellow-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline"
                                data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert bg-green-200 rounded-lg py-5 px-6 mb-8 text-base text-white inline-flex items-center w-full alert-dismissible fade show "
                            role="alert">
                            <strong class="mr-1">{{ session('error') }}</strong>
                            <button type="button"
                                class="btn-close box-content w-4 h-4 p-1 ml-auto text-yellow-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline"
                                data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <h1 class="py-2 text-2xl font-semibold">Account settings</h1>
                </div> 
                <hr class="mt-4 mb-8" />
                <form method="post" action="/profile/update" enctype="multipart/form-data" class="">
                    <img src="{{ asset('ft_user/' . $data->image) }}" alt="" id="view_image"
                        class="w-20 h-20 object-cover flex justify-center m-auto rounded-full">
                    @csrf
                    <div class="flex mx-auto my-4 justify-center  mb-4">
                        <input type="file" name="image" class=" mx-auto w-[10%] rounded-md hidden" id="image">
                        <label for="image" class="text-center font-semibold bg-black text-white p-2 rounded-md inline-block">Change Profile Image</label>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-8">
                        <div>
                            <label for="username">Username</label>
                            <input type="text" name="username" class="w-full h-10 rounded-md mt-2 "
                                value="{{ $data->username }}">
                        </div>
                        <div>
                            <label for="email">Email</label>
                            <input type="text" name="email" class="w-full h-10 rounded-md mt-2 "
                                value="{{ $data->email }}">
                        </div>
                        <div>
                            <label for="no_tlpn">No Telephone</label>
                            <input type="text" name="no_tlpn" class="w-full h-10 rounded-md mt-2 "
                                value="{{ $data->no_tlpn }}">
                        </div>
                        <div>
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="w-full h-10 rounded-md mt-2 "
                                value="{{ $data->alamat }}">
                        </div>
                    </div>

                    <button type="submit" class="bg-orange-600 text-white p-2 rounded-md mt-8">Save</button>

                </form>


            </div>

        </div>
    </div>
@endsection
