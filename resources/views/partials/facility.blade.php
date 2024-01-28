
<div class="flex flex-col md:flex-row gap-8">
    <div class="w-[90%] sm:w-[60%] mx-auto md:w-[50%]">
        <h1 class="text-2xl md:text-3xl  font-semibold text-center mb-2">Inclusion</h1>
        <div class="border rounded-xl justify-center bg-white p-4">
            @foreach ($wisata->fasilitas as $fasilitas)
                @php
                    $inclusions = explode('|', $fasilitas->inclusion);
                @endphp

                @foreach ($inclusions as $inclusion)
                    <div class="flex my-2 gap-x-2">
                        <img src="/icons/check.png" alt="" class="object-contain w-5 my-auto">
                        <h4 class="text-base md:text-lg my-auto">{{ $inclusion }}</h4>
                    </div>
                @endforeach
            @endforeach


        </div>
    </div>



    <div class="w-[90%] sm:w-[60%] mx-auto md:w-[50%]">
        <h1 class="text-2xl md:text-3xl  font-semibold text-center mb-2">Exclusion</h1>


        <div class="border rounded-xl justify-center bg-white p-4">
            @foreach ($wisata->fasilitas as $fasilitas)
                @php
                    $exclusions = explode('|', $fasilitas->exclusions);
                @endphp

                @foreach ($exclusions as $exclusion)
                    <div class="flex my-2 gap-x-2">
                        <img src="/icons/crossed.png" alt="" class="object-contain w-5 my-auto">
                        <h4 class="text-base md:text-lg my-auto">{{ $exclusion }}</h4>
                    </div>
                @endforeach
            @endforeach


        </div>
    </div>

</div>
