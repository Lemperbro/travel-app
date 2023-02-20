<<<<<<< HEAD
<h1 class='text-2xl font-bold border-black text-center mt-10'>Most Popular</h1>

      <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">

        @foreach ($best as $best_kota)

            @php
            $images = explode('|', $best_kota->image);
          @endphp
                    <!--Card 1-->
        <div class="rounded overflow-hidden shadow-best4">
          <img class="w-full" src="/image/{!! $images[0] !!}" alt="Mountain">
          <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">Mountain</div>
            <p class="text-gray-700 text-base">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, Nonea! Maiores et perferendis eaque, exercitationem praesentium nihil.
            </p>
          </div>

          <div class="px-6 pt-4 pb-2">
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $best_kota->tour_type }}</span>
          </div>
        </div>
        @endforeach

        

    </div>
    
              
=======
<h1 class='text-2xl font-bold border-black text-center mt-4'>Most Popular & Bromo</h1>
    <div class="mt-6 mb-7 grid grid-cols-3 grid-rows-2 gap-8">
        <a class='relative'>
            <img src='/img/a.png' class='object-cover w-full'/>
        <h1 class='text-xl ml-1 font-bold text-center mt-2'>Heha Sky View</h1>
            <div class='mx-auto text-center mt-3'>
                <button class='border shadow-md px-3 py-1 rounded-xl bg-[#FF2E00] text-white font-serif '>
                    Booking Now
                </button>
            </div>
              </a>
              <a class='relative'>
                  <img src='/img/b.png' class='object-cover w-full'/>
                  <h1 class='text-xl ml-1 font-bold text-center mt-2'>
                    Heha Sky Vieww
                  </h1>
                  <div class='mx-auto text-center mt-3'>
                    <button class='border shadow-md px-3 py-1 rounded-xl bg-[#FF2E00] text-white font-serif '>
                    Booking Now
                  </button>
                  </div>
              </a>
              <a class='relative'>
                  <img src='/img/c.png' class='object-cover w-full'/>
                  <h1 class='text-xl ml-1 font-bold text-center mt-2'>
                    Heha Sky View
                  </h1>
                  <div class='mx-auto text-center mt-3'>
                    <button class='border shadow-md px-3 py-1 rounded-xl bg-[#FF2E00] text-white font-serif '>
                    Booking Now
                  </button>
                  </div>
              </a>
              <a class='relative'>
                  <img src='/img/c.png' class='object-cover w-full'/>
                  <h1 class='text-xl ml-1 font-bold text-center mt-2'>
                    Heha Sky View
                  </h1>
                  <div class='mx-auto text-center mt-3'>
                    <button class='border shadow-md px-3 py-1 rounded-xl bg-[#FF2E00] text-white font-serif '>
                    Booking Now
                  </button>
                  </div>
              </a>
              <a class='relative'>
                  <img src='/img/c.png' class='object-cover w-full'/>
                  <h1 class='text-xl ml-1 font-bold text-center mt-2'>
                    Heha Sky View
                  </h1>
                  <div class='mx-auto text-center mt-3'>
                    <button class='border shadow-md px-3 py-1 rounded-xl bg-[#FF2E00] text-white font-serif '>
                    Booking Now
                  </button>
                  </div>
              </a>
              <a class='relative'>
                  <img src='/img/c.png' class='object-cover w-full'/>
                  <h1 class='text-xl ml-1 font-bold text-center mt-2'>
                    Heha Sky View
                  </h1>
                  <div class='mx-auto text-center mt-3'>
                    <button class='border shadow-md px-3 py-1 rounded-xl bg-[#FF2E00] text-white font-serif '>
                    Booking Now
                  </button>
                  </div>
              </a>
</div>
>>>>>>> 227a3048108aa728440bbd9cfc947ebab16eea34
