<nav class="bg-white border-gray-200 dark:bg-gray-900 fixed z-40 w-full top-0">
    <div class="container flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="https://flowbite.com/" class="flex items-center">
            <img src="{{ asset('img/logo.png') }}" class="h-8 mr-3" alt="Flowbite Logo" />
        </a>
        <div class="flex items-center md:order-2">
            @guest
                <div class="grid-cols-2 gap-x-2 hidden md:grid">
                    <a href="/login"
                        class="inline-flex items-center justify-center rounded-xl border border-transparent bg-orange-600 px-4 py-1 font-medium text-white hover:bg-orange-700">Login</a>
                    <a href="/register"
                        class="inline-flex items-center justify-center rounded-xl border bg-white px-4 py-1 font-medium text-orange-600 shadow hover:bg-blue-50">Register</a>
                </div>
            @endguest
            @auth
                <!-- Notifications start-->
                @if (Auth()->user())
                    <button type="button" data-dropdown-toggle="notification-dropdown"
                        class="p-2 text-gray-500 rounded-lg hover:text-gray-900 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 relative">
                        <span class="sr-only">View notifications</span>
                        <!-- Bell icon -->
                        <div class="{{ $count->count() > 0 ? 'animate-tada' : '' }} relative">
                            <svg class="w-6 h-6 fill-black" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z">
                                </path>
                            </svg>
                            @if ($count->count() > 0)
                                <span
                                    class="absolute items-center justify-center py-[1px] px-[5px] text-xs font-semibold text-white bg-red-600 rounded-md -top-2">
                                    {{ $count->count() }}
                                </span>
                            @endif
                        </div>
                    </button>
                    <!-- Dropdown menu -->
                    <div class="z-50 hidden max-w-xs md:max-w-md w-full h-screen lg:h-[640px] my-4 overflow-y-scroll scrollbar text-base list-none bg-white divide-y divide-gray-100 rounded shadow-lg dark:divide-gray-600 dark:bg-gray-700 relative"
                        id="notification-dropdown">
                        <div
                            class="block px-4 py-2 text-lg text-center font-semibold bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Notifications
                        </div>
                        <div>
                            @foreach ($notification as $notifications)
                                @php
                                    
                                    if ($notifications->pemesanan !== null) {
                                        $wisata = App\Models\Wisata::where('id', $notifications->pemesanan->wisata_id)
                                            ->pluck('nama_wisata')
                                            ->first();
                                    } else {
                                        $wisata = null;
                                    }
                                    
                                @endphp
                                @if ($wisata !== null)
                                    <form action="/notification/{{ $notifications->id }}" method="POST">
                                        @csrf
                                        <button
                                            class="w-full text-left flex px-4 py-3 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600 {{ $notifications->status == 'belum dibuka' ? 'bg-gray-100 dark:bg-gray-600' : '' }} {{ $notifications->status == 'dibuka' ? 'bg-white dark:bg-gray-700' : '' }}">
                                            <div class="w-full pl-3">
                                                <div class="font-normal text-base mb-1.5 dark:text-gray-400">


                                                    @if ($notifications->tipe == 'pemesanan')
                                                        successful payment for {{ $wisata }} tour, please see your
                                                        ticket
                                                    @elseif($notifications->tipe == 'confirmation' || $notifications->tipe == 'refund')
                                                        {{ $notifications->judul }}
                                                    @endif
                                                </div>

                                                @php
                                                    $created_at = Carbon\Carbon::parse($notifications->created_at);
                                                    $now = Carbon\Carbon::now();
                                                    
                                                @endphp
                                                <div class="text-sm font-semibold text-primary-700 dark:text-primary-400">
                                                    @if ($created_at->diffInMinutes($now) < 60)
                                                        {{ $created_at->diffForHumans() }}
                                                    @else
                                                        {{ $created_at->format('d F Y') }}
                                                    @endif
                                                </div>
                                            </div>
                                        </button>
                                    </form>
                                @endif
                            @endforeach



                        </div>
                        <div
                            class="absolute bottom-0 w-full block px-4 py-2 text-base font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-800 dark:text-gray-400">
                            <form action="/notification/read_all" method="POST" id="read_all_admin">
                                @csrf
                                <button type="submit" class="capitalize">mark as read all</button>
                            </form>
                        </div>

                    </div>
                @endif
                <!-- Notifications end-->

                <button type="button"
                    class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full object-cover" src="{{ asset('ft_user/' . auth()->user()->image) }}"
                        alt="user photo">
                </button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                    id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900 dark:text-white">{{ auth()->user()->username }}</span>
                        <span
                            class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ auth()->user()->email }}</span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        @if (Auth()->user()->posisi == 1)
                            <li>
                                <a href="/admin"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white transform transition-colors duration-200 border-r-4 border-transparent hover:border-orange-600">Dashboard</a>
                            </li>
                        @endif
                        <li>
                            <a href="/profile"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white transform transition-colors duration-200 border-r-4 border-transparent hover:border-gray-600">My
                                Account</a>
                        </li>
                        <li>
                            <a href="/booking"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white transform transition-colors duration-200 border-r-4 border-transparent hover:border-gray-600">My
                                Booking</a>
                        </li>
                        <li>
                            <form action="/logout" method="post"
                                class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-red-600">
                                @csrf
                                <button type="submit"
                                    class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white w-full text-left">Sign
                                    out</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @endauth
            <button data-collapse-toggle="mobile-menu-2" type="button"
                class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="mobile-menu-2" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="/"
                        class="block py-2 pl-3 pr-4 rounded md:bg-transparent md:p-0 {{ request()->is('/') ? 'text-orange-600' : '' }} hover:text-orange-600"
                        aria-current="page">Home</a>
                </li>
                <li>
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                        class="flex items-center justify-between w-full py-2 pl-3 pr-4  text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 {{ request()->is('wisata/type/*') ? 'text-orange-600' : '' }} hover:text-orange-600 md:p-0 md:w-auto dark:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Type
                        Tour <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar"
                        class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
                            aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="/wisata/type/{{ 'private trip' }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Private
                                    Trip</a>
                            </li>
                            <li>
                                <a href="/wisata/type/{{ 'open trip' }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Open
                                    Trip</a>
                            </li>
                            <li>
                                <a href="/wisata/type/{{ 'single trip' }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Single
                                    Trip</a>
                            </li>
                        </ul>

                    </div>
                </li>
                <li>
                    <a href="/wisata/"
                        class="block py-2 pl-3 pr-4 rounded hover:bg-gray-100 md:hover:bg-transparent {{ request()->is('wisata') ? 'text-orange-600' : '' }} hover:text-orange-600 text-gray-900 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Booking</a>
                </li>
                <li>
                    <a href="/contact"
                        class="block py-2 pl-3 pr-4 {{ request()->is('contact') ? 'text-orange-600' : '' }} hover:text-orange-600 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                </li>
                <li class="md:hidden">
                    @guest
                        <div class="grid grid-cols-2 gap-x-2">
                            <a href="/login"
                                class="inline-flex items-center justify-center rounded-xl border border-transparent bg-orange-600 px-4 py-1 font-medium text-white hover:bg-orange-700">Login</a>
                            <a href="/register"
                                class="inline-flex items-center justify-center rounded-xl border bg-white px-4 py-1 font-medium text-orange-600 shadow hover:bg-blue-50">Register</a>
                        </div>
                    @endguest
                </li>
            </ul>
        </div>
    </div>
</nav>
