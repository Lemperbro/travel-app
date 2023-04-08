
<div id="carouselExampleSlidesOnly" class="carousel slide relative w-full lg:h-screen" data-bs-ride="carousel">
    <div class="carousel-inner relative w-full overflow-hidden ">

      <div class="carousel-item active relative float-left w-full">
        <div class="bg-black/40 absolute inset-0"></div>
        <img
          src="img/gmabar1.jpg"
          class="block w-full h-screen object-cover"
          alt="Wild Landscape"
        />

        <div
        class="absolute inset-x-[15%] top-[50%]  translate-y-[-50%] py-5 text-center text-white md:block">
        <h1 class='text-2xl lg:text-6xl font-bold text-white uppercase'>Grow In Travel</h1>
        <h1 class='text-2xl lg:text-6xl font-bold text-white uppercase mt-2'>Indonesia</h1>
      </div>

      

      </div>
      
      <div class="carousel-item relative float-left w-full">
        <div class="bg-black/40 absolute inset-0"></div>

        <img
          src="img/gambar2.jpg"
          class="block w-full h-screen"
          alt="Camera"
        />

        <div
        class="absolute inset-x-[15%] top-[50%]  translate-y-[-50%] py-5 text-center text-white md:block">
        <h1 class='text-2xl lg:text-6xl text-center font-bold text-white uppercase'>Travel is not reward for working, it's education for living.</h1>
      </div>

      </div>

      <div class="carousel-item relative float-left w-full">
        <div class="bg-black/40 absolute inset-0"></div>

        <img
          src="img/gambar3.jpg"
          class="block w-full h-screen"
          alt="Exotic Fruits"
        />

        <div
        class="absolute inset-x-[15%] top-[50%]  translate-y-[-50%] py-5 text-center text-white md:block">
        <h1 class='text-2xl lg:text-6xl text-center font-bold text-white uppercase'>Wherever you go, go with all your heart</h1>
      </div>

      </div>

      {{-- <form action="/wisata/" autocomplete="off" class="absolute bottom-28 left-[50%] translate-x-[-50%] w-[50%]">


        <div class=' w-full relative flex'>
        <input class='w-full bg-white h-14 rounded-l-md pl-10' placeholder='Search' name="search" value="{{ request('search') }}"/>
        <button class="bg-[#FF2E00]" type="submit">
          <img src='/icons/search.png' class=' w-32 h-14 rounded-r-md object-contain'/>
        </button>
      </div>

      
    </form> --}}

    <div class="mx-auto mt-5  py-20 leading-6 absolute bottom-10 left-[50%] translate-x-[-50%] w-[80%] lg:w-[50%]"> 
      <form action="/wisata/" autocomplete="off" class="relative mx-auto flex w-full max-w-2xl items-center justify-between rounded-md border shadow-lg"> 
        <svg class="absolute left-2 block h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="11" cy="11" r="8" class=""></circle>
          <line x1="21" y1="21" x2="16.65" y2="16.65" class=""></line>
        </svg>
        <input type="name" name="search" class="h-14 w-full rounded-md py-4 pr-40 pl-12 outline-none focus:ring-2" placeholder="City, Destination" />
        <button type="submit" class="absolute right-0 mr-1 inline-flex h-12 items-center justify-center rounded-lg bg-gray-900 px-10 font-medium text-white focus:ring-4 hover:bg-gray-700">Search</button>
      </form>
    </div>
    



    </div>
    {{-- @include('partials.contain') --}}
  </div>



