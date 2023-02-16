<div class='fixed z-40 w-full py-1 backdrop-blur-sm bg-black/40 top-0'>
  <nav class="px-2 border-gray-200 dark:bg-gray-900 dark:border-gray-700">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
      <a href="#" class="flex items-center">
          <img src="img/logo.png" class="h-6 mr-3 sm:h-10" alt="Flowbite Logo" />
      </a>
      <button data-collapse-toggle="navbar-multi-level" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-multi-level" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
      </button>
      <div class="hidden w-full md:block md:w-auto" id="navbar-multi-level">
        <ul class=" flex flex-col p-3 border border-gray-100 rounded-lg md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
          <li>
            <a href="#" class="block mt-2 py-2 pl-3 pr-4 text-[#f15936] font-semibold text-lg rounded md:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:text-white md:dark:bg-transparent" aria-current="page">Home</a>
          </li>
          <li>
              <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full mt-2 py-2 pl-3 pr-4 font-bold text-lg text-[#f15936] border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-gray-400 dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Dropdown <svg class="w-4 h-4 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
              
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
            <a href="#" class="block font-bold text-lg mt-2 py-2 pl-3 pr-4 text-[#f15936] rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Services</a>
          </li>
          <div class="flex">          
            @auth
          
            @if (auth()->user()->posisi == 0)
            <form action="/logout" method="post">
              @csrf
            <button type="submit" class="m-auto text-lg text-white bg-red-600 inline-block font-semibold p-2 rounded-md">Logout</button>
            </form>
          
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













