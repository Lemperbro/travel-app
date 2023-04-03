@extends('admin.layouts.main')
    <!-- This is an example component -->

   @section('container')
<div class="mt-10 ">
  

  <div class="grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-2 2xl:grid-cols-3 pb-4 ">

    <div class="items-center justify-between p-4 bg-yellow-300 border border-gray-200 relative rounded-lg shadow-sm dark:border-gray-700 sm:p-6 ">
      <div class="w-full">
        
        <div class="flex justify-between pt-4 pb-12">
          <div>
            <h1 class="font-bold text-6xl">10</h1>
            <h1>Total User</h1>
          </div>

          <svg xmlns="http://www.w3.org/2000/svg" class="w-20 opacity-50" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 288A144 144 0 1 0 256 0a144 144 0 1 0 0 288zm-94.7 32C72.2 320 0 392.2 0 481.3c0 17 13.8 30.7 30.7 30.7H481.3c17 0 30.7-13.8 30.7-30.7C512 392.2 439.8 320 350.7 320H161.3z"/></svg>
        </div>

        <a href="" class="absolute bottom-0  left-0 right-0 bg-yellow-400/50 font-semibold text-lg text-center rounded-b-md p-2">Lihat Detal</a>


      </div>
      <div class="w-full" id="new-products-chart"></div>
    </div>
    {{-- card-1 end --}}


    {{-- card-2 start --}}
    <div class="items-center justify-between p-4 bg-cyan-500 border border-gray-200 relative rounded-lg shadow-sm dark:border-gray-700 sm:p-6 ">
      <div class="w-full">
        
        <div class="flex justify-between pt-4 pb-12">
          <div>
            <h1 class="font-bold text-6xl">10</h1>
            <h1>Total Wisata</h1>
          </div>

          <svg xmlns="http://www.w3.org/2000/svg" class="w-20 opacity-50" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 16c-6.7 0-10.8-2.8-15.5-6.1C201.9 5.4 194 0 176 0c-30.5 0-52 43.7-66 89.4C62.7 98.1 32 112.2 32 128c0 14.3 25 27.1 64.6 35.9c-.4 4-.6 8-.6 12.1c0 17 3.3 33.2 9.3 48H45.4C38 224 32 230 32 237.4c0 1.7 .3 3.4 1 5l38.8 96.9C28.2 371.8 0 423.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7c0-58.5-28.2-110.4-71.7-143L415 242.4c.6-1.6 1-3.3 1-5c0-7.4-6-13.4-13.4-13.4H342.7c6-14.8 9.3-31 9.3-48c0-4.1-.2-8.1-.6-12.1C391 155.1 416 142.3 416 128c0-15.8-30.7-29.9-78-38.6C324 43.7 302.5 0 272 0c-18 0-25.9 5.4-32.5 9.9c-4.7 3.3-8.8 6.1-15.5 6.1zm56 208H267.6c-16.5 0-31.1-10.6-36.3-26.2c-2.3-7-12.2-7-14.5 0c-5.2 15.6-19.9 26.2-36.3 26.2H168c-22.1 0-40-17.9-40-40V169.6c28.2 4.1 61 6.4 96 6.4s67.8-2.3 96-6.4V184c0 22.1-17.9 40-40 40zm-88 96l16 32L176 480 128 288l64 32zm128-32L272 480 240 352l16-32 64-32z"/></svg>
        </div>

        <a href="" class="absolute bottom-0 left-0 right-0 bg-cyan-600/50 font-semibold text-lg text-center rounded-b-md p-2">Lihat Detal</a>


      </div>
      <div class="w-full" id="new-products-chart"></div>
    </div>
    {{-- card-2 end --}}

    {{-- card-3 start --}}

    <div class="items-center justify-between p-4 bg-green-500 border border-gray-200 relative rounded-lg shadow-sm dark:border-gray-700 sm:p-6 ">
      <div class="w-full">
        
        <div class="flex justify-between pt-4 pb-12">
          <div>
            <h1 class="font-bold text-6xl">10</h1>
            <h1>Total Kota</h1>
          </div>

          <svg xmlns="http://www.w3.org/2000/svg" class="w-20 opacity-50" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M219.3 .5c3.1-.6 6.3-.6 9.4 0l200 40C439.9 42.7 448 52.6 448 64s-8.1 21.3-19.3 23.5L352 102.9V160c0 70.7-57.3 128-128 128s-128-57.3-128-128V102.9L48 93.3v65.1l15.7 78.4c.9 4.7-.3 9.6-3.3 13.3s-7.6 5.9-12.4 5.9H16c-4.8 0-9.3-2.1-12.4-5.9s-4.3-8.6-3.3-13.3L16 158.4V86.6C6.5 83.3 0 74.3 0 64C0 52.6 8.1 42.7 19.3 40.5l200-40zM111.9 327.7c10.5-3.4 21.8 .4 29.4 8.5l71 75.5c6.3 6.7 17 6.7 23.3 0l71-75.5c7.6-8.1 18.9-11.9 29.4-8.5C401 348.6 448 409.4 448 481.3c0 17-13.8 30.7-30.7 30.7H30.7C13.8 512 0 498.2 0 481.3c0-71.9 47-132.7 111.9-153.6z"/></svg>
        </div>

        <a href="" class="absolute bottom-0 left-0 right-0 bg-green-600/50 font-semibold text-lg text-center rounded-b-md p-2">Lihat Detal</a>


      </div>
      <div class="w-full" id="new-products-chart"></div>
    </div>
    {{-- card-3 end --}}





  </div>


     
 <!-- Grafic start -->

 <div class="flex gap-x-4">

   <div class="w-full max-w-full mt-0">
     <div class="border-black/12.5 shadow-soft-xl relative z-20 shadow-best4 flex w-full flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
       <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid bg-[#FF8400] p-2 pb-0">
         <h1 class="text-white font-semibold text-lg">Monthly Order Report</h1>
         <p class="leading-normal text-md mt-1">
           <i class="fa fa-arrow-up text-lime-500"></i>
           <span class="font-semibold">4% more</span> in 2021
         </p>
       </div>
       <div class="flex-auto p-4">
         <div>
           <canvas id="chart-line" height="300"></canvas>
         </div>
       </div>
     </div>
   </div>

   <div class="bg-white w-1/3 shadow-best4 rounded-2xl">
    <div class="mt-0 rounded-t-2xl flex justify-center bg-yellow-400">
      <p class="m-2 text-xl text-white font-bold">Late Post</p>
    </div>
   </div>

  </div>









   

 <!-- grafik end -->


  <!-- Table 2 -->
  <div class="flex flex-wrap mt-4">
   <div class="flex-none w-full max-w-full">
     <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white p-4 shadow-best4 border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
       <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
         <h6>Latest Booking</h6>
       </div>
       <div class="flex-auto px-0 pt-0 pb-2">
         <div class="p-0 overflow-x-auto">
           <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">

             <thead class="align-bottom">
               <tr>
                 <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No</th>
                 <th class=" px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Name</th>
                 <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Wisata</th>
                 <th class="px-6 py-3 font-bold  uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Number Phone</th>
                 <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tour Type</th>
                 <th class="px-6 py-3 font-bold uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Order Date</th>
                 <th class="px-6 py-3 font-bold uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status</th>
               </tr>
             </thead>
             @php
             $no = 1;

           @endphp
             @foreach ($latest_booking as $data)

             <tbody>
               <tr>

                 <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                   <p class="text-center font-semibold leading-tight text-xs">{{ $no++ }}</p>
                 </td>
                     
                 <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                  <div class="px-2 py-1">
                  <p class=" text-center leading-tight font-semibold text-sm">{{ $data->user->username }}</p>
               </div>
                 </td>

                 <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                   <p class="font-semibold leading-tight text-xs text-center">{{ $data->wisata->nama_wisata }}</p>
                 </td>
                 <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                  <span class="font-semibold leading-tight text-xs text-center">{{ $data->user->no_tlpn }}</span>
                </td>
                
                 <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                   <span class="font-semibold leading-tight text-xs ">{{ $data->wisata->tour_type }}</span>
                 </td>
                 <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                  <span class="font-semibold leading-tight text-xs  text-center">{{ \Carbon\Carbon::parse($data->created_at)->format('d-F-y') }}</span>
                </td>
                <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                  <span class="font-semibold leading-tight text-xs  text-center {{ ($data->payment_status === 'PENDING') ? 'text-red-600' : '' }} {{ ($data->payment_status === 'PAID') ? 'text-green-600' : '' }}">{{ $data->payment_status }}</span>
                </td>
                


               </tr>

               
             </tbody>
             @endforeach


           </table>
         </div>
       </div>
     </div>
   </div>
 </div>
 <!-- end Table 2 -->
         

      </div>



   @endsection
