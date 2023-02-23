
<div id="carouselExampleSlidesOnly" class="carousel slide relative h-screen" data-bs-ride="carousel">
    <div class="carousel-inner relative w-full overflow-hidden ">

      <div class="carousel-item active relative float-left w-full">
        <div class="bg-black/40 absolute inset-0"></div>
        <img
          src="https://mdbcdn.b-cdn.net/img/new/slides/041.webp"
          class="block w-full h-screen"
          alt="Wild Landscape"
        />

        <div
        class="absolute inset-x-[15%] top-[50%]  translate-y-[-50%] hidden py-5 text-center text-white md:block">
        <h1 class='text-6xl font-bold text-white uppercase'>Grow In Travel</h1>
        <h1 class='text-6xl font-bold text-white uppercase mt-2'>Indonesia</h1>
      </div>

      </div>
      
      <div class="carousel-item relative float-left w-full">
        <div class="bg-black/40 absolute inset-0"></div>

        <img
          src="https://mdbcdn.b-cdn.net/img/new/slides/042.webp"
          class="block w-full h-screen"
          alt="Camera"
        />

        <div
        class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block">
        <h5 class="text-xl">First slide label</h5>
        <p>
          Some representative placeholder content for the first slide.
        </p>
      </div>

      </div>

      <div class="carousel-item relative float-left w-full">
        <div class="bg-black/40 absolute inset-0"></div>

        <img
          src="https://mdbcdn.b-cdn.net/img/new/slides/043.webp"
          class="block w-full h-screen"
          alt="Exotic Fruits"
        />

        <div
        class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block">
        <h5 class="text-xl">First slide label</h5>
        <p>
          Some representative placeholder content for the first slide.
        </p>
      </div>

      </div>

      <form action="/" class="absolute bottom-28 left-[50%] translate-x-[-50%] w-[50%]">


        <div class=' w-full relative flex'>
        <input class='w-full bg-white h-14 rounded-l-md pl-10' placeholder='Search' name="search" value="{{ request('search') }}"/>
        <button class="bg-[#FF2E00]" type="submit">
          <img src='/icons/search.png' class=' w-32 h-14 rounded-r-md object-contain'/>
        </button>
      </div>

      
    </form>



    </div>
    {{-- @include('partials.contain') --}}
  </div>



