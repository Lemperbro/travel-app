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

<iframe class='mx-auto mt-7 pb-20'
  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.9521455537024!2d112.60469731418937!3d-7.900068680794963!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7881c2c4637501%3A0x10433eaf1fb2fb4c!2sHummasoft%20Technology!5e0!3m2!1sid!2sid!4v1674017713271!5m2!1sid!2sid"
  width="1024"
  height="512"
  style='border: 0'
  allowFullScreen=""
  aria-hidden="false"
  tabIndex="0">

    



@endsection

