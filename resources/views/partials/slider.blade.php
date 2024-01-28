<div class="grid grid-flow-col auto-cols-[45%] md:auto-cols-[30%] lg:auto-cols-[20%] items-center justify-start gap-x-4 overflow-x-auto max-w-full scrollbar_client pb-2">
    @foreach ($guide as $guides)
                            
    <div class="relative overflow-hidden rounded-lg shadow-lg cursor-pointer bg-[#FF2E00] w-full">
        <img class="object-cover w-full h-64" src="{{ asset('image/'.$guides->image) }}" alt="Flower and sky"/>
    
        <span class="z-10 absolute bg-gradient-to-t from-black to-white/0 inset-0 h-64 top-20"></span>
          
        <div class="absolute left-[50%] -translate-x-[50%] bottom-1 z-20 w-full" data-modal-target="popup-modal" data-modal-toggle="popup-modal">
          <h4 class=" text-2xl text-center font-semibold text-white">{{ $guides->nama }}</h4>
    
        </div>
    
        </div>

        @endforeach
</div>

        
        
    