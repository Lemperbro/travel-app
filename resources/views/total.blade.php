@extends('layouts.main')


  
<div class="py-28 container">
<h2 class="text-3xl font-semibold">Tagihan</h2>

<div class="callout callout-info pl-3 py-0 mb-3 border-top-0 border-right-0 border-bottom-0">

    <div class="shadow-best4 p-4 rounded-lg">

    <p class="text-red-700">
        * Anda memiliki tagihan yang melebihi tanggal tempo.
        Silakan menghubungi bagian keuangan untuk pengajuan dispensasi.
    </p>
    <p>
        <span class="text-[#6c757d]">Tagihan pembayaran sampai dengan tanggal
            </span>  <span>01-09-2020</span>
            <br>
        <strong class="text-[#6c757d]">Total Tagihan Pembayaran</strong>:
        
        <small class="align-top text-secondary">Rp</small>
        <span class="text-red-500 text-2xl " id="total-angka">2.200.000</span>
        (<em id="total-bilangan" style="text-transform: capitalize;">dua juta dua ratus ribu Rupiah</em>)
    </p>
</div>

<div class="my-2 flex">
    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="30"><path d="m375 816-43-43 198-198-198-198 43-43 241 241-241 241Z"/></svg>
   <p class="py-3"> Pilih tagihan yang ingin Anda bayarkan,
    lalu tekan tombol <strong><em>Bayar</em></strong>
    untuk menuju ke proses pembayaran.
</p>
</div>


<div id="tagihan-list">
    <div class="shadow-best p-4 rounded-xl ">
            <div class="flex justify-between ">
                <div class="col-12 col-md-4">
                    <strong class="text-blue-dark">Item Tagihan Satu</strong> <br>
                    <small>Tahun 2019/2020, semester 6 - Genap</small>
                    <hr class="my-1 d-sm-block d-md-none">
                </div>
                <div class="col-6 col-md-2">
                    <small class="text-nowrap text-secondary">Tagihan</small>
                    <p class="mb-0">1.300.000</p>
                </div>

                <div class="col-6 col-md-2">
                    <small class="text-nowrap text-secondary">Batas Pembayaran</small>
                    <p class="mb-0">13-05-2020</p>
                </div>

            </div>

        <div class="card-footer bg-white py-3">
            <div class="">
                <input type="checkbox" class="mx-2 rounded-lg" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">
                    <span class="border border-blue-600 rounded text-info px-2 py-1 text-blue-600 font-medium">
                        Pilih Tagihan
                    </span> 
                </label>
            </div>
        </div>
    </div>

</div>


<div class="py-4">
    <div class="shadow-best p-4 rounded-xl ">
            <div class="flex justify-between ">
                <div class="col-12 col-md-4">
                    <strong class="text-blue-dark">Item Tagihan Satu</strong> <br>
                    <small>Tahun 2019/2020, semester 6 - Genap</small>
                    <hr class="my-1 d-sm-block d-md-none">
                </div>
                <div class="col-6 col-md-2">
                    <small class="text-nowrap text-secondary">Tagihan</small>
                    <p class="mb-0">1.300.000</p>
                </div>

                <div class="col-6 col-md-2">
                    <small class="text-nowrap text-secondary">Batas Pembayaran</small>
                    <p class="mb-0">13-05-2020</p>
                </div>

            </div>

        <div class="card-footer bg-white py-3">
            <div class="">
                <input type="checkbox" class="mx-2 rounded-lg" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">
                    <span class="border border-blue-600 rounded text-info px-2 py-1 text-blue-600 font-medium">
                        Pilih Tagihan
                    </span> 
                </label>
            </div>
        </div>
    </div>

</div>





</div>



    <div class="justify-center flex my-2">
        <button type="button" id="submit-tagihan" class="bg-[#FD522C] px-3 py-2 rounded-lg text-white font-semibold text-xl" name="submit">
            Bayar
        </button>
    </div>

    <div class="my-2">
    Keterangan:
        <ul class="my-2 px-4">
            <li class="list-item">
                <small> ✓ Denda akan diberikan jika tanggal tempo terlambat, dan dapat berupa akumulasi dari Denda sebelumnya</small>
            </li>
            <li class="list-item">
               <small>✓ Sistem dapat secara otomatis sewaktu-waktu mengubah Tanggal Tempo dengan periode Tanggal Akhir Bayar berikutnya dan menjumlahkan akumulasi Denda yang harus Anda bayar untuk tiap tagihan.</small>
            </li>
             <li class="list-item">
                <small>✓ Anda dipersilakan mengajukan dispensasi dengan menghubungi bagian Keuangan.</small>
            </li>
        </ul>
    </div>


</div>