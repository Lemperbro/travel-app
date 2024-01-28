<div class="">

    {{-- @foreach ($wisata->itenerary as $itenerary)
        <details class="text-justify text-sm font-semibold w-full mt-2">
            <summary class="text-lg font-bold p-2 rounded-lg text-orange-500 bg-gray-200">
                Day {{ $no++ }} : <span class="text-black font-normal">{{ $itenerary->agenda }}</span>
            </summary>

            <div class="mt-4">

                <div class="my-3 flex gap-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        class="justify-center my-auto" style="transform: ;msFilter:;">
                        <path
                            d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z">
                        </path>
                        <path d="M13 7h-2v6h6v-2h-4z"></path>
                    </svg>
                    <div class="flex gap-x-2">
                        <span class="my-auto">{{ \Carbon\Carbon::parse($itenerary->startTime)->format('H:i A') }}</span>
                        <span class="my-auto">-</span>
                        <span class="my-auto">{{ \Carbon\Carbon::parse($itenerary->endTime)->format('H:i A') }}</span>
                    </div>
                </div>
            </div>
            @php
                $trik1 = str_replace('>', '', $itenerary->deskripsi);
                $trik2 = preg_split('/\n|\r\n?/', $trik1);
            @endphp
            <ul class="p-2 w-full bg-white ">
                @foreach ($trik2 as $deskripsi)
                    <li class="my-1 list-disc ml-7 ">
                        {{ $deskripsi }}
                    </li>
                @endforeach

            </ul>
        </details>
    @endforeach --}}





</div>



<ul class="flex flex-col">
    @foreach ($wisata->itenerary as $itenerary)
        <li class="bg-white my-2  border-[2px] " x-data="accordion({{ $loop->iteration }})">
            <h2 @click="handleClick()"
                class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer gap-x-4">
                <span class="capitalize font-normal text-sm md:text-base"><span class="text-orange-600 font-semibold">(Day
                        {{ $loop->iteration }})</span> {{ $itenerary->agenda }}</span>
                <div class="w-[15%] flex justify-end">
                    <svg :class="handleRotate()"
                        class="fill-current text-orange-600 h-6 w-6 transform transition-transform duration-500"
                        viewBox="0 0 20 20">
                        <path
                            d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10">
                        </path>
                    </svg>
                </div>
            </h2>
            <div x-ref="tab" :style="handleToggle()"
                class="border-l-2 border-orange-600 overflow-hidden max-h-0 duration-500 transition-all">

                <div class="m-3 flex gap-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        class="justify-center w-4 md:w-5" style="transform: ;msFilter:;">
                        <path
                            d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z">
                        </path>
                        <path d="M13 7h-2v6h6v-2h-4z"></path>
                    </svg>
                    <div class="flex gap-x-2 mt-[2px] ">
                        <span
                            class="my-auto text-sm md:text-base">{{ \Carbon\Carbon::parse($itenerary->startTime)->format('H:i A') }}</span>
                        <span class="my-auto text-sm md:text-base">-</span>
                        <span
                            class="my-auto text-sm md:text-base">{{ \Carbon\Carbon::parse($itenerary->endTime)->format('H:i A') }}</span>
                    </div>
                </div>
                @php
                    $trik1 = str_replace('>', '', $itenerary->deskripsi);
                    $trik2 = preg_split('/\n|\r\n?/', $trik1);
                @endphp
                <ul class="ml-7 py-3">
                    @foreach ($trik2 as $deskripsi)
                        <li class=" text-gray-900 list-disc text-sm md:text-base">
                            {{ $deskripsi }}
                        </li>
                    @endforeach
                </ul>

            </div>
        </li>
    @endforeach

</ul>
