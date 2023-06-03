@extends('layouts.main')


<div class="relative">
<img src='/gambar/op.png' class=''/>
<h1 class='absolute text-center text-white left-[50%] top-[50%] -translate-x-[50%] -translate-y-[50%] text-3xl font-bold'>ABOUT GROWIN TRAVEL INDONESIA</h1>
</div>


@section('container')









<div class="flex grid-cols-2 gap-8">
@if($data !== null)
<div class='mb-9 w-[50%] mt-10'>
  {!! $data->isi !!}
</div>

<div class="w-[50%] mt-10">
  <img src="{{ asset('about/'.$data->image) }}" alt="" class="object-cover h-full w-full">
</div>
@endif

</div>
<h1 class="font-semibold text-4xl text-center mt-8">Our team lineup</h1>
<!-- component -->
<div class="flex flex-wrap mt-6 justify-between">

  


  {{-- <div class="md:w-1/2 lg:w-1/4 py-4 px-4 mt-8 ">
    <div class=" ">
      <a href="#">
        <div class="relative p-2 rounded-lg text-gray-800 ">

          <div class="flex justify-center ">
            <img src="" class="ease-in-out rounded-lg duration-300 -mt-6 object-center object-cover mr-2 h-44 w-44">
          </div>
          <div class="py-2 px-2">
            <div class=" text-2xl font-bold font-title text-center"></div>

            <div class="text-xl font-nold text-center my-2"></div>
          </div>
        </div>
      </a>

    </div>
  </div>	 --}}

  <div class="grid grid-cols-4 gap-4 h-64">
  @foreach ($team as $user)



    <div class="relative overflow-hidden rounded-lg shadow-lg cursor-pointer bg-[#FF2E00]">
    <img class="object-cover w-full h-64" src="{{ asset('image/'.$user->image) }}" alt="Flower and sky"/>

    <span class="z-10 absolute bg-gradient-to-t from-black to-white/0 inset-0 h-64 top-20"></span>
      
    <div class="absolute left-[50%] -translate-x-[50%] bottom-1 z-20 w-full" data-modal-target="popup-modal" data-modal-toggle="popup-modal">
      <h4 class=" text-2xl text-center font-semibold text-white">{{ $user->nama }}</h4>
      <p class="text-lg text-center text-gray-100 ">{{ $user->jabatan }}</p>

    </div>

    </div>
    @endforeach


  </div>


</div>




<div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">
                <h3 class="text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?</h3>
            </div>
        </div>
    </div>
</div>





    



@endsection



