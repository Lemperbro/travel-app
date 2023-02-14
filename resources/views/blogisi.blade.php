@extends('layouts.main')

<div class="grid grid-cols-2 bg-[#FD522C]  my-20">
    
    <div class="mx-9 my-8">
        <h1 class="text-white text-4xl font-semibold">
            What You Must Visit <br> In Bali
        </h1>
        <h1 class="my-20 text-white font-serif text-3xl">
            Published On Januari 2023
        </h1>
        <h1 class="my-2 text-white font-serif text-3xl">
            By Billpath dev
        </h1>
        <h1 class="my-8 text-center font-bold text-white text-2xl">
            Share With Your Friends :
        </h1>
        <div class="flex justify-center gap-x-4">
        <img src="icons/fbputih.png" alt="" class="justify-center object-cover">
        <img src="icons/waputih.png" alt="" class="justify-center w-16 h-16 mt-2">
        <img src="icons/igputih.png" alt="" class="justify-center object-cover">
        </div>
        
    </div>

    <div class="">
        <img src="img/garuda.png" alt="" class="object-cover">
    </div>
</div>  

@section('container')
<img src="img/p.png" alt="" class="object-cover">
<h1 class="text-xl text-justify my-7">
    There’s no such thing as ‘the real Indonesia’. as there are many ‘real’ versions of Indonesia. The forests of Sumatra, the volcanoes of Java, hiking the Ijen Crater, the villages of Bali and the stunning beaches of Raja Ampat are all facets of this huge and diverse country, home to over 800 million people and a variety of religions, traditions and cultures.
</h1>
<h1 class="text-xl text-justify my-7">
    Bali is one of the popular tourist destinations in Indonesia, its natural beauty is a destination that is hunted by both domestic and foreign tourists.
    
    It's no wonder that many people want to set foot on the Island of the Gods, which has natural beauty with a strong blend of culture.
</h1>

<div class="flex w-[50%] gap-x-5">
    <img src="img/blogi.png" alt="">
    <img src="img/blogi.png" alt="">
</div>

<h1 class="text-xl text-justify my-7">
Ubud tourist attractions have many choices of holiday objects and holiday activities such as Ayung Rafting. Of the many choices of tourist attractions in Ubud, Ubud Monkey Forest has always been a favorite tourist spot for tourists who are on vacation to Bali for the first time.
</h1>

<h1 class="text-xl text-justify my-7">
Interesting things that tourists can see while on vacation to Ubud Monkey Forest such as;
Protected forest area with very tall trees. Tourists can see long-tailed monkeys. In the Ubud Monkey Forest area there is a temple.
</h1>


<div class="grid grid-cols-2 my-28">

    <div class="border w-[70%]">
        <a href="" class="flex">
        <img src="icons/left.png" alt="" class="object-contain">
        <div class="">
            <h1 class="text-[#FF2E00] my-4">Previous</h1>
            <h1>
                Concise Guide To Mount Bromo
            </h1>
        </div>
        </a>
    </div>

    <div class="border w-full">
        <a href="" class="flex justify-end w-70%">
            <div class="justify-end">
                <h1 class="text-[#FF2E00] my-4 justify-end">next</h1>
                <h1>
                    Concise Guide To Mount Bromo
                </h1>
            </div>
        <img src="icons/right.png" alt="" class="object-contain">
        </a>
    </div>

    <div class="">

    </div>

</div>


    
@endsection
