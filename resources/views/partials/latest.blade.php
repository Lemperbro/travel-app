
<div class="mt-4 mb-4">
<h1 class='text-2xl font-bold border-black text-center mt-10 mb-4'>Latest Post</h1>

      <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">

        @foreach ($latest->take(6) as $latest_post)

            @php
            $images = explode('|', $latest_post->image);
          @endphp
                    <!--Card 1-->
        <a href="/wisata/{{ $latest_post->slug }}" class="rounded overflow-hidden shadow-best4">
          <img class="w-full h-64 object-cover" src="/image/{!! $images[0] !!}" alt="Mountain">
          <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2 capitalize">{{ $latest_post->nama_wisata }}</div>
            <p class="text-gray-700 text-base line-clamp-4">
              {{ $latest_post->deskripsi }}
            </p>
          </div>
          
          <div class="px-6 pt-4 pb-2">
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $latest_post->tour_type }}</span>
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $latest_post->long_tour }}</span>
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $latest_post->kota->nama_kota }}</span>
          </div>
        </a>
        @endforeach


    </div>
    <a href="/wisata/" class="inline-block bg-[#FF2E00] p-4 text-white w-full text-center rounded-md mt-8 font-semibold ">View More</a>

</div>
    
              
