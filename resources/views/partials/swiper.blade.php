

<div id="carouselExampleControls" class="carousel slide relative" data-bs-ride="carousel">
  <div class="carousel-inner relative w-full overflow-hidden">

    @foreach ($best->take(3)  as $best)
      <a href="/isi/{{ $best->id }}" class="relative inline-block">
        <h1 class='text-black font-semibold text-xl absolute bottom-0 left-[50%] -translate-x-[50%]'>{{ $best->nama_wisata }}</h1>
        <img src='/image/{{ $best->image }}' class='w-56 rounded-xl border h-full object-cover'/>   
        </a>
    @endforeach




    

  </div>


</div>
