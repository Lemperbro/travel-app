@extends('admin.layouts.main')

@section('container')
    
<main class="pt-20 -mt-2">
  <div class="mx-auto p-2">
    <!-- row -->
    <div class="flex flex-wrap flex-row">
      <div class="flex-shrink max-w-full px-4 w-full">   
        <p class="text-xl font-bold mt-3 mb-5 dark:text-white">Confirmation Booking</p>
      </div>                                                 
      <div class="flex-shrink max-w-full px-4 w-full mb-6">
        <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg h-full">
          <div class="flex flex-wrap flex-row -mx-4">
            <div class="flex-shrink max-w-full px-4 w-full">
                <div class="mb-14">
                  <div id="bulk-actions">
                    <label class="flex flex-wrap flex-row">
                      <select id="bulk_actions" name="bulk_actions" class="inline-block leading-5 relative py-2 ltr:pl-3 ltr:pr-8 rtl:pr-3 rtl:pl-8 mb-3 rounded bg-gray-100 border border-gray-200 overflow-x-auto focus:outline-none focus:border-gray-300 focus:ring-0 dark:text-gray-300 dark:bg-gray-700 dark:border-gray-700 dark:focus:border-gray-600 select-caret appearance-none">
                        <option value="">Action</option>
                        <option value="activate">Activate</option>
                        <option value="blocked">Blocked</option>
                      </select>        
                      <input type="submit" id="bulk_apply" class="ltr:ml-2 rtl:mr-2 py-2 px-4 inline-block text-center mb-3 rounded leading-5 border hover:bg-gray-300 dark:bg-gray-900 dark:bg-opacity-40 dark:text-white dark:border-gray-800 dark:hover:bg-gray-900 focus:outline-none focus:ring-0 cursor-pointer" value="Apply">
                    </label>
                  </div>
                </div>
                @if ($errors->any())
                  

                @foreach ($errors->all() as $error)
                <div class="flex mb-1 text-sm text-red-800 dark:text-red-400" role="alert">
                  <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                  <span class="sr-only">Info</span>
                  <div>
                    <span class="font-medium">Error </span>{{ $error }} 
                  </div>
                </div>
                @endforeach

                @endif
              <div class="w-full mb-6">
                <form action="#">
                  <table class="table-sorter table-bordered w-full text-gray-600 dark:text-gray-400">
                    <thead>
                      <tr class="bg-gray-100 dark:bg-gray-900 dark:bg-opacity-40">
                        <th class="hidden sm:table-cell py-4">Customers</th>
                        <th class="hidden sm:table-cell py-4">Email</th>
                        <th class="hidden lg:table-cell py-4">Departure</th>
                        <th class="hidden lg:table-cell py-4">Status</th>
                        <th class="text-center hidden lg:table-cell py-4">Booking Number</th>
                        <th data-sortable="false">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                        $no= 1;
                      @endphp
                      @foreach ($data as $client)
                        
                      <tr class="border-b-[1px] border-gray-300 dark:border-gray-700">
      
                        <td class="py-4">
                            <div class="flex items-center justify-center m-auto gap-x-4">
                                <img class="h-8 w-8 rounded-full" src="{{ asset('ft_user/'.$client->user->image) }}">
                                <h1 class="leading-3">{{ $client->user->username }}</h1>
                            </div>
                        </td>
                        <td class="hidden sm:table-cell text-center">{{ $client->user->email }}</td>
                        <td class="hidden lg:table-cell text-center">{{ \Carbon\Carbon::parse($client->created_at)->format('d-F-Y') }}</td>
                        <td class="hidden lg:table-cell text-center">
                          <span class="text-sm px-2 py-1 font-semibold leading-tight {{ ($client->status == 'menunggu') ? 'text-yellow-700 bg-yellow-100' : '' }} {{ ($client->status == 'ditolak') ? 'bg-red-600 text-white' : '' }} rounded-full">{{ $client->status }}</span>
                        </td>
                        <td class="text-center hidden lg:table-cell">{{ $client->doc_no }}</td>
                        <td class="text-center ">
                          <div class="flex justify-center m-auto gap-x-4">
                          <div class="view_booking" data-target="view_booking_area_{{ $loop->iteration }}">

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="24" height="24" class="eye_open_view_booking_area_{{ $loop->iteration }} fill-cyan-400"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>


                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="24" height="24" class="eye_close_view_booking_area_{{ $loop->iteration }} fill-cyan-400 hidden"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"/></svg>

                            

                          </div>
                          <h1 class="cursor-pointer bg-white rounded-full inline-block ltr:mr-2 rtl:ml-2 hover:text-red-500" data-bs-toggle="modal" data-bs-target="#cancel-{{ $client->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(220, 20, 60, 1)"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                          </h1>

                          <h1 class="cursor-pointer bg-white rounded-full inline-block ltr:mr-2 rtl:ml-2 hover:text-green-500" data-bs-toggle="modal" data-bs-target="#exampleModalLong-{{ $client->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba( 0, 128, 0, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                          </h1>
                        </div>
                        </td>
                      </tr>
                      <tr class="border-b-[1px] border-gray-300 dark:border-gray-700 hidden view_booking_area" id="view_booking_area_{{ $loop->iteration }}">
                        <td class="py-4" colspan="6">

                            <div class="w-full grid grid-cols-6">
                              
                            <div class="text-center">
                              <h1 class="text-gray-900 dark:text-white font-semibold">Order Quantity</h1>
                              <h3 class="text-gray-900 dark:text-white ">
                                @if ($client->adult !== null || $client->child !== null)
                                {{ $client->adult + $client->child }}
                                @else
                                1
                                @endif
                              </h3>
                            </div>

                            <div class="text-center">
                              <h1 class="text-gray-900 dark:text-white font-semibold">Pickup Point</h1>
                              <h3 class="text-gray-900 dark:text-white ">{{ $client->pickup_kota }} - {{ $client->pickup_point }}</h3>
                            </div>


                            <div class="text-center">
                              <h1 class="text-gray-900 dark:text-white font-semibold">Dropout Point</h1>
                              <h3 class="text-gray-900 dark:text-white ">{{ $client->drop_kota }} - {{ $client->drop_point }}</h3>
                            </div>


                            <div class="text-center">
                              <h1 class="text-gray-900 dark:text-white font-semibold">Total</h1>
                              <h3 class="text-gray-900 dark:text-white ">{{ number_format($client->amount,0,',','.') }}</h3>
                            </div>

                            <div class="text-center">
                              <h1 class="text-gray-900 dark:text-white font-semibold">Payment Type</h1>
                              <h3 class="text-gray-900 dark:text-white ">
                                @if ($client->dp !== null)
                                
                                Dp (Rp. {{ number_format($client->dp,0,',','.') }})
                                @else
                                Full
                                @endif
                              </h3>
                            </div>
                            
                            <div class="text-center">
                              <h1 class="text-gray-900 dark:text-white font-semibold">Extra</h1>
                              @if ($client->extra_id !== null)
                              
                              @php
                              $explode_extra = explode(',', $client->extra_id);
                              $array_map = array_map('intval', $explode_extra);
                              
                              $extra = App\Models\Extra::whereIn('id',$array_map)->get();
                              @endphp
                              <div class="flex justify-center">
                                <ul class="list-disc">
                                  @foreach ($extra as $extras)
                                  <li class="text-left">{{ $extras->judul }}</li>
                                  @endforeach
                                </ul>
                              </div>
                              @else
                              Nothing
                              @endif
                            </div>
                            
                          </div>

                        </td>
                        </tr>
                        
                      @endforeach

                    </tbody>
                  </table>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
