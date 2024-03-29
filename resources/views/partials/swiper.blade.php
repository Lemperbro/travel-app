

<div class=" relative">
  <div class="relative w-full overflow-hidden grid grid-cols-3 gap-x-2 h-full">
    @foreach ($best->take(3)  as $best)
    @php
      $img = explode('|', $best->image);
    @endphp
      
      <a href="/wisata/{{ $best->slug }}" class="relative inline-block h-full rounded-xl overflow-hidden">
        <h1 class='text-white font-semibold text-xl absolute w-full text-center bottom-2 left-[50%] translate-x-[-50%] z-20'>{{ $best->nama_wisata }}</h1>
        <img src='{!! asset('image/'.$img[0]) !!}' class='w-full object-cover h-full rounded-xl'/>
        <span class="z-10 absolute bg-gradient-to-t from-black to-white/0 inset-0 h-32 top-36"></span>

        </a>


    @endforeach




    

  </div>


</div>



