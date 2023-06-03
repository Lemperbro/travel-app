
        <div class="flex items-center justify-center w-full py-24 sm:py-8 px-4 container">
            <div class="w-full relative flex items-center justify-center">
                <button aria-label="slide backward" class="absolute z-30 left-0 ml-10 focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 cursor-pointer" id="prev">
                    <svg class="dark:text-gray-900" width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <div class="w-full h-full mx-auto overflow-x-hidden overflow-y-hidden">
                    <div id="slider" class="h-full grid grid-flow-col auto-cols-[30%] lg:gap-8 md:gap-6 gap-14 items-center justify-start transition ease-out duration-700">
                        @foreach ($guide as $guides)
                            
                        <div class="relative overflow-hidden rounded-lg shadow-lg cursor-pointer bg-[#FF2E00] max-w-sm">
                            <img class="object-cover w-full h-64" src="{{ asset('image/'.$guides->image) }}" alt="Flower and sky"/>
                        
                            <span class="z-10 absolute bg-gradient-to-t from-black to-white/0 inset-0 h-64 top-20"></span>
                              
                            <div class="absolute left-[50%] -translate-x-[50%] bottom-1 z-20 w-full" data-modal-target="popup-modal" data-modal-toggle="popup-modal">
                              <h4 class=" text-2xl text-center font-semibold text-white">{{ $guides->nama }}</h4>
                        
                            </div>
                        
                            </div>

                            @endforeach

                            

                            
                        
                    </div>
                </div>
                <button aria-label="slide forward" class="absolute z-30 right-0  focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400  " id="next">
                    <svg class="dark:text-gray-900 " width="8" height="14"  viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>
      
        
        
    