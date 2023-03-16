<footer class="mt-32">
    <div class='bg-[#FF2E00] h-44 relative pt-16'>
        <div class='absolute -top-8 left-[50%] transform -translate-x-[50%] flex justify-between bg-[#FD522C] px-8 py-4 rounded-xl w-[80%] shadow-best'>
        <h1 class='text-white text-2xl font-semibold my-auto w-[30%]'>Review & Sugestion</h1>
        <form class='w-[70%] gap-x-8 flex' method="post" action="/review/send">
          @csrf
            <input class='bg-white w-full rounded-lg p-3' placeholder='Write on here please ....' name="description"/>
            <button class='bg-white rounded-full py-2 px-8' type="submit">Send</button>
         </form>
         </div>

<div class="container">
    <div class='flex mt-4 border-black justify-between'>
     <img src='{{ asset('img/logoputih.png') }}' class='h-20'/> 
     <div class='flex gap-x-4 w-[40%]  justify-end'>


     <div class='grid grid-rows-2'> 
     <a  class='text-white font-semibold text-2xl inline-block'>Contact Us</a>
     <a href='about' class='text-white font-semibold text-2xl inline-block'>About Us</a>
     </div>

     <div class='grid grid-rows-2'> 
     <a href="testimoni" class='text-white font-semibold text-2xl inline-block'>Testimoni</a>
     <a href="blog" class='text-white font-semibold text-2xl inline-block'>Blog</a>
 
     </div>
     </div>
    </div>
</div>
  </div>

</footer>

  <script src="./TW-ELEMENTS-PATH/dist/js/index.min.js"></script>
  <script src="{{ asset('js/tap-image.js') }}"></script>
  <script src="{{ asset('js/script.js') }}"></script>


