<h1 class='text-2xl font-bold border-black text-center mt-10 mb-4'>Most Popular</h1>

      <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">

        @foreach ($best as $best_wisata)

            @php
            $images = explode('|', $best_wisata->image);
          @endphp
                    <!--Card 1-->
        <a href="/wisata/{{ $best_wisata->slug }}" class="rounded overflow-hidden shadow-best4">
          <img class="w-full h-64 object-cover" src="/image/{!! $images[0] !!}" alt="Mountain">
          <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2 capitalize">{{ $best_wisata->nama_wisata }}</div>
            <p class="text-gray-700 text-base line-clamp-4">
              {{ $best_wisata->deskripsi }}
            </p>
          </div>
          
          <div class="px-6 pt-4 pb-2">
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $best_wisata->tour_type }}</span>
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $best_wisata->long_tour }}</span>
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $best_wisata->location }}</span>
          </div>
        </a>
        @endforeach



        

    </div>
    
              
