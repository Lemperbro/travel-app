<div class='fixed z-40 w-full py-1 backdrop-blur-md bg-black/50 top-0'>
  <nav class="px-2 border-gray-200 dark:bg-gray-900 dark:border-gray-700">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
      <a href="/" class="flex items-center">
          <img src=" {{ asset('img/logo.png') }}" class="h-6 mr-3 sm:h-10" alt="Flowbite Logo" />
      </a>
      <button data-collapse-toggle="navbar-multi-level" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-multi-level" aria-expanded="false">
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
      </button>

      <div class="hidden w-full md:block md:w-auto " id="navbar-multi-level">


        <ul class=" flex flex-col p-3 rounded-lg md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 ">
          <li>
            <a href="/" class="block mt-2 py-2 pl-3 pr-4 text-white uppercase font-semibold text-lg rounded " aria-current="page">Home</a>
          </li>
          <li>
              <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full mt-2 py-2 pl-3 pr-4 font-bold text-lg text-white uppercase ">Type Tour<svg class="w-4 h-4 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
              
              <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                  <div class="py-1">
                    <a href="privatetrip" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Private Trip</a>
                  </div>

                  <div class="py-1">
                    <a href="singletrip" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Single Trip</a>
                  </div>

                  <div class="py-1">
                    <a href="opentrip" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Open Trip</a>
                  </div>
              </div>
          </li>
          <li>
            <a href="#" class="block font-bold text-lg mt-2 py-2 pl-3 pr-4 text-white uppercase rounded ">Booking</a>
          </li>

          <div class="flex">          
            @auth
          
            <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
            <div class="flex justify-center items-center dark:bg-gray-500">
              <div x-data="{ open: false }" class=" dark:bg-gray-800 justify-center items-center">
                  <div @click="open = !open" class="relative border-b-4 border-transparent " :class="{'border-indigo-700 transform transition duration-300 ': open}" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100">
                    <div class="flex justify-center items-center space-x-3 cursor-pointer">
                      <div class="w-12 h-12 rounded-full overflow-hidden border-2 dark:border-white border-gray-900">
                        <img src="https://images.unsplash.com/photo-1610397095767-84a5b4736cbd?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80" alt="" class="w-full h-full object-cover">
                      </div>
                    </div>
                    <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute w-60 px-5 py-3  bg-white rounded-lg shadow mt-5">
                      <ul class="space-y-3 dark:text-white">
                        <li class="font-medium">
                          <a href="#" class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-indigo-700">
                            <div class="mr-3">
                              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            Account
                          </a>
                        </li>
                        <li class="font-medium">
                          <a href="#" class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-indigo-700">
                            <div class="mr-3">
                              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            Setting
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
              <a href="/login" class='bg-dark p-2 font-bold text-lg rounded-md text-[#f15936] md:hover:text-blue-700 inline-block my-auto'>Login</a>
              <a href="register" class='bg-dark p-2 font-bold text-lg rounded-md text-[#f15936] md:hover:text-blue-700 inline-block my-auto'>Register</a>
            @endauth
          
            </div>

        </ul>
      </div>
    </div>
  </nav>
</div>
</div>
</div>
</div>  













