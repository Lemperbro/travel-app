
<script>
  const hamburger = document.querySelector("#hamburger");
const navbar = document.querySelector("#nav-menu");

hamburger.addEventListener("click", function () {
  hamburger.classList.toggle("hamburger-active");
  navbar.classList.toggle("hidden");
});

$(document).on("click", function (event) {
  var $trigger = $("#hamburger");
  var $dropDown = $("#dropdownDefault");
  if ($trigger !== event.target && !$trigger.has(event.target).length && $dropDown !== event.target && !$dropDown.has(event.target).length) {
    $("#nav-menu").addClass("hidden");
    $("#hamburger").removeClass("hamburger-active");
  }
});

//hide dan on dropdown
$(document).ready(function () {
  $("#dropdownDefault").click(function () {
    $(this).find("#dropdown").slideToggle("fast");
  });
});
$(document).on("click", function (event) {
  var $trigger = $("#dropdownDefault");
  if ($trigger !== event.target && !$trigger.has(event.target).length) {
    $("#dropdown").slideUp("fast");
  }
});
</script>

<div class='fixed z-40 w-full py-1 backdrop-blur-sm bg-black/40 top-0'>
    <div class="container">
      <div class="relative flex items-center justify-between">
        <div class="relative px-4 py-3">
          <a href="admin/index.php">
          <img src="img/logo-nav.png" alt="logo-nav" class="mr-0 w-[40px]" />
          </a>
        </div>
        <div class="flex items-center px-4">
          <button id="hamburger" name="hamburger" type="button" class="absolute right-4 block lg:hidden">
            <span class="hamburger-line origin-top-left transition duration-300 ease-in-out"></span>
            <span class="hamburger-line transition duration-300 ease-in-out"></span>
            <span class="hamburger-line origin-bottom-left transition duration-300 ease-in-out"></span>
          </button>

          <nav id="nav-menu" class="absolute right-4 top-full  hidden w-full max-w-[250px] rounded-lg py-5 shadow-lg  lg:static lg:block lg:max-w-full lg:rounded-none lg:bg-transparent lg:shadow-none dark:bg-oldblue dark:shadow-best4 lg:dark:shadow-none ">
            <ul class="block lg:flex">
              <li class="group"><a href="#home" class="mx-8 flex py-2 text-base text-white font-semibold">Home</a></li>

              <li class="group" id="dropdownDefault" data-dropdown-toggle="dropdown"><a class="mx-8 cursor-pointer flex py-2 font-semibold text-white ">Tour<svg class="w-4 h-6 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
          
              </a>
            
          <div id="dropdown" class="z-10 hidden bg-slate-200 divide-y pl-4 shadow-best3 lg:shadow-best relative lg:absolute lg:rounded lg:w-44 w-full dark:bg-oldblue">
          <ul class="py-1 text-sm text-gray-700 " aria-labelledby="dropdownDefault">
            <li>
              <a href="#" class="block px-4 py-2 font-semibold text-sm">Private Trip</a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 font-semibold text-sm">Single Trip</a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 font-semibold text-sm">Open Trip</a>
            </li>
          </ul>
            </div>

           </li >

           <li class="group"><a href="#home" class="mx-8 flex py-2 text-base text-white font-semibold">booking</a></li>

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
              <a href="/login" class='bg-dark p-2 rounded-md text-white inline-block my-auto'>Login</a>
              <a href="register" class='bg-dark p-2 rounded-md text-white inline-block my-auto'>Register</a>
            @endauth
  
            </div>                
            </ul>
          </nav>
        </div>
      </div>
    </div>
</div>