@extends('layouts.two')


@section('container')
    <img src="{{ asset('img/bg-login.jpg') }}" alt="" class="absolute inset-0 -z-20 h-screen w-full">
    <div class="backdrop-blur-[2px] absolute inset-0 -z-10"></div>

    <form method="post" action="{{ route('password.update') }}"
        class='w-[90%] md:w-[80%] lg:w-[60%] xl:w-[50%] mx-auto  mt-48 py-10 bg-white rounded-lg'>
        @csrf
        <img src="/gambar/logo.png" class='w-32 md:w-48 mx-auto mb-4' />



        <h1 class='text-2xl md:text-3xl xl:text-4xl font-bold text-center mt-4 mb-8 capitalize'>enter new password</h1>


        <div class='mx-4 md:mx-9  '>

          @if ($errors->any())
          <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
              <ul class="px-5">
                  @foreach ($errors->all() as $error)
                      <li class="list-disc">{{ $error }}</li>
                  @endforeach
              </ul>
            </div>
          @endif

            @if (session()->has('error'))
            <div class="alert bg-red-400 rounded-lg py-5 px-6 mb-8 text-base text-white inline-flex items-center w-full alert-dismissible fade show "
                role="alert">
                <strong class="mr-1">{{ session('error') }}</strong>
                <button type="button"
                    class="btn-close box-content w-4 h-4 p-1 ml-auto text-yellow-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline"
                    data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif





            <input type="hidden" name="token" value="{{ request()->token }}">
            <input type="hidden" name="email" value="{{ request()->email }}">
            <div class="w-full">
                <h1 class='text-xl font-normal'>Password</h1>
                <input type="password" name="password" class='rounded-md w-full border h-12 p-2 mt-2' />
            </div>

            <div class="w-full mt-4">
                <h1 class='text-xl font-normal'>Password Confirmation</h1>
                <input type="password" name="password_confirmation" class='rounded-md w-full border h-12 p-2 mt-2' />
            </div>





            <div class="flex justify-center my-7">
                <button type="submit"
                    class="w-full inline-block px-6 py-2.5 bg-orange-600 text-white font-medium text-base leading-tight capitalize rounded-md shadow-md  transition duration-150">Save</button>
            </div>

        </div>

    </form>



    </div>
@endsection
