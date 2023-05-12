@extends('layouts.main')


<div class="">
<img src='/gambar/op.png' class=''/>
<h1 class='absolute top-40 text-center text-white left-[50%] -translate-x-[50%] text-3xl font-bold'>ABOUT GROWIN TRAVEL INDONESIA</h1>
</div>


@section('container')







<div class="flex grid-cols-2 gap-8">
@if($data !== null)
<div class='mb-9 w-[50%] mt-3'>
  {!! $data->isi !!}
</div>

<div class="w-[50%]">
  <img src="{{ asset('about/'.$data->image) }}" alt="" class="object-contain">
</div>
@endif

</div>
<h1 class="font-semibold text-4xl text-center">Our team lineup</h1>
<!-- component -->
<div class="flex flex-wrap mt-6 justify-between">

  
  @foreach ($team as $user)


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

  <div class="flex flex-col sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

    <div class="relative overflow-hidden rounded-lg shadow-lg cursor-pointer bg-[#FF2E00]">
    <img class="object-cover w-full h-48" src="{{ asset('image/'.$user->image) }}" alt="Flower and sky"/>

    <span class="z-10 absolute bg-gradient-to-t from-black to-white/0 inset-0 h-32 top-20"></span>
      
    <div class="absolute left-[50%] -translate-x-[50%] bottom-1 z-20 w-full">
      <h4 class=" text-2xl text-center font-semibold text-white">{{ $user->nama }}</h4>
      <p class="text-lg text-center text-gray-100 ">{{ $user->jabatan }}</p>
    </div>

    </div>


  </div>


{{-- <a href="#" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
  <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="" alt="">
  <div class="flex flex-col justify-between p-4 leading-normal">
      <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"></h5>
      <p class="mb-3 font-medium text-gray-700 dark:text-gray-400"></p>
  </div>
</a> --}}

  @endforeach

  


</div>




  



<h1 class='text-center font-bold text-3xl mt-16 '>
 Location Growin Travel Indonesia
</h1>
<p class='text-center text-xl font-normal mt-8'>
Perum Permata Regency 1 Blok 10/28, Perun Gpa, Ngijo, Kec. Karang Ploso, 
Kabupaten Malang, Jawa Timur 65152
</p>


    



@endsection



