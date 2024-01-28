@extends('layouts.two')


{{-- @section('container')
    <img src="{{ asset('img/bg-login.jpg') }}" alt="" class="absolute inset-0 -z-20 h-screen w-full">
    <div class="backdrop-blur-[2px] absolute inset-0 -z-10"></div>

    <div class='mt-4 lg:flex  gap-x-4 mx-auto  shadow-best4 bg-white'>

        <form class='w-full lg:w-[50%] mx-auto py-8' action="/register" method="post">
            @csrf
            <img src="/img/logo.png" class='w-48 mx-auto ' />

            <h1 class='text-4xl font-bold text-center mt-4'>Register</h1>

            <div class='w-full mx-4 lg:mx-9'>


                <div class="w-full">
                    <h1 class='text-xl font-normal '>Username</h1>
                    <input type="text" placeholder='Andhi Satria' name="username"
                        class='rounded-md w-full border h-12 p-2 mt-2 @error('username')
            peer
          @enderror'
                        value="{{ old('username') }}" />
                    @error('username')
                        <p class="peer-invalid:visible text-red-700 font-light">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <div class="w-full mt-4">
                    <h1 class='text-xl font-normal'>Email</h1>
                    <input type="email" placeholder='Andhi@gmail.com' name="email"
                        class='rounded-md w-full border h-12 p-2 mt-2 @error('email')
          peer
        @enderror'
                        value="{{ old('email') }}" />
                    @error('email')
                        <p class="peer-invalid:visible text-red-700 font-light">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <div class="w-full mt-4">
                    <h1 class='text-xl font-normal'>Password</h1>
                    <input type="password" placeholder='Password' name="password"
                        class='rounded-md w-full border h-12 p-2 mt-2 @error('password')
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
                    <input type="password" placeholder='Password' name="password_confirmation"
                        class='rounded-md w-full border h-12 p-2 mt-2 @error('password')
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
                    <input type="number" placeholder='No Telephone' name="no_tlpn"
                        class='rounded-md w-full border h-12 p-2 mt-2 @error('no_tlpn')
        peer
      @enderror'
                        value="{{ old('no_tlpn') }}" />
                    @error('no_tlpn')
                        <p class="peer-invalid:visible text-red-700 font-light">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="w-full mt-4">
                    <h1 class='text-xl font-normal'>Alamat</h1>
                    <input type="text" placeholder='Alamat' name="alamat"
                        class='rounded-md w-full border h-12 p-2 mt-2 @error('alamat')
      peer
    @enderror'
                        value="{{ old('alamat') }}" />
                    @error('alamat')
                        <p class="peer-invalid:visible text-red-700 font-light">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex justify-center my-7">
                    <button type="submit"
                        class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150">Masuk</button>
                </div>

                <p>already have an account?<a href="/login" class="text-red-600 font-semibold"> Login</a></p>

        </form>


    </div>
    <div class='w-[50%]'>
        <img src='/img/pp.jpg' class='w-full h-full object-cover' />
    </div>

    </div>
@endsection --}}

<div class="lg:h-screen bg-indigo-100 flex justify-center items-center">
    <div class="lg:w-2/5 md:w-1/2 w-[90%] my-5">
        <form class="bg-white p-10 rounded-lg shadow-lg min-w-full" action="/register" method="post">
            @csrf
            <img src="/img/logo.png" class='w-40 mx-auto mb-6' />
            <h1 class="text-center text-2xl mb-6 text-gray-600 font-bold font-sans">Form Register</h1>
            <div>
                <label class="text-gray-800 font-semibold block my-3 text-md" for="username">Username</label>
                <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none  @error('username') peer @enderror" value="{{ old('username') }}" type="text" name="username" id="username" placeholder="username" />
                @error('username')
                    <p class="peer-invalid:visible text-red-700 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div>
                <label class="text-gray-800 font-semibold block my-3 text-md" for="email">Email</label>
                <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none @error('email') peer @enderror"
                    value="{{ old('email') }}" type="email" name="email" id="email" placeholder="@email" />
                @error('email')
                    <p class="peer-invalid:visible text-red-700 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div>
                <label class="text-gray-800 font-semibold block my-3 text-md" for="password">Password</label>
                <input
                    class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none @error('password') peer @enderror"
                    type="password" name="password" id="password" placeholder="password" />
                @error('password')
                    <p class="peer-invalid:visible text-red-700 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div>
                <label class="text-gray-800 font-semibold block my-3 text-md" for="confirm">Confirm password</label>
                <input
                    class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none @error('password') peer @enderror"
                    type="password" name="password_confirmation" id="confirm" placeholder="confirm password" />
                @error('password')
                    <p class="peer-invalid:visible text-red-700 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div>
                <label class="text-gray-800 font-semibold block my-3 text-md" for="confirm">Number Phone</label>
                <input
                    class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none @error('no_tlpn') peer @enderror"
                    value="{{ old('no_tlpn') }}" type="number" name="no_tlpn" id="no_tlpn"
                    placeholder="08......" />
            </div>
            <div>
                <label class="text-gray-800 font-semibold block my-3 text-md" for="confirm">Address</label>
                <input
                    class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none @error('alamat') peer @enderror"
                    value="{{ old('alamat') }}" type="text" name="alamat" id="alamat"
                    placeholder="Jl......" />
            </div>

            <button type="submit"
                class="w-full mt-6 bg-indigo-600 rounded-lg px-4 py-2 text-lg text-white tracking-wide font-semibold font-sans">Register</button>
            <h1 class="text-center font-semibold my-4">OR</h1>
            <a href="/login"
                class=" inline-block text-center w-full  mb-3 bg-indigo-100 rounded-lg px-4 py-2 text-lg text-gray-800 tracking-wide font-semibold font-sans">Login</a>
        </form>
    </div>
</div>
