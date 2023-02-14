
<div class='fixed z-40 w-full py-4 backdrop-blur-sm bg-black/40 top-0'>
  <div class="container">
    <div class='flex justify-between'>
    <img src='/img/logo.png' class='w-22 h-14 my-auto '/>
        <ul class='flex gap-x-8 my-auto'>
          <li class='list-none text-white text-lg font-bold cursor-pointer uppercase'><a href="/">Home</a> </li>
          <li>
          <div class="flex justify-center">
            <div>
              <div class="dropdown relative">
                <a
                  class="dropdown-toggle text-white text-lg font-bold mt-[2px] leading-tight uppercase focus:ring-0 transition duration-150 ease-in-out flex items-center whitespace-nowrap" href="#" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                  Tour
                  <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-down" class="w-2 ml-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                    <path fill="currentColor" d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"></path>
                  </svg>
                </a>
                <ul class="dropdown-menu min-w-max absolute hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded-lg shadow-lg mt-1 m-0 bg-clip-padding border-none" aria-labelledby="dropdownMenuButton2">
                  <li>
                    <a
                      class=" dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent  text-gray-700  hover:bg-gray-100"
                      href="privatetrip">Private Trip</a>
                  </li>
                  <li> <a class=" dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent  text-gray-700  hover:bg-gray-100
                      " href="opentrip">Open Trip</a>
                  </li>
                  <li>
                    <a class=" dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent  text-gray-700  hover:bg-gray-100
                      " href="singletrip">Single Trip</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </li>
          <li class='list-none text-white text-lg font-bold cursor-pointer uppercase'><a href='/destination'>Booking</a></li>
        </ul>
        <div class="flex gap-x-2">
          
          
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
            <a href="/login" class='bg-dark p-2 rounded-md text-white inline-block my-auto'>Login</a>
            <a href="register" class='bg-dark p-2 rounded-md text-white inline-block my-auto'>Register</a>
          @endauth

          </div>   
    </div>
    </div>
</div>