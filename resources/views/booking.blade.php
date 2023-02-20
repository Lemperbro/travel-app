@extends('layouts.main')

    <div>
        <div>
        <img src='img/2.png' class='h-[58vh] w-full object-cover'/>
        <h1 class='absolute top-48 text-center text-white left-[50%] -translate-x-[50%] text-4xl font-bold'>SELECT YOUR PREFERRED DESTINATION</h1>
        </div>
@section('container')
<div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">

<a href="#">
    <div class="rounded overflow-hidden shadow-best4 mb-16">
      <img class="w-full" src="img/2.png" alt="Mountain">
      <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2">Mountain</div>
        <p class="text-gray-700 text-base">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, Nonea! Maiores et perferendis eaque, exercitationem praesentium nihil.
        </p>
      </div>

      <div class="px-6 pt-4 pb-2">
        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"></span>
      </div>
    </div>
</a>
    

</div>
@endsection

    </div>