@extends('admin.layouts.main')

@section('container')
    <div class="px-4 py-6 overflow-hidden">
        <h1 class="dark:text-white text-gray-900 font-semibold text-center text-3xl my-4">Report</h1>
        <form action="/admin/report" class="flex gap-x-4">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 w-full">

                {{-- @dd($datas) --}}
                <div>
                    <label for="year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year</label>
                    <select id="year" name="year"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option value="">Select Year</option>
                        @for ($i = 1; $i <= 50; $i++)
                            @php
                                $year = 2010 + $i;
                            @endphp
                            <option value="{{ $year }}" @if (request('year') == $year) selected @endif>
                                {{ $year }}</option>
                        @endfor

                    </select>
                </div>

                <div>
                    <label for="month" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Month</label>
                    <select id="month" name="month"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option value="">Select Month</option>
                        <option value="1" @if (request('month') == 1) selected @endif>Januari</option>
                        <option value="2" @if (request('month') == 2) selected @endif>Januari</option>
                        <option value="3" @if (request('month') == 3) selected @endif>March</option>
                        <option value="4" @if (request('month') == 4) selected @endif>April</option>
                        <option value="5" @if (request('month') == 5) selected @endif>May</option>
                        <option value="6" @if (request('month') == 6) selected @endif>June</option>
                        <option value="7" @if (request('month') == 7) selected @endif>July</option>
                        <option value="8" @if (request('month') == 8) selected @endif>August</option>
                        <option value="9" @if (request('month') == 9) selected @endif>September</option>
                        <option value="10" @if (request('month') == 10) selected @endif>October</option>
                        <option value="11" @if (request('month') == 11) selected @endif>November</option>
                        <option value="12" @if (request('month') == 12) selected @endif>December</option>
                    </select>
                </div>


                <div>
                    <label for="status"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                    <select id="status" name="status"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option value="">Select Status</option>
                        <option value="refund" @if (request('status') == 'refund') selected @endif>Refund</option>
                        <option value="cancel" @if (request('status') == 'cancel') selected @endif>Cancel</option>
                        <option value="done" @if (request('status') == 'done') selected @endif>Done</option>
                        <option value="EXPIRED" @if (request('status') == 'EXPIRED') selected @endif>Expired</option>
                        <option value="PENDING" @if (request('status') == 'PENDING') selected @endif>Pending</option>
                        <option value="PAID" @if (request('status') == 'PAID') selected @endif>Paid</option>


                    </select>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-8 md:mt-auto">
                    <button type="submit"
                        class="bg-orange-600 p-2 rounded-md text-white inline-block h-[44px] my-auto text-center">Search</button>
                    <a href="/admin/report"
                        class="text-white bg-yellow-400 p-2 rounded-md inline h-[44px] my-auto text-center">Reset Filter</a>
                </div>

            </div>
        </form>

        <button class="flex gap-x-2 bg-green-500 p-2 rounded-md mt-4"
            onclick="downloadToExcel('data_report', 'report_growin')">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-white"
                style="transform: ;msFilter:;">
                <path d="m12 16 4-5h-3V4h-2v7H8z"></path>
                <path d="M20 18H4v-7H2v7c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2v-7h-2v7z"></path>
            </svg>
            <h1 class="dark:text-white text-gray-900">Download To Excel</h1>
        </button>

        <div class="overflow-x-auto scrollbar_client">

            <table class="min-w-full mt-8" id="data_report">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-gray-700 uppercase border-b-2 dark:border-gray-400 bg-gray-300 dark:text-gray-400 dark:bg-gray-700 text-center">
                        <th class="px-4 text-white py-3 text-xl" colspan="15">transaction report @if (request('status') !== null)
                                with {{ request('status') }} status
                                @endif in @if (request('month') !== null)
                                    {{ \carbon\Carbon::parse('2023-' . request('month') . '-01')->format('F') }}
                                    @endif @if (request('year') !== null)
                                        {{ request('year') }}
                                    @else
                                        {{ $year_now }}
                                    @endif
                        </th>

                    </tr>

                    <tr
                        class="text-xs font-semibold tracking-wide text-gray-700 uppercase border-b-2 dark:border-gray-400 bg-gray-300 dark:text-gray-400 dark:bg-gray-700 text-center">
                        <th class="px-1  text-white py-3">No</th>
                        <th class="px-1  text-white py-3">Booking Number</th>
                        <th class="px-1  text-white py-3">Departure</th>
                        <th class="px-1  text-white py-3">Client</th>
                        <th class="px-1  text-white py-3">Phone Number</th>
                        <th class="px-1  text-white py-3">Wisata</th>
                        <th class="px-1  text-white py-3">Type Tour</th>
                        <th class="px-1  text-white py-3">Price</th>
                        <th class="px-1  text-white py-3">Price Refund</th>
                        <th class="px-1  text-white py-3">Guide</th>
                        <th class="px-1  text-white py-3">Vehicle</th>
                        <th class="px-1  text-white py-3">Driver</th>
                        <th class="px-1  text-white ">Payment Type</th>
                        <th class="px-1  text-white ">Payment Status</th>
                        <th class="px-1  text-white ">Status</th>
                    </tr>
                </thead>
                @foreach ($datas as $data)
                    <tbody
                        class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800 border-b-[1px] dark:border-gray-500">


                        <tr
                            class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm  text-center">{{ $loop->iteration }}</td>

                            <td class="px-4 py-3 text-sm text-center ">{{ $data->doc_no }}</td>
                            <td class="px-4 py-3 text-sm text-center ">
                                {{ \Carbon\Carbon::parse($data->departure)->format('d F Y') }}</td>
                            <td class="px-4 py-3 text-sm text-center ">{{ $data->user->username }}</td>
                            <td class="px-4 py-3 text-sm text-center ">{{ $data->user->no_tlpn }}</td>
                            <td class="px-4 py-3 text-sm text-center ">{{ $data->wisata->nama_wisata }}</td>
                            <td class="px-4 py-3 text-sm text-center ">{{ $data->wisata->tour_type }}</td>

                            <td class="px-4 py-3 text-center">
                                Rp. {{ number_format($data->amount, 0, ',', '.') }}
                            </td>
                            <td class="px-4 py-3 text-sm text-center ">
                                @if ($data->status == 'refund' && $data->payment_status == 'PAID')
                                    @php
                                        $refund = App\Models\Refund::where('pemesanan_id', $data->id)
                                            ->where('doc_no', $data->doc_no)
                                            ->where('status', 'success')
                                            ->first();
                                    @endphp

                                    {{ number_format($refund->refund_amount, 0, ',', '.') }}
                                @else
                                    <span>Nothing</span>
                                @endif
                            </td>

                            <td class="px-4 py-3 text-sm text-center ">
                                @if ($data->guide !== null)
                                    {{ $data->guide->nama }}
                                @else
                                    Null
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm text-center ">
                                @if ($data->vehicle !== null)
                                    {{ $data->vehicle->merek }}
                                @else
                                    Null
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm text-center ">
                              @if ($data->driver !== null)
                              {{ $data->driver->nama }}</td>
                              @else
                              Null
                              @endif

                            <td class="px-4 py-3 text-sm  text-center">
                                @if ($data->dp == null)
                                    Full
                                @else
                                    Dp (Rp. {{ number_format($data->dp, 0, ',', '.') }})
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm  text-center">{{ $data->payment_status }}</td>

                            <td class="px-4 py-3 text-sm  text-center">
                                @if ($data->status == 'dikonfirmasi')
                                    Confirmed
                                @elseif ($data->status == 'ditolak')
                                    Rejected
                                @elseif ($data->status == 'menunggu')
                                    Waiting
                                @else
                                    {{ $data->status }}
                                @endif
                            </td>




                        </tr>


                    </tbody>
                @endforeach

                @if ($datas->count() == null)
                    <tbody
                        class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800 border-b-[1px] dark:border-gray-500">


                        <tr
                            class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">

                            <td class="px-4 py-3 text-base text-center text-orange-400" colspan="15">data doesn't exist
                            </td>

                        </tr>


                    </tbody>
                @endif


            </table>
        </div>

        {{ $datas->links('vendor.pagination.tailwind') }}



    </div>
    {{-- modal add end --}}
@endsection
