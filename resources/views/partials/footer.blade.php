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
       <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur eius modi accusantium eligendi dolore harum quia ducimus illum dignissimos nesciunt quos, </p>
    </div>
     

    <div class="flex gap-x-44 ">

      <div class="">
        <h1 class="text-white text-3xl font-semibold">Type Tour</h1>
        <ul class=" text-white mt-2 text-xl">
          <li><a href="/wisata/type/open trip">Open Trip</a></li>
          <li><a href="/wisata/type/single trip">Single Trip</a></li>
          <li><a href="/wisata/type/private trip">Private Trip</a></li>
        </ul>
      </div>

      <div class="flex flex-col justify-between">
       <a href='about' class='text-white font-semibold text-3xl inline-block'>About Us</a>
      <a href="testimoni" class='text-white font-semibold text-3xl inline-block'>Testimoni</a>
        
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

  



