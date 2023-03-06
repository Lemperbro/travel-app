<div class="grid grid-cols-3 justify-between gap-6">
  @php
    $no = 1;
  @endphp
@foreach ($wisata->itenerary as $itenerary)
  
  <details class="text-justify text-sm font-semibold w-full mt-8">
    <summary class="text-lg font-semibold p-2 border text-center bg-[#FD522C] rounded-2xl text-white">
      Day {{ $no++ }}
    </summary>
    <div class="mt-4">
    <h1 class="border p-2 shadow-best4 inline ">{{ $itenerary->agenda }}</h1>
    </div>
    @php
        $trik1 = str_replace('>', '',$itenerary->deskripsi);
        $trik2 = preg_split('/\n|\r\n?/',$trik1);   
    @endphp
   <ul class="p-2 w-full bg-white shadow-best5 mt-2">
    @foreach ($trik2 as $deskripsi)
      
    <li class="my-2 list-disc ml-7">
      {{ $deskripsi }}
    </li>
    @endforeach

   </ul>
  </details>
  @endforeach

  


  </div>
  