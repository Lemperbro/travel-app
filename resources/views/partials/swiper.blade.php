

<div id="carouselExampleControls" class="carousel slide relative" data-bs-ride="carousel">
  <div class="carousel-inner relative w-full overflow-hidden">
    @foreach ($best->take(3)  as $best)
    @php
      $img = explode('|', $best->image);
    @endphp
      
      <a href="/wisata/{{ $best->slug }}" class="relative inline-block h-full rounded-xl">
        <h1 class='text-white font-semibold text-xl absolute w-full text-center bottom-2 left-[50%] translate-x-[-50%]'>{{ $best->nama_wisata }}</h1>
        <img src='{!! asset('image/'.$img[0]) !!}' class='w-56 object-cover h-full rounded-xl'/>   
        </a>


    @endforeach




    

  </div>


</div>
