@extends('admin.layouts.main')


@section('container')

<div class="px-4 pt-6">
   
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


  <div class="w-full max-w-full mb-4 ">
    <div class="border-black/12.5 shadow-soft-xl relative z-20 shadow-best4 flex w-full flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border dark:bg-gray-800">
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

  {{-- grafic end --}}






    {{-- table Latest Booking start --}}
    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800 mb-4">
      <!-- Card header -->
      <div class="items-center justify-between lg:flex">
        <div class="mb-4 lg:mb-0">
          <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Latest Booking</h3>
        </div>
      </div>
      <!-- Table -->
      <div class="flex flex-col mt-6">
        <div class="overflow-x-auto rounded-lg">
          <div class="inline-block min-w-full align-middle">
            <div class="overflow-hidden shadow sm:rounded-lg">
              <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                <thead class="bg-gray-50 dark:bg-gray-700">
                  <tr>
                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                      no
                    </th>
                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                      Name
                    </th>
                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                      Wisata
                    </th>
                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                      Number Phone
                    </th>
                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                      Tour Type
                    </th>
                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                      Order Date
                    </th>
                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                      Status
                    </th>
                  </tr>
                </thead>

                @php
                $no = 1;
   
              @endphp

                <tbody class="bg-white dark:bg-gray-800">
              @foreach ($latest_booking as $data)

                  <tr>
                    <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    <p class="text-center font-semibold leading-tight text-xs">{{ $no++ }}</p>
                      
                    </td>
                    <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                   <p class=" text-center leading-tight font-semibold text-sm">{{ $data->user->username }}</p>
                      
                    </td>
                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    <p class="font-semibold leading-tight text-xs text-center">{{ $data->wisata->nama_wisata }}</p>
                      
                    </td>
                    <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                   <span class="font-semibold leading-tight text-xs text-center">{{ $data->user->no_tlpn }}</span>
                     
                    </td>
                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    <span class="font-semibold leading-tight text-xs ">{{ $data->wisata->tour_type }}</span>
                      
                    </td>
                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                   <span class="font-semibold leading-tight text-xs  text-center">{{ \Carbon\Carbon::parse($data->created_at)->format('d-F-y') }}</span>
                   
                    </td>
                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                      <span class="font-semibold leading-tight text-xs  text-center {{ ($data->payment_status === 'PENDING') ? 'text-red-600' : '' }} {{ ($data->payment_status === 'PAID') ? 'text-green-600' : '' }}">{{ $data->payment_status }}</span>
                    </td>
  
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      @if ($latest_booking->count() > 0)
        
      <!-- Card Footer -->
      <div class="flex items-center justify-between pt-3 sm:pt-6 float-right">
  
        <div class="flex-shrink-0 ">
          <a href="#" class="inline-flex items-center p-2 text-xs font-medium uppercase rounded-lg text-primary-700 sm:text-sm hover:bg-gray-100 dark:text-primary-500 dark:hover:bg-gray-700">
           Lihat Selengkapnya
            <svg class="w-4 h-4 ml-1 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
          </a>
        </div>
      </div>
      @endif
</div>

  {{-- ini statistik --}}

 
    {{-- <div class="grid gap-4 xl:grid-cols-2 2xl:grid-cols-3">
      <!-- Main widget -->
      <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="flex items-center justify-between mb-4">
          <div class="flex-shrink-0">
            <span class="text-xl font-bold leading-none text-gray-900 sm:text-2xl dark:text-white">$45,385</span>
            <h3 class="text-base font-light text-gray-500 dark:text-gray-400">Sales this week</h3>
          </div>
          <div class="flex items-center justify-end flex-1 text-base font-medium text-green-500 dark:text-green-400">
            12.5%
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z"
                clip-rule="evenodd"></path>
            </svg>
          </div>
        </div>
        <div id="main-chart"></div>
        <!-- Card Footer -->
        <div class="flex items-center justify-between pt-3 mt-4 border-t border-gray-200 sm:pt-6 dark:border-gray-700">
          <div>
            <button class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 rounded-lg hover:text-gray-900 dark:text-gray-400 dark:hover:text-white" type="button" data-dropdown-toggle="weekly-sales-dropdown">Last 7 days <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
            <!-- Dropdown menu -->
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="weekly-sales-dropdown">
                <div class="px-4 py-3" role="none">
                  <p class="text-sm font-medium text-gray-900 truncate dark:text-white" role="none">
                    Sep 16, 2021 - Sep 22, 2021
                  </p>
                </div>
                <ul class="py-1" role="none">
                  <li>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Yesterday</a>
                  </li>
                  <li>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Today</a>
                  </li>
                  <li>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Last 7 days</a>
                  </li>
                  <li>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Last 30 days</a>
                  </li>
                  <li>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Last 90 days</a>
                  </li>
                </ul>
                <div class="py-1" role="none">
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Custom...</a>
                </div>
            </div>
          </div>
          <div class="flex-shrink-0">
            <a href="#" class="inline-flex items-center p-2 text-xs font-medium uppercase rounded-lg text-primary-700 sm:text-sm hover:bg-gray-100 dark:text-primary-500 dark:hover:bg-gray-700">
              Sales Report
              <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>
          </div>
        </div>
      </div>
      <!--Tabs widget -->

    </div> --}}



@endsection