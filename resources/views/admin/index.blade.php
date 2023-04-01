@extends('admin.layouts.main')
    <!-- This is an example component -->

   @section('container')
<div class="mt-10 ">
  
     
 <!-- Grafic start -->
 <div class="flex gap-x-4">
   <div class="w-full max-w-full  mt-0 lg:w-7/12 lg:flex-none ">
     <div class="border-black/12.5 shadow-soft-xl relative z-20 shadow-best4 flex w-full flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
       <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid bg-white p-6 pb-0">
         <h6>Monthly Order Report</h6>
         <p class="leading-normal text-sm">
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
   <!-- w-full flex flex-col shadow-soft-xl justify-between  -->

   <div class="w-full  justify-between grid grid-rows-3 gap-y-4 grid-cols-1 ">
     


     <div class="flex-none w-full bg-white p-4 rounded-md shadow-lg max-w-full ">
       <div class="flex mb-2 mt-7">
         <div class="flex items-center justify-center w-8 h-8 mr-2 text-center bg-center rounded object-cover">
          <img src="img/profile.png" alt="">
         </div>
         <p class="mb-0 mt-1 font-bold text-xl">Users</p>
       </div>

       <h4 class="font-bold">{{ $user }}</h4>

     </div>


     <div class="flex-none w-full bg-[#FEB139] p-4 rounded-md shadow-lg max-w-full  ">
       <div class="flex mb-2 mt-7 justify-center">
         <div class="flex items-center justify-center w-8 h-8 mr-2 text-center bg-center rounded object-cover">
          <img src="img/kota.png" alt="">
         </div>
         <p class="mb-0 mt-1 font-bold text-xl text-white">Kota</p>
       </div>
       <h4 class="font-bold text-center">
        {{ $kota }}
       </h4>

     </div>


     <div class="flex-none w-full bg-white p-4 rounded-md shadow-lg max-w-full">
       <div class="flex mb-2 mt-7">
         <div class="flex items-center justify-center w-8 h-8 mr-2 text-center bg-center rounded object-cover">
          <img src="img/travel.png" alt="">
         </div>
         <p class="mb-0 mt-1 font-bold text-xl">Wisata</p>
       </div>
       <h4 class="font-bold">435K</h4>
       <div class="text-xs h-0.75 flex overflow-visible rounded-lg bg-black" style="width: {{ $wisata }}%;">
         <div class="duration-600 ease-soft -mt-0.38 w-3/10 -ml-px flex h-1.5 flex-col justify-center overflow-hidden whitespace-nowrap rounded-lg bg-slate-700 text-center text-white transition-all" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
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
