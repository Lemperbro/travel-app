@extends('layouts.two')

@section('container')

<div class="mt-5">

    <div class="flex justify-between">
        <div class="">
            <h1 class="font-semibold text-4xl">E-Ticket</h1>
            <h1 class="font-medium ">Pickup</h1>
        </div>


    <img src="img/grup.png" alt="" class="w-80">
    </div>

    <div class="grid-cols-2 flex justify-between border-b-2 border-black">
        <div class="">
        <img src="img/logo.png" alt="" class="w-44 mt-4 mb-2">
    </div>

    <div class="">
        <h1 class="text-sm font-bold">Sunday,01 February 2023</h1>
        <div class="flex">
            <p class="mr-5 text-xs font-semibold">06:00</p>
            <img src="img/Tiket3.png" class="w-2 h-2" alt="">
            <p class="text-xs font-semibold">Bromo,Jawa Timur</p>
        </div>
        <div class="flex">
            <p class="mr-5 text-xs font-semibold">02:15</p>
            <p class="text-xs font-semibold">Surabaya,jawa Timur</p>
        </div>
    </div>

    
</div>

<div class=" flex justify-between border-b-2 border-black">
    <div class="flex">
        <img src="img/ket.png" alt="" class=" object-contain w-20">
        <h1 class="mx-12 text-lg font-semibold w-48">
            Show the ticket and identity of  the customers when checking in
        </h1>
    </div>
    <div class="text-[#FD522C] mr-14 ">
        <h1 class="text-4xl border-b-2 border-black">status</h1>
        <h1 class="text-2xl text-center">Lunas</h1>
    </div>

</div>

<div class="grid-cols-4 flex justify-between border-b-2 border-black">
    <div class="text-center ml-5">
        <h3>No</h3>
        <p>1</p>
        <p>2</p>
        <p>3</p>
        
    </div>

    <div class="text-center">
        <h3>Passengers</h3>
        <p>tono</p>
        <p>budi</p>
    </div>

    <div class="text-center">
        <h3>Type Tour</h3>
        <p>private tour</p>
    </div>
    <div class="mr-5 text-center">
        <h3>Type Ticket</h3>
        <p>adult</p>
    </div>
</div>



</div>


    
@endsection

