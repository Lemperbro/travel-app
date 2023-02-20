@extends('layouts.main')

@section('container')

        <div class="flex justify-between" >
            <div class="col-lg-8 col-md-7 w-[60%]">
                <div class="border-l-lime-800 border-l-4 shadow-best p-4  ">
                    <h4 class="text-2xl font-semibold">Jajang Lorem Ipsum</h4>
                    <p class="py-4">Teknik Informatika - 123123123</p>

                    <p>
                        Deposit: <small small>50.000
                    </p>
                </div>
            </div>

            <div class="w-full">

                <div class="">

                    <div class="border">
                        <div class="flex gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="m40 936 440-760 440 760H40Zm104-60h672L480 296 144 876Zm340.175-57q12.825 0 21.325-8.675 8.5-8.676 8.5-21.5 0-12.825-8.675-21.325-8.676-8.5-21.5-8.5-12.825 0-21.325 8.675-8.5 8.676-8.5 21.5 0 12.825 8.675 21.325 8.676 8.5 21.5 8.5ZM454 708h60V484h-60v224Zm26-122Z"/></svg>
                        <p class="text-sm">
                            Anda memiliki 3 tagihan pembayaran.
                        </p>
                    </div>

                        <h1 >
                            Rp2.200.000
                        </h1>
                        <p >
                            Total tagihan pembayaran Anda
                        </p>

                        <hr>

                        <dl><dt>Tagihan</dt>
                            <dd><small>Rp</small>2.100.000</dd>
                            <dt>Denda</dt>
                            <dd><small>Rp</small>100.000</dd>
                        </dl>

                        <hr>

                        <p>
                            <strong>Rincian:</strong>
                        </p>

                        <span></span>
                        <div>
                            <small>Rp</small>1.400.000 +
                            <small>Rp</small>100.000 <span>(Denda)</span>
                        </div>

                        <span></span>
                        <div>
                            <small>Rp</small>300.000
                        </div>

                        <span>Item Tagihan Tiga</span>
                        <div>
                            <small>Rp</small>500.000
                        </div>

                        <hr>

                        <p>
                            <a href="tagihan.html">Lihat Detail Tagihan</a>
                        </p>

                    </div>
                </div>
            </div>

        </div>

@endsection