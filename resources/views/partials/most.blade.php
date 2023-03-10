

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
            <p class="text-gray-700 text-base line-clamp-4">
              {{ $best_wisata->deskripsi }}
            </p>
          </div>
          
          <div class="px-6 pt-4 pb-2">
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $best_wisata->tour_type }}</span>
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $best_wisata->long_tour }}</span>
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $best_wisata->kota->nama_kota }}</span>
          </div>
        </a>
        @endforeach



        

    </div>
    <nav class="flex gap-x-1 items-center mt-4 justify-end">
      <div class="flex justify-start">
          @if ($best->onFirstPage())
              <span class="px-2 py-1 text-gray-600 bg-white border border-gray-300 rounded-l-md dark:bg-gray-800 dark:text-gray-400 dark:border-gray-700">&laquo; Previous</span>
          @else
              <a href="{{ $best->previousPageUrl() }}" class="px-2 py-1 text-white bg-blue-500 border border-blue-500 rounded-l-md hover:bg-blue-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-700 dark:text-white">&laquo; Previous</a>
          @endif
      </div>
  
      <div class="flex justify-center">
          @foreach ($best as $element)
              @if (is_string($element))
                  <span class="px-2 py-1 text-gray-600 bg-white border border-gray-300 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-700">{{ $element }}</span>
              @endif
  
              @if (is_array($element))
                  @foreach ($element as $page => $url)
                      @if ($page == $best->currentPage())
                          <span class="px-2 py-1 text-white bg-blue-500 border border-blue-500 hover:bg-blue-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-700 dark:text-white">{{ $page }}</span>
                      @else
                          <a href="{{ $url }}" class="px-2 py-1 text-gray-600 bg-white border border-gray-300 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-gray-400 dark:hover:text-white">{{ $page }}</a>
                      @endif
                  @endforeach
              @endif
          @endforeach
      </div>
  
      <div class="flex justify-end">
          @if ($best->hasMorePages())
              <a href="{{ $best->nextPageUrl() }}" class="px-2 py-1 text-white bg-blue-500 border border-blue-500 rounded-r-md hover:bg-blue-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-700 dark:text-white">Next &raquo;</a>
          @else
              <span class="px-2 py-1 text-gray-600 bg-white border border-gray-300 rounded-r-md dark:bg-gray-800 dark:text-gray-400 dark:border-gray-700">Next &raquo;</span>
          @endif
      </div>
  </nav>
    
  

  
              
