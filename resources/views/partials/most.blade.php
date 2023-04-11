

      <div class="grid grid-cols-1 sm:grid-rows-3-4 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">

        @foreach ($best as $best_wisata)

            @php
            $images = explode('|', $best_wisata->image);
          @endphp
                    <!--Card 1-->
        <a href="/wisata/{{ $best_wisata->slug }}" class="rounded overflow-hidden shadow-best4">
          <img class="w-full h-64 object-cover" src="/image/{!! $images[0] !!}" alt="Mountain">
          <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2 capitalize">{{ $best_wisata->nama_wisata }}</div>
            <h1 class="text-lg">Start From <span class="font-semibold">Rp. {{ $best_wisata->harga }}</span></h1>
            <p class="text-gray-700 text-base line-clamp-4">
              {{ $best_wisata->deskripsi }}
            </p>
          </div>
          @php
            $booking = $best_wisata->diboking;

            if($booking === null){
              $booking = 0;
            }
          @endphp
          <div class="px-6 pt-4 pb-2">
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $best_wisata->tour_type }}</span>
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $best_wisata->long_tour }}</span>
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $best_wisata->kota->nama_kota }}</span>
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $booking }} On Booking</span>
          </div>
        </a>
        @endforeach



 
        

    </div>
{{ $best->links('vendor.pagination.tailwind') }}
  

  
              
