@extends('layouts.main')


<div class="">
<img src='/gambar/op.png' class=''/>
<h1 class='absolute top-40 text-center text-white left-[50%] -translate-x-[50%] text-3xl font-bold'>ABOUT GROWIN TRAVEL INDONESIA</h1>
</div>


@section('container')
<h1 class="text-center text-2xl">Travel Is About The Human Connection </h1>
<h1 class='text-[#FF2E00] text-3xl font-bold text-center mt-8'>WE ARE GROWIN TRAVEL INDONESIA</h1>
<div class='text-center mb-9'>
    <p>Travel like a human. The human part was always more important than the travel part. What we are about is belonging, and at the center <br> of belonging is love.<br>
    Over the past 10 years, the team at Tour Mount Bromo has always believed in building that relationship with each customers to turn <br>every trip into a memorable experience. It is the human connection that separates a tour/trip and an experience to remember.<br></br>
    We value and love every teammate and we help them to succeed in every way that we can. It is only through being truly passionate ,<br> knowledgeable and focused that we can do the best for our customers.
    </p>
</div>

@include('partials.slider')
<div class='flex mt-10 container justify-between'>
    <div class='w-[60%]  my-auto'>
        <h1 class='text-3xl font-bold'>TRAVEL WITH CONFIDENCE</h1>
        <p class='text-xl mt-9'>Talk to us if you have any concerns about the tour packages.<br>
            We are happy to answer all your questions.
        </p>
  <button class='border shadow-md mt-8 px-8 py-2 mx-8 flex rounded-xl bg-[#FF2E00] text-white font-semibold text-lg'>
    Contact Us Now
  </button>
    </div>
    <img src='/gambar/jeep.png' class='w-[35%]'/>
</div>


<div class="grid-cols-3 flex gap-x-3 mb-24">

  <div class="md:flex bg-slate-100 rounded-xl p-2 h-64 md:p-0 dark:bg-slate-800 mt-8">
    <img class="w-24 h-24 md:w-48 md:h-64 md:rounded-none rounded-full mx-auto" src="img/malang.png" alt="" width="384" height="512">
    <div class="pt-2 md:p-2 text-center md:text-left space-y-2">
      <blockquote>
        <p class="text-lg font-medium">
          “Tailwind CSS is the only framework that I've seen scale
          on large teams. It’s easy to customize, adapts to any design,
          and the build size is tiny.”
        </p>
      </blockquote>
      <figcaption class="font-medium">
        <div class="text-sky-500 dark:text-sky-400">
          Sarah Dayan
        </div>
        <div class="text-slate-700 dark:text-slate-500">
          Staff Engineer, Algolia
        </div>
      </figcaption>
    </div>
  </div>

  <div class="md:flex bg-slate-100 rounded-xl p-2 h-64 md:p-0 dark:bg-slate-800 mt-8">
    <img class="w-24 h-24 md:w-48 md:h-64 md:rounded-none rounded-full mx-auto" src="img/malang.png" alt="" width="384" height="512">
    <div class="pt-2 md:p-2 text-center md:text-left space-y-2">
      <blockquote>
        <p class="text-lg font-medium">
          “Tailwind CSS is the only framework that I've seen scale
          on large teams. It’s easy to customize, adapts to any design,
          and the build size is tiny.”
        </p>
      </blockquote>
      <figcaption class="font-medium">
        <div class="text-sky-500 dark:text-sky-400">
          Sarah Dayan
        </div>
        <div class="text-slate-700 dark:text-slate-500">
          Staff Engineer, Algolia
        </div>
      </figcaption>
    </div>
  </div>

  <div class="md:flex bg-slate-100 rounded-xl p-2 h-64 md:p-0 dark:bg-slate-800 mt-8">
    <img class="w-24 h-24 md:w-48 md:h-64 md:rounded-none rounded-full mx-auto" src="img/malang.png" alt="" width="384" height="512">
    <div class="pt-2 md:p-2 text-center md:text-left space-y-2">
      <blockquote>
        <p class="text-lg font-medium">
          “Tailwind CSS is the only framework that I've seen scale
          on large teams. It’s easy to customize, adapts to any design,
          and the build size is tiny.”
        </p>
      </blockquote>
      <figcaption class="font-medium">
        <div class="text-sky-500 dark:text-sky-400">
          Sarah Dayan
        </div>
        <div class="text-slate-700 dark:text-slate-500">
          Staff Engineer, Algolia
        </div>
      </figcaption>
    </div>
  </div>
  
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

