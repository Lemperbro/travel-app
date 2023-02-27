@extends('layouts.main')
@section('container')

    <div>  
      <div class='bg-[#D9D9D9] w-[45%] px-8 relative m-20 p-10 transform translate-x-[70%]'>

      <div class='grid-cols-2 w-[60%] grid  gap-4 grid-rows-2 mx-14 my-8 absolute -left-[55%]'>
            <button class='border bg-[#FD522C] rounded py-5'>
              <img src='icons/ig.png' class='mx-auto w-20 object-contain'/>
              <h1 class='text-center mt-4'>Instagram</h1>
            </button>
            <button class='border bg-[#FF2E00] rounded py-5'>
              <img src='icons/wa.png' class='mx-auto w-20 object-contain'/>
              <h1 class='text-center mt-4'>Whatsapp</h1>
            </button>
            <button class='border bg-[#FF2E00] rounded py-5'>
              <img src='icons/fb.png' class='mx-auto w-20 object-contain'/>
              <h1 class='text-center mt-4'>Facebook</h1>
            </button>
            <button class='border bg-[#FD522C] rounded py-5'>
              <img src='icons/gmail.png' class='mx-auto w-20 object-contain'/>
              <h1 class='text-center mt-4'>Gmail</h1>
            </button>
      </div>

        <form class='ml-32'>
          <img src='/img/logo.png' class='mx-auto w-40'/>
          <h1 class='font-semibold text-4xl text-center'>Contact Us</h1>
          <input class='w-full h-10 bg-white rounded-xl mt-4 '/>
          <input class='w-full h-10 bg-white rounded-xl mt-4 '/>
          <textarea class='bg-white h-44 w-full mt-4'>
          <a class='flex mx-auto border shadow-md text-center m-5 w-32 px-9 py-1 rounded-xl bg-[#FF2E00] text-white font-semibold '>
              Submit
          </a>
        </form>
      </div>    
    </div>

    
@endsection