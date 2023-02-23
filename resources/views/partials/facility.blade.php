
    
<div class="flex mb-4">
    <div class="w-[50%]">
        <h1 class="text-4xl font-semibold text-[#35B75A] text-center">Inclusion</h1>
    </div>
    <div class="w-[50%]">
        <h1 class="text-4xl font-semibold text-[#FF2E00] text-center">Exclusion</h1>
    </div>
</div>

    <div class="flex gap-x-8">
    <div class="border w-[50%] shadow-best4 rounded-xl justify-center bg-white p-4">
        @foreach ($wisata->fasilitas as $fasilitas)

        @php
            $inclusions = explode("|", $fasilitas->inclusion)
        @endphp
        @foreach ($inclusions as $inclusion)
            
        <div class="flex my-2">
        <img src="/icons/check.png" alt="" class="object-contain w-8 my-auto">
        <h4 class="text-lg my-auto">{{ $inclusion }}</h4>
        </div>


        @endforeach

        @endforeach
        

    </div>


    

    <div class="border w-[50%] shadow-best4 rounded-xl justify-center bg-white p-4">
        @foreach ($wisata->fasilitas as $fasilitas)
        @php
        $exclusions = explode("|", $fasilitas->exclusions)
        @endphp

        @foreach ($exclusions as $exclusion)
            
        <div class="flex my-2">
        <img src="/icons/crossed.png" alt="" class="object-contain w-8 my-auto">
        <h4 class="text-lg my-auto">{{ $exclusion }}</h4>
        </div>

        @endforeach

        @endforeach


    </div>

</div>
