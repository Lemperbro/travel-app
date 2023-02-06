@extends('layouts.two')


@section('container')
<div class="bg-gradient-to-bl from-orange-600/50 to-blue-600/50 fixed  inset-0 -z-50 backdrop-blur-md"></div>
<div class='my-10 flex min-h-100vh gap-x-4 mx-auto  shadow-best4 bg-white'>

    <form class='w-[50%] mx-auto py-8' action="/register" method="post">
      @csrf
      <img src="/img/logo.png" class='w-48 mx-auto ' />

      <h1 class='text-4xl font-bold text-center mt-4'>Register</h1>

      <div class='mx-9'>

        <div class="w-full">
          <h1 class='text-xl font-normal'>Username</h1>
          <input type="text" placeholder='Andhi Satria' name="username" class='rounded-md w-full border h-12 p-2 mt-2 @error('username')
            peer
          @enderror' />
          @error('username')
            <p class="peer-invalid:visible text-red-700 font-light">
              {{ $message }}
          </p>
          @enderror

        </div>

        <div class="w-full mt-4">
        <h1 class='text-xl font-normal'>Email</h1>
        <input type="email" placeholder='Andhi@gmail.com' name="email" class='rounded-md w-full border h-12 p-2 mt-2 @error('email')
          peer
        @enderror' />
        @error('email')
        <p class="peer-invalid:visible text-red-700 font-light">
          {{ $message }}
      </p>
        @enderror
 
      </div>

        <div class="w-full mt-4">
          <h1 class='text-xl font-normal'>Password</h1>
        <input type="password" placeholder='Password' name="password" class='rounded-md w-full border h-12 p-2 mt-2 @error('password')
          peer
        @enderror' />
        @error('password')          
        <p class="peer-invalid:visible text-red-700 font-light">
          {{ $message }}
      </p>
      @enderror

      </div>

      <div class="w-full mt-4">
        <h1 class='text-xl font-normal'>Confirm Password</h1>
      <input type="password" placeholder='Password' name="confirm" class='rounded-md w-full border h-12 p-2 mt-2 @error('password')
        peer
      @enderror' />
      @error('password')
      <p class="peer-invalid:visible text-red-700 font-light">
        {{ $message }}
    </p>
      @enderror

    </div>

      <div class="w-full mt-4">
        <h1 class='text-xl font-normal'>No Telephone</h1>
      <input type="number" placeholder='No Telephone' name="no_tlpn" class='rounded-md w-full border h-12 p-2 mt-2 @error('no_tlpn')
        peer
      @enderror' />
      @error('no_tlpn')
      <p class="peer-invalid:visible text-red-700 font-light">
        {{ $message }}
    </p>
      @enderror
    </div>

    <div class="w-full mt-4">
      <h1 class='text-xl font-normal'>Alamat</h1>
    <input type="text" placeholder='Alamat' name="alamat" class='rounded-md w-full border h-12 p-2 mt-2 @error('alamat')
      peer
    @enderror' />
    @error('alamat')
    <p class="peer-invalid:visible text-red-700 font-light">
      {{ $message }}
  </p>
    @enderror
  </div>

  <div class="flex justify-center my-7">
    <button type="submit" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150">Masuk</button>
  </div>

  <p>already have an account?<a href="" class="text-blue-600"> Login</a></p>

</form>


    </div>
    <div class='w-[50%]'>
    <img src='/img/pp.jpg' class='w-full h-full object-cover'/>  
    </div>  
    
  </div>

  @endsection