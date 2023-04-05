<footer class="mt-32">
    <div class='bg-[#FF2E00] relative p-16'>
        <div class='absolute -top-8 left-[50%] transform -translate-x-[50%] flex justify-between bg-[#FD522C] px-8 py-4 rounded-xl w-[80%] shadow-best'>
        <h1 class='text-white text-2xl font-semibold my-auto w-[30%]'>Review & Sugestion</h1>
        <form class='w-[70%] gap-x-8 flex' method="post" action="/review/send">
          @csrf
            <input class='bg-white w-full rounded-lg p-3' placeholder='Write on here please ....' name="description"/>
            <button class='bg-white rounded-full py-2 px-8' type="submit">Send</button>
         </form>
         </div>

<div class="container">


    <div class='flex mt-4 border-black justify-between gap-x-32'>
    <div class="w-[30%]">
       <img src='{{ asset('img/logoputih.png') }}' class='h-20'/>
       <div class="flex">
       <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="m612 936-263-93-179 71q-17 9-33.5-1T120 883V325q0-13 7.5-23t19.5-15l202-71 263 92 178-71q17-8 33.5 1.5T840 268v565q0 11-7.5 19T814 864l-202 72Zm-34-75V356l-196-66v505l196 66Zm60 0 142-47V302l-142 54v505Zm-458-12 142-54V290l-142 47v512Zm458-493v505-505Zm-316-66v505-505Z" fill="#ffffff"/></svg>
       <p class="text-white font-semibold text-lg px-2">Perum Permata Regency 1 blok 10 no 28 Ngijo Karangploso Malang </p>
      </div>

      <div class="flex">
        <img src="icons/waputih.png" alt="" class="object-cover w-8 mt-2 pl-1">
        <div class="mt-3 pl-2 text-white font-semibold ">
          <a href="" class="">+62 822-3381-9869</a>
        </div>
      </div>

      <div class="flex mt-3">
        <svg xmlns="http://www.w3.org/2000/svg" height="38" viewBox="0 96 960 960" width="38"><path d="M140 896q-24 0-42-18t-18-42V316q0-24 18-42t42-18h680q24 0 42 18t18 42v520q0 24-18 42t-42 18H140Zm340-302L140 371v465h680V371L480 594Zm0-60 336-218H145l335 218ZM140 371v-55 520-465Z" fill="#ffffff"/></svg>
        <p class="mt-1 pl-2 text-white font-semibold text-lg">
          Growintravel@gmail.com
        </p>
      </div>
    </div>
     

    <div class="flex gap-x-44 ">

      <div class="">
        <h1 class="text-white text-3xl font-semibold">Our Service</h1>
        <ul class=" text-white mt-2 text-xl font-semibold pl-1">
          <li class="mt-2"><a href="/wisata/type/open trip">Open Trip</a></li>
          <li class="mt-2"><a href="/wisata/type/single trip">Single Trip</a></li>
          <li class="mt-2"><a href="/wisata/type/private trip">Private Trip</a></li>
        </ul>
      </div>

{{-- 
      <div class="">
        <h1 class="text-white text-3xl font-semibold">Type Tour</h1>
        <ul class=" text-white mt-2 text-xl font-semibold pl-1">
          <li class="mt-2"><a href="/wisata/type/open trip">Open Trip</a></li>
          <li class="mt-2"><a href="/wisata/type/single trip">Single Trip</a></li>
          <li class="mt-2"><a href="/wisata/type/private trip">Private Trip</a></li>
        </ul>
      </div> --}}

      

      <div class="">
        <ul class="text-white mt-2 text-2xl font-semibold ">
          <li class="">
            <a href="/about">About Us</a>
          </li>
          <li class="mt-5">
            <a href="/testimoni">Testimoni</a>
          </li>
          <li class="mt-5">
            <a href="/contact">Contact</a>
          </li>
        </ul>
      </div>


    </div>
     {{-- <div class='flex gap-x-4 w-[40%]  justify-end'>

     <div class='grid grid-rows-2'> 
     <a  class='text-white font-semibold text-2xl inline-block'>Contact Us</a>
     <a href='about' class='text-white font-semibold text-2xl inline-block'>About Us</a>
     </div>

     <div class='grid grid-rows-2'> 
     <a href="testimoni" class='text-white font-semibold text-2xl inline-block'>Testimoni</a>
     <a href="blog" class='text-white font-semibold text-2xl inline-block'>Blog</a>
 
     </div>

     </div> --}}

    </div>

</div>



  </div>

</footer>


<script src="https://unpkg.com/alpinejs" defer=""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="./TW-ELEMENTS-PATH/dist/js/index.min.js"></script>
  <script src="{{ asset('js/tap-image.js') }}"></script>
  <script src="{{ asset('js/script.js') }}"></script>

  



