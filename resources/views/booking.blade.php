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
              @if (session('success'))

            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-200 dark:bg-gray-800 dark:text-green-400" role="alert">
              {{ session('success') }}
            </div>
              @endif

        <h1 class="py-2 text-2xl font-semibold">Booking</h1>
      </div>
      <hr class="mt-4 mb-8" />

      <div class="container px-5 mx-auto">
        <div class="grid grid-cols-2 gap-8">
  
          @foreach ($data as $tagihan)

              
          <div class="p-4 w-full hover:scale-105 duration-500 shadow-best5">
            <div class=" flex items-center  justify-between p-4  rounded-lg bg-white shadow-indigo-50 shadow-md">
              <div>
                
                <h2 class="text-gray-900 text-lg font-bold">{{ $tagihan->wisata->nama_wisata }}</h2>
                <h3 class="mt-2 text-xl font-bold text-orange-500 text-left">Rp. {{ $tagihan->amount }}</h3>
                
                
                <div class="flex justify-between mt-2 gap-4">
                  <div class="text-xs">
                    <h1 class="font-semibold">Departure</h1>
                    <h1 class="font-semibold">Tour Type</h1>
                    <h1 class="font-semibold">Status</h1>
                  </div>
                  <div class="text-xs">
                    <h1 class="font-semibold">:</h1>
                    <h1 class="font-semibold">:</h1>
                    <h1 class="font-semibold">:</h1>
                  </div>
                  <div class="text-xs">
                    <h1 class="text-xs">{{ \Carbon\Carbon::parse($tagihan->wisata->tanggal)->format('d-F-Y, h:i') }}</h1>
                    <h1 class="text-xs">{{ $tagihan->wisata->tour_type }}</h1>
                    <h1 class="text-xs font-semibold text-yellow-400">{{ $tagihan->payment_status }}</h1>
                  </div>
                </div>
                
                <a href="/cobadownload/{{ $tagihan->doc_no }}" target="_blank" class="text-sm mt-6 px-4 py-2 bg-orange-600  text-white rounded-lg  inline-block tracking-wider hover:bg-orange-700 outline-none font-bold">Look Ticket</a>

                {{-- <a href="/comment/{{ $tagihan->doc_no }}" target="_blank" class="text-sm mt-6 px-4 py-2 bg-orange-600  text-white rounded-lg  inline-block tracking-wider hover:bg-orange-700 outline-none">Comment</a> --}}
                @if($tagihan->comment === 0)
                <!-- Modal toggle -->
                <h1 data-modal-target="defaultModal-{{ $tagihan->doc_no }}" data-modal-toggle="defaultModal-{{ $tagihan->doc_no }}" class="text-white bg-orange-600 hover:bg-orange-700 text-sm mt-6 px-4 py-2 rounded-lg  inline-block tracking-wider font-bold outline-none">
                  Comment
                </h1>
                @endif


              </div>
  
  
            </div>
    
          </div>
          
          @endforeach
          
          
        </div>
      
      
    </div>

  </div>
</div>
@endsection

@foreach ($data as $modal)
  



<!-- Modal toggle -->


<!-- Main modal -->
<div id="defaultModal-{{ $modal->doc_no }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
    <div class="relative w-full h-full max-w-2xl md:h-auto">
        <!-- Modal content -->
        <form class="relative bg-white rounded-lg shadow dark:bg-gray-700" action="/comment/{{ $modal->doc_no }}" method="post">
          @csrf

            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                  Write Your Reviews Here
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal-{{ $modal->doc_no }}">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <!-- Modal body -->
            <div class="p-6 space-y-6" >
              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Reviews About This Tour</label>
              <textarea name="testi" id="" cols="30" rows="10" class="w-full"></textarea>
            </div>

            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
              <button data-modal-hide="defaultModal-{{ $modal->doc_no }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600" >Cancel</button>

                <button type="submit" class="text-white bg-orange-600 hover:bg-orange-700 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">Send</button>
            </div>

          </form>
    </div>
</div>


@endforeach
