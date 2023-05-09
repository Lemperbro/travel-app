<div class="grid grid-cols-4 justify-between gap-6">
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
      <div class="my-3 border bg-white p-2 rounded-lg shadow-best4">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path><path d="M13 7h-2v6h6v-2h-4z"></path></svg>
      </div>
    </div>
    @php
        $trik1 = str_replace('>', '',$itenerary->deskripsi);
        $trik2 = preg_split('/\n|\r\n?/',$trik1);   
    @endphp
   <ul class="p-2 w-full bg-white shadow-best5">
    @foreach ($trik2 as $deskripsi)
      
    <li class="my-1 list-disc ml-7 p-4">
      {{ $deskripsi }}
    </li>
    @endforeach

   </ul>
  </details>
  @endforeach

  


  </div>
  