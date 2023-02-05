@extends('layouts.two')


@section('container')
<div class="bg-gradient-to-bl from-orange-600/40 to-blue-600/40 absolute inset-0 -z-50"></div>
<div class='my-10 flex min-h-100vh gap-x-4 mx-auto  shadow-best4 bg-white'>

    <div class='w-[50%] mx-auto py-32'>

      <img src="/img/logo.png" class='w-32 mx-auto' />

      <h1 class='text-4xl font-bold text-center mt-4'>Log in</h1>

      <div class='mx-9  '>

        <div class="w-full">
        <h1 class='text-xl font-normal'>Email</h1>
        <input type="email" placeholder='Andhi@gmail.com' class='rounded-md w-full border h-12 p-2 mt-2' />
      </div>

        <div class="w-full mt-4">
          <div class='flex justify-between'>

          <h1 class='text-xl font-normal'>Password</h1>
          <h1 class='opacity-40'> forgot Password?</h1>
          </div>
        <input type="password" placeholder='Password' class='rounded-md w-full border h-12 p-2 mt-2' />
      </div>
      </div>

      <div class="flex justify-center my-7">
        <button type="button"  class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150">Masuk</button>
      </div>
    </div>
    <div class='w-[50%]'>
    <img src='/img/pp.jpg' class='w-full h-full object-cover'/>  
    </div>  
    
  </div>

  @endsection