</div>
</div>



{{-- Confirmation Modal --}}

{{-- <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto "
id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLongLabel" aria-hidden="true">
<div class="modal-dialog relative w-auto pointer-events-none">
  <div
    class="modal-content border-none shadow-lg relative flex flex-col w-[500px] pointer-events-auto dark:bg-slate-700 bg-white bg-clip-padding rounded-md outline-none text-current m-auto">
    <div
      class="modal-header flex flex-shrink-0 items-center justify-between p-4 rounded-t-md">
         
         <form action="#" method="POST" class="w-full px-4">
            <h1 class="text-center font-semibold text-2xl dark:text-white">Confirmation Orders</h1>
            <div class="relative p-4 text-center text-2xl dark:text-white">
              Modal body text goes here.
            </div>
          </div>

            <div class="text-center my-5 flex gap-x-2 mx-auto justify-center">
            <button type="submit" class="bg-red-600 px-4 py-2 text-white rounded-md">Cancel</button>
            <a href="" class="bg-green-600 py-2 px-4 rounded-md text-white">Confirmation</a>
        </div>
        </form>

    </div>

  </div>
</div>
</div> --}}


{{-- modal confirm start --}}
@foreach ($data as $confirm)
  
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto "
id="exampleModalLong-{{ $confirm->id }}" tabindex="-1" aria-labelledby="exampleModalLongLabel" aria-hidden="true">
<div class="modal-dialog relative w-auto pointer-events-none">
  <div
    class="modal-content border-none shadow-lg relative flex flex-col w-[800px] pointer-events-auto dark:bg-slate-700 bg-white bg-clip-padding rounded-md outline-none text-current m-auto">
    <div
      class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
         
         <form action="/admin/booking/confirmation/{{ $confirm->id }}" method="POST" class="w-full px-4" >
          @csrf
            <h1 class="text-center font-semibold text-2xl dark:text-white">Confirmation</h1>


            <div class="mt-4">
              <div class="">
                  <label for="harga" class="font-bold mb-1 text-gray-900 dark:text-white block">Driver</label>
                  <select type="text" name="driver" class="w-full px-4 py-3 rounded-lg border-none  font-medium bg-gray-200 dark:bg-gray-900 text-gray-900 dark:text-white">
                    <option selected>Select Driver</option>
                    @foreach ($driver as $drivers)                      
                    <option value="{{ $drivers->id }}">{{ $drivers->nama }}</option>
                    @endforeach

                    </select>
              </div>

              <div class="mt-4">
                <label for="harga" class="font-bold mb-1 text-gray-900 dark:text-white block">Vehicle</label>
                <select type="text" name="vehicle" class="w-full px-4 py-3 rounded-lg border-none  font-medium bg-gray-200 dark:bg-gray-900 text-gray-900 dark:text-white">
                  <option selected>Select Vehicle</option>
                  @foreach ($vehicle as $vehicles)
                    <option value="{{ $vehicles->id }}">{{ $vehicles->merek }}</option>
                  @endforeach
                </select>
            </div>

              <div class="mt-4">
                  <label for="departure" class="font-bold mb-1 text-gray-900 dark:text-white block">Guide</label>
                  <select type="text" name="guide" class="w-full px-4 py-3 rounded-lg border-none  font-medium bg-gray-200 dark:bg-gray-900 text-gray-900 dark:text-white">
                    <option selected>Select Guide</option>
                    @foreach ($guide as $guides)
                      <option value="{{ $guides->id }}">{{ $guides->nama }}</option>
                    @endforeach
                  </select>
              </div>
          </div>

            <div class="text-center mt-8 flex gap-x-2 mx-auto justify-center">
            <button type="button" class="bg-red-600 px-4 py-2 text-white rounded-md" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="bg-green-600 py-2 px-4 rounded-md text-white">Confirmation</button>
        </div>
        </form>

    </div>

  </div>
