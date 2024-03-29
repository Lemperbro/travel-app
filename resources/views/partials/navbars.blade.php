<div class='fixed z-40 w-full top-0'>

<nav class="px-2 bg-white backdrop-blur-sm border-gray-200 dark:bg-gray-900 py-2 shadow-smooth">
  <div class="container flex flex-wrap items-center justify-between mx-auto">

    <a href="#" class="flex items-center">
        <img src=" {{ asset('img/logo.png') }}" class="h-6 mr-3 sm:h-10" alt="Flowbite Logo" />
    </a>

    <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-dropdown" aria-expanded="false">

      <span class="sr-only">Open main menu</span>
      <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
    </button>

    <div class="hidden w-full md:flex md:w-auto md:gap-x-20 border border-red-600" id="navbar-dropdown">

      <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0">
        <li>
          <a href="/" class="block py-2 pl-3 pr-4 text-gray-900 font-semibold text-base rounded md:bg-transparent {{ request()->is('/') ? 'text-orange-600' : '' }}  md:p-0 uppercase" aria-current="page">Home</a>
        </li>
        <li>
            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex font-semibold text-base items-center justify-between w-full py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-orange-700 {{ request()->is('wisata/type/*') ? 'md:text-orange-600' : '' }} md:p-0 md:w-auto  md:dark:hover:bg-transparent uppercase">Type Tour <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
            <!-- Dropdown menu -->
            <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow border w-44 dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                  <li>
                    <a href="/wisata/type/{{ "private trip" }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">PRIVATE TRIP</a>
                  </li>
                  <li>
                    <a href="/wisata/type/{{ "single trip" }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">SINGLE TRIP</a>
                  </li>
                  <li>
                    <a href="/wisata/type/{{ "open trip" }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">OPEN TRIP</a>
                  </li>
                </ul>
            </div>
        </li>
        <li>
          <a href="/wisata/" class="block py-2 pl-3 pr-4 text-gray-900 font-semibold text-base rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 {{ request()->is('wisata') ? 'md:text-orange-600' : '' }} md:hover:text-orange-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent uppercase">Booking</a>
        </li>
        <li>
          <a href="/contact" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 font-semibold text-base md:hover:bg-transparent md:border-0 md:hover:text-orange-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent uppercase">Contact</a>
        </li>
      </ul>


      <div class="flex gap-x-4"> 
        
        <!-- Notifications start-->
        @if(Auth()->user())
        <button type="button" data-dropdown-toggle="notification-dropdown" class="p-2 text-gray-500 rounded-lg hover:text-gray-900 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 relative">
          <span class="sr-only">View notifications</span>
          <!-- Bell icon -->
          <div class="{{ ($count->count() > 0)? 'animate-tada' : '' }} relative">
          <svg class="w-6 h-6 fill-black" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path></svg>
          @if ($count->count() > 0)
          
          <span class="absolute items-center justify-center py-[1px] px-[5px] text-xs font-semibold text-white bg-red-600 rounded-md -top-2">
            {{ $count->count() }}
          </span>
          @endif
        </div>
        </button>
        <!-- Dropdown menu -->
        <div class="z-50 hidden max-w-lg w-full h-[620px] my-4 overflow-y-scroll scrollbar text-base list-none bg-white divide-y divide-gray-100 rounded shadow-lg dark:divide-gray-600 dark:bg-gray-700 " id="notification-dropdown">
          <div class="block px-4 py-2 text-lg text-center font-semibold bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              Notifications
          </div>
          <div>
      @foreach ($notification as $notifications)
          @php
          $wisata = App\Models\Wisata::where('id', $notifications->pemesanan->wisata_id)->pluck('nama_wisata')->first();
        @endphp
            <form action="/notification/{{ $notifications->id }}" method="POST">
              @csrf
            <button class="w-full text-left flex px-4 py-3 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600 {{ ($notifications->status == 'belum dibuka')? 'bg-gray-100 dark:bg-gray-600' : '' }} {{ ($notifications->status == 'dibuka') ? 'bg-white dark:bg-gray-700' : '' }}">
              <div class="w-full pl-3">
                  <div class="font-normal text-base mb-1.5 dark:text-gray-400">


                    @if ($notifications->tipe == 'pemesanan')

                    successful payment for {{ $wisata }} tour, please see your ticket
                    @elseif($notifications->tipe == 'confirmation' || $notifications->tipe == 'refund')
                      {{ $notifications->judul }}
                    @endif
                  </div>

                  @php
                  $created_at =  Carbon\Carbon::parse($notifications->created_at);
                  $now =  Carbon\Carbon::now();

                @endphp
                  <div class="text-sm font-semibold text-primary-700 dark:text-primary-400">
                    @if ($created_at->diffInMinutes($now) < 60)
                    {{ $created_at->diffForHumans() }}
                    @else
                    {{ $created_at->format('d F Y') }}
                  @endif
                  </div>
              </div>
            </button>
          </form>
      @endforeach
            
            
          </div>

        </div>
        @endif
        <!-- Notifications end-->

        @auth
      
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>

        <div class="flex justify-center items-center dark:bg-gray-500 ">

          <div x-data="{ open: false }" class=" dark:bg-gray-800 justify-center items-center">

              <div @click="open = !open" class="relative border-b-4 border-transparent " :class="{'border-indigo-700 transform transition duration-300 ': open}" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100">

                <div class="flex justify-center items-center space-x-3 cursor-pointer">
                  <div class="w-12 h-12 rounded-full overflow-hidden border-[1px] dark:border-white border-gray-600">
                    <img src="{{ asset('ft_user/'. auth()->user()->image) }}" alt="" class="w-full h-full object-cover">
                  </div>
                </div>
                
                <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute w-60 px-5 py-3  bg-white/50 backdrop-blur-sm rounded-lg shadow mt-5">

                  <ul class="space-y-3 dark:text-white">

                    <li class="font-medium">
                      <a href="/profile" class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-red-600">
                        <div class="mr-3">
                          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                        My Account
                      </a>
                    </li>

                    <li class="font-medium">
                      <a href="/booking" class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-red-600">
                        <div class="mr-3">
                          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        My Booking
                      </a>
                    </li>

                    <hr class="dark:border-gray-700">
                    <li class="font-medium">

                      @if (auth()->user()->posisi == 0)
                      <form action="/logout" method="post" class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-red-600">
                        @csrf
                        <button type="submit" class=" w-full flex">
                        <div class="mr-3 text-red-600">
                          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        </div>
                        Logout
                      </button>
                      </form>
                    </li>
                  </ul>
                </div>
              </div>
          </div>
        </div>
      
        @elseif (auth()->user()->posisi == 1)
          <a href="/admin" class="m-auto text-lg text-white bg-orange-600 font-semibold p-2 rounded-md">Dashboard Admin</a>
          @endif
      
          @else
          <div class="grid grid-cols-2 gap-x-2 h-[40px] my-auto mx-auto">
          <a href="/login" class="inline-flex items-center justify-center rounded-xl border border-transparent bg-orange-600 px-4 py-1 font-medium text-white hover:bg-orange-700">Login</a>
          <a href="/register" class="inline-flex items-center justify-center rounded-xl border bg-white px-4 py-1 font-medium text-orange-600 shadow hover:bg-blue-50">Register</a>
        </div>
           
        @endauth
      
        </div>      
      

    </div>
  </div>
</nav>



  
</div>
</div>
</div>
</div>  













