@extends('admin.layouts.main')
    <!-- This is an example component -->

   @section('container')
<div class="mt-10 ">
  

  <div class="grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-2 2xl:grid-cols-3 pb-4 ">

    <div class="items-center justify-between p-4 bg-yellow-300 border border-gray-200 relative rounded-lg shadow-sm dark:border-gray-700 sm:p-6 ">
      <div class="w-full">
        
        <div class="flex justify-between pt-4 pb-12">
          <div>
            <h1 class="font-bold text-6xl">{{ $user }}</h1>
            <h1>User Totals</h1>
          </div>

          <svg xmlns="http://www.w3.org/2000/svg" class="w-20 opacity-50" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 288A144 144 0 1 0 256 0a144 144 0 1 0 0 288zm-94.7 32C72.2 320 0 392.2 0 481.3c0 17 13.8 30.7 30.7 30.7H481.3c17 0 30.7-13.8 30.7-30.7C512 392.2 439.8 320 350.7 320H161.3z"/></svg>
        </div>

        <a href="/user" class="absolute bottom-0  left-0 right-0 bg-yellow-400/50 font-semibold text-lg text-center rounded-b-md p-2">see details</a>


      </div>
      <div class="w-full" id="new-products-chart"></div>
    </div>
    {{-- card-1 end --}}


    {{-- card-2 start --}}
    <div class="items-center justify-between p-4 bg-cyan-500 border border-gray-200 relative rounded-lg shadow-sm dark:border-gray-700 sm:p-6 ">
      <div class="w-full">
        
        <div class="flex justify-between pt-4 pb-12">
          <div>
            <h1 class="font-bold text-6xl">{{ $wisata }}</h1>
            <h1>Tours Totals</h1>
          </div>
          <img src="icons/around.png" alt="" class="w-24 object-cover">
        </div>

        <a href="/admin/wisata" class="absolute bottom-0 left-0 right-0 bg-cyan-600/50 font-semibold text-lg text-center rounded-b-md p-2">see details</a>


      </div>
      <div class="w-full" id="new-products-chart"></div>
    </div>
    {{-- card-2 end --}}

    {{-- card-3 start --}}

    <div class="items-center justify-between p-4 bg-green-500 border border-gray-200 relative rounded-lg shadow-sm dark:border-gray-700 sm:p-6 ">
      <div class="w-full">
        
        <div class="flex justify-between pt-4 pb-12">
          <div>
            <h1 class="font-bold text-6xl">{{ $kota }}</h1>
            <h1>City Totals</h1>
          </div>

         <img src="icons/skyline.png" alt="" class="w-24 object-cover">
        </div>

        <a href="/admin/kota" class="absolute bottom-0 left-0 right-0 bg-green-600/50 font-semibold text-lg text-center rounded-b-md p-2">see details</a>


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
