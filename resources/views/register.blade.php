
@extends('layouts.two')


@section('container')
<img src="{{ asset('img/bg-login.jpg') }}" alt="" class="absolute inset-0 -z-20 h-screen w-full">
<div class="backdrop-blur-[2px] absolute inset-0 -z-10"></div>

<div class='mt-4 flex  gap-x-4 mx-auto  shadow-best4 bg-white'>

    <form class='w-[50%] mx-auto py-8' action="/register" method="post" enctype="multipart/form-data">
      @csrf
      <img src="/img/logo.png" class='w-48 mx-auto ' />

      <h1 class='text-4xl font-bold text-center mt-4'>Register</h1>

      <div class='mx-9'>

        <div class="w-full">
          <h1 class='text-xl font-normal'>Image</h1>
          <input type="file" name="image" class='rounded-md w-full border my-2 block @error('image')
            peer
          @enderror'  value="{{ old('image') }}"/>
          @error('image')
            <p class="peer-invalid:visible text-red-700 font-light">
              {{ $message }}
          </p>
          @enderror

        </div>

        <div class="w-full">
          <h1 class='text-xl font-normal'>Username</h1>
          <input type="text" placeholder='Andhi Satria' name="username" class='rounded-md w-full border h-12 p-2 mt-2 @error('username')
            peer
          @enderror'  value="{{ old('username') }}"/>
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
        @enderror' value="{{ old('email') }}"/>
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
      <input type="password" placeholder='Password' name="password_confirmation" class='rounded-md w-full border h-12 p-2 mt-2 @error('password')
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
      @enderror' value="{{ old('no_tlpn') }}"/>
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
    @enderror' value="{{ old('alamat') }}"/>
    @error('alamat')
    <p class="peer-invalid:visible text-red-700 font-light">
      {{ $message }}
  </p>
    @enderror
  </div>

  <div class="flex justify-center my-7">
    <button type="submit" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150">Masuk</button>
  </div>

  <p>already have an account?<a href="/login" class="text-blue-600"> Login</a></p>

</form>


    </div>
    <div class='w-[50%]'>
    <img src='/img/pp.jpg' class='w-full h-full object-cover'/>  
    </div>  
    
  </div>

  @endsection