@extends('admin.layouts.main')

@section('container')

<div>
  

    <div class="flex gap-x-4">

                <!-- Button trigger modal -->
        <button type="button"
        class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
        data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        FIlter Kota
        </button>

        <!-- Modal -->
        <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
        id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">

        <div class="modal-dialog relative w-auto pointer-events-none">
        <div
            class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
            <div
            class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
            <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalLabel">
                Pilih Kota
            </h5>
            <button type="button"
                class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body relative p-4">
            {{-- isi model --}}
                <form action="" method="post">
                    
                    @csrf
                    <div class="mt-2">
                        <input id="malang" class="peer/malang hidden" type="radio" name="pilihDaerah"/>
                        <label for="malang" class="w-full border p-2 rouned-md block peer-checked/malang:bg-sky-500 peer-checked/malang:text-white">Malang</label>
                        
                    </div>
                    <div class="mt-2">
                        <input id="surabaya" class="peer/surabaya hidden" type="radio" name="pilihDaerah"/>
                        <label for="surabaya" class="w-full border p-2 rouned-md block peer-checked/surabaya:bg-sky-500 peer-checked/surabaya:text-white">Surabaya</label>
                    </div>



                    
            </div>

            <div
            class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
            <button type="button"
                class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                data-bs-dismiss="modal">Close</button>
            <button type="button" type="submit"
                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">Selesai</button>

            </div>
        </form>

        </div>
        </div>
        </div>
        {{-- akhir modal --}}

       <a href="/admin/wisata/add" class="bg-orange-600 text-white p-2 rounded-md">Tambah Kota</a>
    </div>

    <div class="grid grid-cols-4 gap-4 mt-8">

       <div class="rounded-md shadow-best p-2">
          <img src="{{ asset('storage/post-image/pp.jpg') }}" alt="" class="">

          <div class="mt-4">
             <h1 class="font-semibold font-mono text-center text-xl">Bromo</h1>

            <h2 class="font-semibold ">Kota Malang</h2>
            <p class="line-clamp-3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Omnis incidunt tempore repellendus vitae aliquid? Repellendus nobis magnam consequatur quod est corporis maxime, officiis libero dolorum repellat ipsum, cupiditate voluptate tempora.</p>

          <div class="flex gap-x-4 justify-between mt-4">
             <a href="" class="bg-green-600 p-2 rounded-md text-white font-semibold  w-full text-center">Edit</a>
             <button class="bg-red-600 p-2 rounded-md text-white font-semibold  w-full text-center">Hapus</button>
          </div>
       </div>

       </div>
       
    </div>
 
</div>




@endsection