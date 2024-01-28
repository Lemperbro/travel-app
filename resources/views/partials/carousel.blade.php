<div id="carouselExampleSlidesOnly" class="carousel slide relative w-full lg:h-screen" data-bs-ride="carousel">
    <div class="carousel-inner relative w-full overflow-hidden ">

        @foreach ($carousel["carousel"] as $items)
            
                <div class="carousel-item @if($items["id"] == 0) active @endif relative float-left w-full">
                    <div class="bg-black/40 absolute inset-0"></div>
                    <img src="{{ asset('carousel/img/' . $items["image"]) }}" class="block w-full h-screen object-cover" />
                    <div class="absolute top-[50%]  translate-y-[-50%] left-[50%] -translate-x-[50%] py-5 text-center text-white md:block w-full md:container px-4 md:px-0">
                        <h1 class='text-2xl lg:text-6xl font-bold text-white uppercase'>{{ $items["text"] }}</h1>
                    </div>
                </div>
        @endforeach



        <div
            class="mx-auto py-20 leading-6 absolute bottom-1 mt-5 md:bottom-10 left-[50%] translate-x-[-50%] w-[80%] lg:w-[50%]">
            <form action="/wisata/" autocomplete="off"
                class="relative mx-auto flex w-full max-w-2xl items-center justify-between rounded-md border shadow-lg">
                <svg class="absolute left-2 block h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8" class=""></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65" class=""></line>
                </svg>
                <input type="name" name="search"
                    class="h-12 md:h-14 w-full rounded-md py-4 pr-40 pl-12 outline-none focus:ring-2"
                    placeholder="City, Destination" />
                <button type="submit"
                    class="absolute right-0 mr-1 inline-flex h-10 md:h-12 items-center justify-center rounded-lg bg-gray-900 px-2 md:px-10 font-medium text-white focus:ring-4 hover:bg-gray-700">Search</button>
            </form>
        </div>




    </div>
</div>

