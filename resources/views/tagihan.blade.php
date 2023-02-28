    @extends('layouts.main')


    <div class="container mt-28">
        <div class="flex justify-between" >
            <div class="col-lg-8 col-md-7 w-[60%]">
                <div class="border-l-lime-800 border-l-4 shadow-best p-4 relative">
                    <div class="flex p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-100 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
                        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <div>
                          <span class="font-medium uppercase">Info!</span> Selesaikan Pembayaran Sebelum Kedaluarsa
                        </div>
                      </div>
                      
                    <h4 class="text-2xl font-semibold">Gunung Bromo</h4>
                    <p class="py-2">departure date: <span class="text-sm">12-06-2001</span></p>

                    <div class="justify-between my-1">

                        <div class="mx-auto flex">
                            <p class="text-sm font-semibold">
                                Type Tour :
                            </p>
                            <p class="text-sm">Private Trip</p>
                        </div>

                        <div class="mx-auto flex">
                            <p class="text-sm font-semibold">
                                Pickup Point : 
                            </p>
                            <p class="text-sm">Apart Suhat</p>
                        </div>

                    </div>
                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Bayar Sekarang</button>
                </div>
            </div>

            <div class="w-[30%]">

                <div class="">

                    <div class="border p-4 shadow-best">
                        <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" height="25" viewBox="0 96 960 960" width="25"><path d="m40 936 440-760 440 760H40Zm104-60h672L480 296 144 876Zm340.175-57q12.825 0 21.325-8.675 8.5-8.676 8.5-21.5 0-12.825-8.675-21.325-8.676-8.5-21.5-8.5-12.825 0-21.325 8.675-8.5 8.676-8.5 21.5 0 12.825 8.675 21.325 8.676 8.5 21.5 8.5ZM454 708h60V484h-60v224Zm26-122Z" fill="#7d0e06"/></svg>
                        <p class="text-sm  text-[#7d0e06] font-semibold">
                            Anda memiliki 3 tagihan pembayaran.
                        </p>
                    </div>

                        <h1 class="text-3xl text-[#dc3545]" >
                           <small class="text-[#6c757d]">Rp</small> 2.200.000
                        </h1>
                        <p class="py-2 text-lg text-[#6c757d]">
                            Total tagihan pembayaran Anda
                        </p>

                        <hr class="border-1 border-[#6c757d]">

                        <div class="py-4">

                            <div class="flex justify-between py-3">
                            <h1 class="font-semibold text-lg">Tagihan</h1>
                            <p class="font-semibold text-lg"><small>Rp</small>2.100.000</p>
                            </div>


                            <div class="flex justify-between">
                            <h1 class="font-semibold text-lg">Total</h1>
                            <p class="font-semibold text-lg"><small>Rp</small>2.100.000</p>
                            </div>
                            
                        </div>



                        <div class="bg-[#000066] t rounded-md">
                            <a href="total">
                            <p class="text-white p-3 font-semibold text-center">Lihat detail Tagihan</p>
                            </a>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>