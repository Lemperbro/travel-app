@extends('admin.layouts.main')

@section('container')

<div class="px-4 py-6">
  
<div class="flex gap-x-4">
    <a href="/admin/article" class="text-white bg-green-600 p-2 rounded-md ">
        Back
    </a>

    <button data-modal-target="staticModal" data-modal-toggle="staticModal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
        Add Kategori
      </button>

</div>



  <div class="flex flex-wrap gap-4 mt-10">
        
@foreach ($data as $datas)
    
    <div data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{ $datas->id }}" class=" max-w-sm px-6 py-2 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 flex gap-x-4">
        <h5 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white text-center">{{ $datas->kategori }}</h5>
        <form action="/article/kategori/delete/{{ $datas->id }}" class="flex m-auto" method="post">
            @csrf
            <button  type="submit" class="bg-red-700 rounded-md cursor-pointer"> 
                <svg xmlns="http://www.w3.org/2000/svg" class="m-auto flex justify-center" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M5 11h14v2H5z"></path></svg>
            </button>
        </form>
    </div>
@endforeach
    


  </div>

 
</div>


@foreach ($data as $edit)
    
<!-- Modal Edit Kategori-->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
id="staticBackdrop-{{ $edit->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
aria-labelledby="staticBackdropLabel" aria-hidden="true">

<div class="modal-dialog relative w-auto pointer-events-none">
<div
    class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current justify-center m-auto">
    <div
    class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
    <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalLabel">
        Edit Kategori {{ $edit->kategori }}
    </h5>
    <button type="button"
        class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
        data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body relative p-4">
    {{-- isi modal --}}
        <form action="/article/kategori/edit/{{ $edit->id }}" method="POST">
            @csrf
            <label for="kategori">Kategori</label>
            <input type="text" id="kategori" name="kategori" class="w-full rounded-md border-gray-300 border-[1px]" value="{{ $edit->kategori }}">



            
    </div>

    <div
    class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
    <button type="button"
        class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
        data-bs-dismiss="modal">Close</button>
    <button type="submit"
        class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">Selesai</button>

    </div>
</form>

</div>
</div>
</div>
{{-- akhir modal --}}
@endforeach


  
  <!-- Main modal -->
  <div id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
      <div class="relative w-full h-full max-w-2xl md:h-auto">
          <!-- Modal content -->
          <form method="post" action="/article/kategori" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              @csrf
              <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                      Add Kategori
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="staticModal">
                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                  </button>
              </div>
              <!-- Modal body -->
              <div class="p-6 space-y-6">
                <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                <input type="text" id="kategori" name="kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
              </div>
              <!-- Modal footer -->
              <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                  <button type="submit" data-modal-hide="staticModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kirim</button>
                  <a href="/article/kategori" data-modal-hide="staticModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</a>
              </div>
          </form>
      </div>
  </div>
  
@endsection