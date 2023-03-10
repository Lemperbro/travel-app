@extends('admin.layouts.main')

@section('container')

        <!-- Client Table -->
        <div class="p-8 rounded-lg">
          <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto bg-gray-50">


            <form class="w-[80%] mx-auto my-5" action="/admin/booking">   
              <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
              <div class="relative">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                      <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                  </div>
                  <input type="search" id="default-search" name="search" value="{{ request('search') }}" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos...">
                  <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
              </div>
            </form>


              <table class="w-full">
                <thead>
                  <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="border px-4 py-3">No</th>
                    <th class="border px-4 py-3">No Order</th>
                    <th class="border px-4 py-3">Client</th>
                    <th class="px-2 border">Amount</th>
                    <th class="px-2 border">Destination</th>
                    <th class="px-2 border">Type Tour</th>
                    <th class="px-4 py-3">Date</th>
                    <th class="px-4 py-3">Status</th>
                  </tr>
                </thead>

                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                  @php
                    $no = 1;
                  @endphp
                  @foreach ($data as $data)
                    
                  <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3 text-sm">{{ $no++ }}</td>

                    <td class="px-4 py-3 text-sm">{{ $data->doc_no }}</td>

                    <td class="px-4 py-3">
                      <div class="flex items-center text-sm">
                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                          <img class="object-cover w-full h-full rounded-full" src="{{ asset('ft_user/'.$data->user->image) }}" alt="" loading="lazy" />
                          <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                        </div>
                        <div>
                          <p class="font-semibold">{{ $data->user->username }}</p>
                        </div>
                      </div>
                    </td>

                    <td class="px-4 py-3 text-sm">Rp. {{ $data->amount }}</td>

                    <td class="px-4 py-3 text-sm">{{ $data->wisata->nama_wisata }}</td>

                    <td class="px-4 py-3 text-sm">{{ $data->wisata->tour_type }}</td>
                    <td class="px-4 py-3 text-sm">{{ \Carbon\Carbon::parse($data->created_at)->format('d-F-y') }}</td>

                    <td class="px-4 py-3 text-xs">
                      <span class="px-2 py-1 font-semibold leading-tight rounded-full {{ ($data->payment_status === 'PENDING') ? 'text-yellow-700 bg-yellow-100' : ''}}  {{ ($data->payment_status === 'PAID') ? 'text-green-700 bg-green-100' : ''}}">{{ $data->payment_status }}</span>
                    </td>

                  </tr>
                  @endforeach

                  
                </tbody>
              </table>

              

              @if ($data->count() === 0)
                <h1 class="text-center text-2xl p-4">kosong</h1>
              @endif
            </div>



          </div>
        </div>
    
@endsection