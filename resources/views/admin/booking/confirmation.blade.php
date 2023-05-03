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
              <div class="w-full mb-6">
                <form action="#">
                  <table class="table-sorter table-bordered w-full text-gray-600 dark:text-gray-400">
                    <thead>
                      <tr class="bg-gray-100 dark:bg-gray-900 dark:bg-opacity-40">
                        <th class="hidden sm:table-cell py-4">Customers</th>
                        <th class="hidden sm:table-cell py-4">Email</th>
                        <th class="hidden lg:table-cell py-4">Date added</th>
                        <th class="hidden lg:table-cell py-4">Status</th>
                        <th class="text-center hidden lg:table-cell py-4">Booking Number</th>
                        <th data-sortable="false">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $client)
                        
                      <tr class="border-b-[1px] border-gray-300 dark:border-gray-700">
      
                        <td class="py-4">
                            <div class="flex items-center justify-center m-auto gap-x-4">
                                <img class="h-8 w-8 rounded-full" src="{{ asset('ft_user/'.$client->user->image) }}">
                                <h1 class="leading-3">{{ $client->user->username }}</h1>
                            </div>
                        </td>
                        <td class="hidden sm:table-cell text-center">{{ $client->user->email }}</td>
                        <td class="hidden lg:table-cell text-center">{{ \Carbon\Carbon::parse($client->created_at)->format('d-F-y') }}</td>
                        <td class="hidden lg:table-cell text-center">
                          <span class="text-sm px-2 py-1 font-semibold leading-tight {{ ($client->status == 'menunggu') ? 'text-yellow-700 bg-yellow-100' : '' }} {{ ($client->status == 'ditolak') ? 'bg-red-600 text-white' : '' }} rounded-full">{{ $client->status }}</span>
                        </td>
                        <td class="text-center hidden lg:table-cell">{{ $client->doc_no }}</td>
                        <td class="text-center ">
                          <div class="flex justify-center m-auto gap-x-4">
                          <h1 class="cursor-pointer bg-white rounded-full inline-block ltr:mr-2 rtl:ml-2 hover:text-red-500" data-bs-toggle="modal" data-bs-target="#cancel">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(220, 20, 60, 1)"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                          </h1>

                          <h1 class="cursor-pointer bg-white rounded-full inline-block ltr:mr-2 rtl:ml-2 hover:text-green-500" data-bs-toggle="modal" data-bs-target="#exampleModalLong-{{ $client->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba( 0, 128, 0, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                          </h1>
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

<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto "
id="cancel" tabindex="-1" aria-labelledby="exampleModalLongLabel" aria-hidden="true">
<div class="modal-dialog relative w-auto pointer-events-none">
  <div
    class="modal-content border-none shadow-lg relative flex flex-col w-[800px] pointer-events-auto dark:bg-slate-700 bg-white bg-clip-padding rounded-md outline-none text-current m-auto">
    <div
      class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
         
         <form action="#" method="POST" class="w-full px-4" enctype="multipart/form-data">
            <h1 class="text-center font-semibold text-2xl dark:text-white">apakah kamu yakin mau menolak Client ?</h1>

            <div class="text-center mt-8 flex gap-x-2 mx-auto justify-center">
              <button type="button" class="bg-red-600 px-4 py-2 text-white rounded-md" data-bs-dismiss="modal">No</button>
              <button class="bg-green-600 py-2 px-4 rounded-md text-white">Yes</button>
          </div>
        </form>

    </div>

  </div>
</div>
</div>
{{-- modal cancel end --}}




     @endsection
