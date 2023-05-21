@extends('layouts.main')


@section('container')
<div class="mb-32">
  <div class="grid lg:grid-cols-2 ">

    <div class="px-4 pt-8">

      <p class="text-xl font-medium">Order Summary</p>
      <p class="text-gray-400">Check your items.</p>
      <div class="mt-8 space-y-3 rounded-lg border bg-white px-2 py-4 sm:px-6">

        @php
           $img = explode("|", $wisata->image)
        @endphp
        
        <div class="flex flex-col rounded-lg bg-white sm:flex-row">

          <img class="m-2 h-24 w-96 rounded-md border object-cover object-center" src="{{ asset('image/'.$img[0]) }}" alt="" />
          <div class="flex w-full flex-col px-4 py-4">
            <span class="font-semibold">{{ $wisata->nama_wisata }}</span>
            <p class="text-lg font-bold"  >Rp. {{ number_format($wisata->harga,0,',','.') }}</p>
          </div>
        </div>

        <table class="flex gap-x-4">
          <thead >
              <tr class="flex flex-col text-left">
              <th class="my-2">Departure</th>
              <th class="my-2">Type Tour</th>
          </tr>
          </thead>
          
          <tr class="flex flex-col text-left">
              <td class="my-2">:</td>
              <td class="my-2">:</td>
          </tr>

          <tbody>


              <tr class="flex flex-col text-left">
                  <td class="my-2">{{ \Carbon\Carbon::parse($wisata->tanggal)->format('d-F-Y , H:i ') . 'WIB'  }}</td>
                  <td class="my-2">{{ $wisata->tour_type }}</td>
              </tr>
          </tbody>
      </table>

      </div>
  

      {{-- input jumlah pemesanan  start--}}

      <div class="px-4 pt-8" >

        {{-- element start --}}
        <div id="addOrders">
        <div class="flex gap-4 ">

          <div class="w-[50%]">
            <label for="age" class="">Select Age</label>
            <select name="age[]" id="age" class="w-full rounded-md border-[1px] border-gray-400 mt-2">
              <option value="5-10">5th - 10th</option>
              <option value="11-20">11th - 20th</option>
              <option value="21-30">21th - 30th</option>
              <option value="31-40">31th - 40th</option>
            </select>
          </div>

          <div class="w-[50%]">
            <label for="nama" class="">Name</label>
            <input type="text" name="nama[]" id="nama" class="w-full rounded-md border-[1px] border-gray-400 p-2 mt-2">
          </div>

        </div>
      </div>
        {{-- element end --}}

        <h1 class="text-center block cursor-pointer bg-gray-900 text-white font-semibold p-2 rounded-md mt-8" id="addOrder_btn">Add Order</h1>
      </div>      
      {{-- input jumlah pemesanan  end--}}



    </div>
    <form action="/checkout/{{ $slug }}/payment" method="post" class="mt-10 bg-gray-50 px-4 pt-8 lg:mt-0">
      @csrf
      <p class="text-xl font-medium">Payment Details</p>
      <p class="text-gray-400">Complete your order by providing your payment details.</p>

      <div class="">

        <div class="grid grid-cols-2 gap-x-4 mt-2">

            <div class="w-full">
              <label for="kota">Select City for pickup point </label>
              <select name="kota" id="pickup" onclick="piickup()" class="w-full rounded-md ">
                @foreach ($kota as $kota)                  
                <option value="{{ $kota->slug }},{{ $kota->harga }}">{{ $kota->nama_kota }}</option>

                @endforeach

              </select>

            </div>

            <div class="w-full">
              <label for="pickup">Pickup Point</label>
              <input type="text" name="pickup" class="w-full rounded-md">
            </div>

        </div>

        {{-- const destination = new Intl.NumberFormat('id-ID', {
          style: 'currency',
          currency: '',
          minimumFractionDigits: 0
        }).format(Pricewisata.value); --}}
        <div class="grid grid-cols-2 gap-x-4 mt-2 mb-2">

          <div class="w-full">
            <label for="kota">Select City For Dropout Point</label>
            <select name="drop_kota" id="dropout" class="w-full rounded-md ">
              @foreach ($drop as $drop)                  
              <option value="{{ $drop->slug }}">{{ $drop->nama_kota }}</option>

              @endforeach

            </select>

          </div>

          <div class="w-full">
            <label for="pickup">Dropout Point</label>
            <input type="text" name="dropout" class="w-full rounded-md">
          </div>

      </div>
      <input type="hidden" id="destinasi" value="{{ $wisata->harga }}">
      <label for="note" class="">Note</label>
      <textarea name="note" id="note" class="w-full h-20 mt-2 rounded-md">

      </textarea>

      <input type="hidden" id="priceWisata" value="{{ $wisata->harga }}">
      <div id="hasil" class="mt-4 bg-yellow-100">

      </div>
        <div class="mt-5 grid gap-6">
          <div class="relative border rounded-md p-4">
  
              <table class="flex gap-x-4">
                  <thead >
                      <tr class="flex flex-col text-left">
                      <th class="my-2">Nama Pembeli</th>
                      <th class="my-2">No Telephone</th>
                  </tr>
                  </thead>
                  
                  <tr class="flex flex-col text-left">
                      <td class="my-2">:</td>
                      <td class="my-2">:</td>
                  </tr>
  
                  <tbody>
  
  
                      <tr class="flex flex-col text-left">
                          <td class="my-2">{{ auth()->user()->username }}</td>
                          <td class="my-2">{{ auth()->user()->no_tlpn }}</td>
                      </tr>
                  </tbody>
              </table>
  
          </div>
  
  
        </div>
  
        <!-- Total -->

        <div class="mt-6 flex items-center justify-between">

          <div class="mt-6 border-t border-b py-2 w-full">
            <div class="flex items-center justify-between">
              <p class="text-sm font-medium text-gray-900">Destination</p>
              <p class="font-semibold text-gray-900">Rp. <span id="destinationPrice">{{ number_format($wisata->harga,0,',','.') }}</span></p>
            </div>
            <div class="flex items-center justify-between">
              <p class="text-sm font-medium text-gray-900">Pickup</p>
              <p class="font-semibold text-gray-900">Rp. <span id="pickupPrice">{{ number_format($firstpricePickup,0,',','.') }}</span></p>
            </div>

            <div class="flex items-center justify-between">
              <p class="text-sm font-medium text-gray-900">Total</p>
              <p class="font-semibold text-gray-900">Rp. <span id="total">{{  number_format($wisata->harga + $firstpricePickup,0,',','.')  }}</span></p>
            </div>

          </div>
        </div>

      </div>
      
      <button type="submit" class="mt-4 mb-8 w-full rounded-md bg-gray-900 px-6 py-3 font-medium text-white">Place Order</button>
    </form>


  </div>
</div>
@endsection