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

<!-- component -->
<div class="flex flex-wrap mt-6 bg-[#FD522C] justify-between">

  
  @foreach ($team as $user)


  <div class="md:w-1/2 lg:w-1/4 py-4 px-4 mt-8 ">
    <div class=" ">
      <a href="#">
        <div class="relative p-2 rounded-lg text-gray-800 ">

          <div class="flex justify-center ">
            <img src="{{ asset('image/'.$user->image) }}" class="ease-in-out duration-300 rounded-full -mt-6 border-4 object-center object-cover border-white mr-2 h-44 w-44">
          </div>
          <div class="py-2 px-2">
            <div class=" text-white text-2xl font-bold font-title text-center">{{ $user->nama }}</div>

            <div class="text-white text-xl font-nold text-center my-2">{{ $user->jabatan }}</div>
          </div>
        </div>
      </a>

    </div>
  </div>	

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



