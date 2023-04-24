@extends('admin.layouts.main')

@section('container')

        <!-- Client Table -->
        <div class="p-8 rounded-lg">
          <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto bg-gray-50 p-2">


            <form class="w-[80%] mx-auto my-5 flex gap-x-4" action="/admin/booking">   
              <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
              <select name="status" id="" class="border-[1px] border-slate-300 rounded-md ">
                <option value="" selected>STATUS</option>
                <option value="PAID" {{ (request('status') === 'PAID')? 'selected' : '' }}>PAID</option>
                <option value="PENDING" {{ (request('status') === 'PENDING')? 'selected' : '' }}>PENDING</option>
                <option value="EXPIRED" {{ (request('status') === 'EXPIRED')? 'selected' : '' }}>EXPIRED</option>
              </select>
              <div class="relative w-full">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                      <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                  </div>
                  <input type="search" id="default-search" name="search" value="{{ request('search') }}" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search">
                  <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
              </div>
            </form>


              <table class="w-full">
                <thead>
                  <tr class="text-xs font-semibold tracking-wide text-gray-700 uppercase border-b dark:border-gray-700 bg-gray-300 dark:text-gray-400 dark:bg-gray-800 text-center">
                    <th class="border px-4 py-3">No</th>
                    <th class="border px-4 py-3">No Order</th>
                    <th class="border px-4 py-3">Client</th>
                    <th class="px-2 border">Amount</th>
                    <th class="px-2 border">Destination</th>
                    <th class="px-2 border">Type Tour</th>
                    <th class="px-4 py-3 border">Date</th>
                    <th class="px-4 py-3 border">Status</th>
                  </tr>
                </thead>

                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800 border ">
                  @php
                    $no = 1;
                  @endphp
                  @foreach ($data as $datas)
                    
                  <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3 text-sm border text-center">{{ $no++ }}</td>

                    <td class="px-4 py-3 text-sm text-center border">{{ $datas->doc_no }}</td>

                    <td class="flex px-4 py-3 justify-center">
                      <div class="flex items-center text-sm">
                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                          <img class="object-cover w-full h-full rounded-full" src="{{ asset('ft_user/'.$datas->user->image) }}" alt="" loading="lazy" />
                          <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                        </div>
                        <div>
                          <p class="font-semibold text-center">{{ $datas->user->username }}</p>
                        </div>
                      </div>
                    </td>

                    <td class="px-4 py-3 text-sm border text-center">Rp. {{ $datas->amount }}</td>

                    <td class="px-4 py-3 text-sm border text-center">{{ $datas->wisata->nama_wisata }}</td>

                    <td class="px-4 py-3 text-sm border text-center">{{ $datas->wisata->tour_type }}</td>
                    <td class="px-4 py-3 text-sm border text-center">{{ \Carbon\Carbon::parse($datas->created_at)->format('d-F-Y ') }}</td>

                    <td class="px-4 py-3 text-xs text-center">
                      <span class="px-2 py-1 font-semibold leading-tight rounded-full {{ ($datas->payment_status === 'PENDING') ? 'text-yellow-700 bg-yellow-100' : ''}}  {{ ($datas->payment_status === 'PAID') ? 'text-green-700 bg-green-100' : ''}}">{{ $datas->payment_status }}</span>
                    </td>

                  </tr>
                  @endforeach

                  
                </tbody>
              </table>

              

              @if ($data->count() === 0)
                <h1 class="text-center text-2xl p-4">kosong</h1>
              @endif

              {{ $data->links('vendor.pagination.tailwind') }}
            </div>



          </div>
        </div>

        <div class="bg-white p-4 shadow-best rounded-md my-10">
  

          <form class="w-[80%] mx-auto my-5" action="/supir/">   
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="search" id="default-search" name="search" value="{{ request('search') }}" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="">
                <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
          </form>
        
                 {{-- <button type="button"
                 class="inline px-6 py-2.5 bg-blue-600 text-white font-bold text-sm  uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" 
                 data-bs-toggle="modal" data-bs-target="#exampleModalLong">
                 ADD GUIDE
                 </button> --}}
        
                 <div class="flex flex-col mt-8 rounded-lg ">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                      <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
        
        
                          <table class="w-full">
                            <thead>
                              <tr class="text-xs font-semibold tracking-wide text-gray-700 uppercase border-b dark:border-gray-700 bg-gray-300 dark:text-gray-400 dark:bg-gray-800 text-center">
                                <th class="border px-4 py-3">No</th>
                                <th class="border px-4 py-3">Customer</th>
                                <th class="border px-4 py-3">Destination</th>
                                <th class="border px-4 py-3">Type</th>
                                <th class="px-2 border">Guide</th>
                                <th class="px-2 border">Driver</th>
                                <th class="px-2 border">Action</th>
                              </tr>
                            </thead>
            
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800 border ">
        
                              @foreach ($data as $no => $user)
                              <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm border text-center">{{ $no+1 }}</td>
        
                                <td class="px-4 py-3 text-sm border text-center w-32 h-32 object-cover"> 
                                   {{ $user->nama }}
                                </td>
        
        
                                <td class="px-4 py-3  border text-center w-32 h-32 object-cover">
                                  <img src="{{ asset('image/'.$user->image) }}" alt="">
                                </td>
            
                                <td class="px-4 py-3 text-sm border text-center">
                                  {{ $user->no_tlpn }}
                                </td>
            
                                <td class="px-4 py-3 text-sm border text-center">
                                  {{ $user->alamat }}
                                </td>
            
                                <td class="px-4 py-3 text-sm border text-center">
                                  
                                </td>
            
                                <td class="px-4 py-10 text-sm text-center flex gap-x-4 justify-center">
                                  <button type="button"
                                  class="inline-block px-2 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-[40%]"
                                  data-bs-toggle="modal" data-bs-target="#exampleModalLong-{{ $user->id }}">
                                  Edit
                                  </button>
                                   <form action="admin/guide/delete/{{ $user->id }}" method="post" class="">
                                      @csrf
                                      <button type="submit" class="bg-red-600 p-2 rounded-md text-white">Delete</button>
                                   </form>
                                </td>
            
                              </tr>
                              @endforeach
            
                              
                            </tbody>
                          </table>
        
        
        
        
                          
                        </div>
                      </div>
                    </div>
                  </div>
              
           </div>
    
@endsection