</div>
</div>
@endforeach

{{-- modal confirm end --}}


{{-- modal cancel start --}}
@foreach ($data as $cancel)
  
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto "
id="cancel-{{ $cancel->id }}" tabindex="-1" aria-labelledby="exampleModalLongLabel" aria-hidden="true">
<div class="modal-dialog relative w-auto pointer-events-none">
  <div
    class="modal-content border-none shadow-lg relative flex flex-col w-[800px] pointer-events-auto dark:bg-slate-700 bg-white bg-clip-padding rounded-md outline-none text-current m-auto">
    <div
    class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
    
    <form action="/admin/booking/confirmation/cancel/{{ $cancel->id }}" method="POST" class="w-full px-4">
      @csrf
      <h1 class="text-center font-semibold text-2xl dark:text-white">apakah kamu yakin mau menolak Client ?</h1>
      
      <div class="text-center mt-8 flex gap-x-2 mx-auto justify-center">
        <button type="button" class="bg-red-600 px-4 py-2 text-white rounded-md" data-bs-dismiss="modal">No</button>
        <button type="submit" class="bg-green-600 py-2 px-4 rounded-md text-white">Yes</button>
      </div>
    </form>
    
  </div>
  
</div>
</div>
</div>
@endforeach
{{-- modal cancel end --}}




     @endsection
