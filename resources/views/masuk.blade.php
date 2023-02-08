
@extends('layouts.two')


@section('container')

<div class="bg-gradient-to-bl from-pink-600/50 to-blue-600/50 fixed inset-0 -z-50 backdrop-blur-md"></div>
<div class='my-10 flex min-h-100vh gap-x-4 m-auto  shadow-best4 bg-white'>

    <form method="post" action="/login" class='w-[50%] mx-auto py-10'>
      @csrf
      <img src="/gambar/logo.png" class='w-48 mx-auto mb-4' />



      <h1 class='text-4xl font-bold text-center mt-4 mb-8'>Log in</h1>

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
        <div class="w-full mt-4">
          <div class='flex justify-between'>

          <h1 class='text-xl font-normal'>Password</h1>
          <a href="" class='text-orange-600'> forgot Password?</a>
          </div>
        <input type="password" placeholder='Password' name="password" class='rounded-md w-full border h-12 p-2 mt-2' />
      </div>
      </div>

      <div class="flex justify-center my-7">
        <button type="submit"  class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150">Masuk</button>
      </div>
    </form>
    
    <div class='w-[50%]'>

    <img src='/img/pp.jpg' class='w-full h-full object-cover'/>  


    </div>  
    
  </div>

  @endsection