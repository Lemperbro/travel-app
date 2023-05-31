@extends('layouts.two')

<div class="flex flex-col items-center justify-center min-h-screen font-mono">
    <div class=" w-[70%] h-full mx-auto rounded-xl border">
        <div class="container">
            <div class="py-2 px-2 flex justify-between">
                <div class="">
                    <p class="text-2xl font-semibold">E-Ticket</p>
                    <p class="text-sm">GrowIn Travel</p>
                </div>
                <div class="text-center">
                    <h1 class="text-md">order code</h1>
                    <h1 class="font-semibold">91839489348</h1>
                </div>
            </div>
            <div class="flex items-center mt-2">
                <div class="w-64">
                    <span class="rounded-full bg-white ">
                        <img src="{{ asset('img/logo.png') }}" class="">
                    </span>
                </div>

                <div class="ml-auto px-8 text-center">
                    <h1 class="text-2xl font-bold ">Sunday, 01 February 2023</h1>
                    <h1 class="font-semibold text-lg">
                        Nama Wisata
                    </h1>
                </div>

                <div class="ml-auto px-8 text-center">
                    <h1 class="text-2xl font-semibold">Name Customer</h1>
                    <h1 class="font-semibold text-xl">Adnhi</h1>
                </div>
            </div>

            <div class=" border-black border-b-2 my-5"></div>



            <div class="items-center grid grid-cols-3">
                <div class="flex flex-col">
                    <div class="w-full flex-none text-xl text-orange-600 font-bold leading-none">Pick Up</div>
                    <div class="flex mt-2 w-[150px] gap-x-4">
                        <div class="text-lg">
                            <h1>Kota</h1>
                            <h1>Location</h1>
                        </div>
                        <div class="text-lg">
                            <h1> : </h1>
                            <h1> : </h1>
                        </div>
                        <div class="text-lg">
                            <h1>jagsdfhjgasdf</h1>
                            <h1>ajhjhafsdh</h1>
                        </div>
                    </div>


                </div>

                <div class="flex flex-col ">

                    <div class="w-full flex-none text-xl text-orange-600 font-bold leading-none">Drop Point</div>
                    <div class="flex mt-2 w-[150px] gap-x-4">
                        <div class="text-lg">
                            <h1>Kota</h1>
                            <h1>Location</h1>
                        </div>
                        <div class="text-lg">
                            <h1>:</h1>
                            <h1>:</h1>
                        </div>
                        <div class="text-lg">
                            <h1>jagsdfhjgasdf</h1>
                            <h1>ajhjhafsdh</h1>
                        </div>
                    </div>

                </div>

                <div class=" text-center border-red-600">
                    <h1 class="text-4xl font-semibold text-orange-600">Status</h1>
                    <div class=" border-black border-b-2 my-2 mx-10"></div>
                    <h1 class="text-4xl ">Lunas</h1>

                </div>
            </div>

            <div class=" border-black border-b-2 my-5"></div>

            <div class="grid grid-cols-4">
                <div class="flex text-xl">
                    <h1>guide</h1>
                    <h1>:</h1>
                    <h1>tono</h1>
                </div>

                <div class="flex text-xl">
                    <h1>driver</h1>
                    <h1>:</h1>
                    <h1>konok</h1>
                </div>

                <div class="flex text-xl">
                    <h1>Group</h1>
                    <div class="ml-3">
                        <h1>adult</h1>
                        <h1>child</h1>
                    </div>
                    <div class="">
                        <h1>:</h1>
                        <h1>:</h1>
                    </div>
                    <div class="">
                        <h1>8</h1>
                        <h1>2</h1>
                    </div>
                </div>

                <div class="text-xl">
                    <h1>additional extra</h1>
                    <div class="flex gap-x-8">
                        <div class="">
                            <h1>mobil</h1>
                        </div>

                        <div class="">
                            <h1>:</h1>
                        </div>

                        <div class="">
                            8000
                        </div>


                    </div>

            <div class=" border-black border-b-2 my-5"></div>
                    <div class="">
                        <h1>total</h1>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
