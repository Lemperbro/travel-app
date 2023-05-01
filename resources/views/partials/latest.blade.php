
<div class="mt-4 mb-4">
<h1 class='text-2xl font-bold border-black text-center mt-10 mb-4'>Latest Post</h1>

@include('partials.filter')
      <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">

        {{-- @foreach ($latest->take(6) as $latest_post)

            @php
            $images = explode('|', $latest_post->image);
          @endphp
                    <!--Card 1-->
        <a href="/wisata/{{ $latest_post->slug }}" class="rounded overflow-hidden shadow-best4">
          <img class="w-full h-64 object-cover" src="/image/{!! $images[0] !!}" alt="Mountain">
          <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2 capitalize">{{ $latest_post->nama_wisata }}</div>
            <h1 class="text-lg">Start From <span class="font-semibold">Rp. {{ $latest_post->harga }}</span></h1>
            <p class="text-gray-700 text-base line-clamp-4">
              {{ $latest_post->deskripsi }}
            </p>
          </div>
          @php
          $booking = $latest_post->diboking;

          if($booking === null){
            $booking = 0;
          }
        @endphp
          <div class="px-6 pt-4 pb-2">
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $latest_post->tour_type }}</span>
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $latest_post->long_tour }}</span>
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $latest_post->kota->nama_kota }}</span>
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $booking }} On Booking</span>
          </div>
        </a>
        @endforeach --}}


        {{-- card 2 start --}}

        @foreach ($latest->take(6) as $latest_post)
        @php
        $images = explode('|', $latest_post->image);
      @endphp
        <a href="/wisata/{{ $latest_post->slug }}" class="block rounded-lg p-4 shadow-best dark:bg-gray-700 bg-white">
          <img
            alt="Home"
            src="{{ asset('image/'.$images[0]) }}"
            class="h-56 w-full rounded-md object-cover"
          />
        
          <div class="mt-2">
            <dl>
              <div>
                <dt class="sr-only">Price</dt>
        
                <dd class="text-sm text-gray-700 dark:text-gray-200 font-semibold">Start From Rp. {{ number_format($latest_post->harga,0,',','.') }}</dd>
              </div>
        
              <div>
                <dt class="sr-only">Address</dt>
        
                <dd class="text-gray-900 dark:text-white font-semibold text-xl">{{ $latest_post->nama_wisata }}</dd>
              </div>
              <div>
                <p class="text-gray-700 text-base line-clamp-3">
                  {{ $latest_post->deskripsi }}
                </p>
                
              </div>
            </dl>
        
            <div class="mt-6 grid grid-cols-3 items-center gap-8 text-xs">
              <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="text-orange-600 dark:text-white w-7 h-7" style="transform: ;msFilter:;"><path d="M21 20V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2zM9 18H7v-2h2v2zm0-4H7v-2h2v2zm4 4h-2v-2h2v2zm0-4h-2v-2h2v2zm4 4h-2v-2h2v2zm0-4h-2v-2h2v2zm2-5H5V7h14v2z"></path></svg>
        
                <div class="mt-1.5 sm:mt-0">
                  <p class="text-gray-900 dark:text-gray-200 font-semibold">Departure</p>
      
                  <p class="font-medium text-gray-700 dark:text-gray-300">{{ \Carbon\Carbon::parse($latest_post->tanggal)->format('d-F-Y') }}</p>
                </div>
              </div>
        
              <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" class="text-orange-600 dark:text-white w-7 h-7" fill="currentColor" style="transform: ;msFilter:;"><path d="M12 2C7.589 2 4 5.589 4 9.995 3.971 16.44 11.696 21.784 12 22c0 0 8.029-5.56 8-12 0-4.411-3.589-8-8-8zm0 12c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4z"></path></svg>
        
                <div class="mt-1.5 sm:mt-0">
                  <p class="text-gray-900 dark:text-gray-200 font-semibold">Location</p>
      
                  <p class="font-medium text-gray-700 dark:text-gray-300">{{ $latest_post->kota->nama_kota }}</p>
                </div>
              </div>
        
              <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-orange-600 dark:text-white w-7 h-7" style="transform: ;msFilter:;"><path d="M19.965 8.521C19.988 8.347 20 8.173 20 8c0-2.379-2.143-4.288-4.521-3.965C14.786 2.802 13.466 2 12 2s-2.786.802-3.479 2.035C6.138 3.712 4 5.621 4 8c0 .173.012.347.035.521C2.802 9.215 2 10.535 2 12s.802 2.785 2.035 3.479A3.976 3.976 0 0 0 4 16c0 2.379 2.138 4.283 4.521 3.965C9.214 21.198 10.534 22 12 22s2.786-.802 3.479-2.035C17.857 20.283 20 18.379 20 16c0-.173-.012-.347-.035-.521C21.198 14.785 22 13.465 22 12s-.802-2.785-2.035-3.479zm-9.01 7.895-3.667-3.714 1.424-1.404 2.257 2.286 4.327-4.294 1.408 1.42-5.749 5.706z"></path></svg>
        
                <div class="mt-1.5 sm:mt-0">
                  <p class="text-gray-900 dark:text-gray-200 font-semibold">Type Tour</p>
      
                  <p class="font-medium text-gray-700 dark:text-gray-300">{{ $latest_post->tour_type }}</p>
                </div>
              </div>
            </div>
          </div>
        </a>
        @endforeach

        {{-- card 2 end --}}


    </div>
    @if ($latest->count() === 0)
    <h1 class="text-center font-semibold text-xl">Ooops !! The data you are looking for does not exist</h1>
  @endif
    <a href="/wisata/" class="inline-block bg-[#FF2E00] p-4 text-white w-full text-center rounded-md mt-8 font-semibold ">View More</a>

</div>
    
              
