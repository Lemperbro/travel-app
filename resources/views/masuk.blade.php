
@extends('layouts.two')


@section('container')


<img src="{{ asset('img/bg-login.jpg') }}" alt="" class="absolute inset-0 -z-20 h-screen w-full">
<div class="backdrop-blur-[2px] absolute inset-0 -z-10"></div>

    <form method="post" action="/login" class='w-[50%] mx-auto  mt-48 py-10 bg-white rounded-lg'>
      @csrf
      <img src="/gambar/logo.png" class='w-48 mx-auto mb-4' />



      <h1 class='text-4xl font-bold text-center mt-4 mb-8'>Sign in to your account</h1>

      <div class='mx-9  '>

        @if (session()->has('success'))
          
        <div class="alert bg-green-400 rounded-lg py-5 px-6 mb-8 text-base text-white inline-flex items-center w-full alert-dismissible fade show " role="alert">
          <strong class="mr-1">{{ session('success') }}</strong> 
          <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-yellow-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session()->has('LoginError'))
          
        <div class="alert bg-red-400 rounded-lg py-5 px-6 mb-8 text-base text-white inline-flex items-center w-full alert-dismissible fade show " role="alert">
          <strong class="mr-1">{{ session('LoginError') }}</strong> 
          <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-yellow-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif


        <div class="w-full">
        <h1 class='text-xl font-normal'>Email</h1>
        <input type="email" placeholder='Andhi@gmail.com' name="email" class='rounded-md w-full border h-12 p-2 mt-2' />
        </div>
        <div class="w-full mt-8">
          <div class='flex justify-between'>

          <h1 class='text-xl font-normal'>Password</h1>
          <a href="" class='text-red-600'> forgot Password?</a>
          </div>
        <input type="password" placeholder='Password' name="password" class='rounded-md w-full border h-12 p-2 mt-2' />
      </div>
      </div>

      <div class="flex justify-center my-7">
        <button type="submit"  class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150">Masuk</button>
      </div>


      <div class="py-12 text-center">
        <p class="whitespace-nowrap text-gray-600">
          Don't have an account?
          <a href="/register" class="underline-offset-4 font-semibold text-orange-600 underline">Sign up for free.</a>
        </p>
      </div>

    </form>


    
  </div>

  @endsection