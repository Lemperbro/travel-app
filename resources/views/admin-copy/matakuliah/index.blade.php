@extends('admin.layout.main')


@section('container')

<div class="px-4 pt-6">
    {{-- card-1 start --}}

  <div class="w-full mt-4 pb-4 ">

    <div class="items-center justify-between p-4 bg-white dark:bg-gray-800 border border-gray-200 relative rounded-lg shadow-sm dark:border-gray-700 sm:p-6 ">
      <div class="w-full">
        <h1 class="text-white font-semibold text-xl">Cari...</h1>

        <form class="">


          <div class="grid grid-cols-1 lg:grid-cols-3 gap-x-4 justify-between my-5">
          <div class="my-4">

          <label for="username" class="dark:text-white text-grey-900 font-semibold inline-block">Kode Matakuliah</label>
          <input type="text" id="username" class="bg-gray-50 mt-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

        </div>

        <div class="my-4">

          <label for="thn_masuk" class="dark:text-white text-grey-900 font-semibold inline-block">Nama Matakuliah</label>
          <input type="text" id="thn_masuk" class="bg-gray-50 mt-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

        </div>

      </div>

        <button type="button" class="focus:outline-none text-white bg-primary-700 dark:bg-yellow-400 hover:bg-yellow-500  rounded-lg text-base font-semibold px-5 py-2 mr-2 mb-2 ">Cari</button>
        </form>
      </div>
      <div class="w-full" id="new-products-chart"></div>
    </div>
    {{-- card-1 end --}}

  </div>
<div class="w-full pb-4 ">

  {{-- table matakuliah start --}}
  <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
    <!-- Card header -->
    <div class="items-center justify-between lg:flex">
      <div class="mb-4 lg:mb-0">
        <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Data Dosen</h3>
      </div>
    </div>
    <!-- Table -->
    <div class="flex flex-col mt-6">
      <div class="overflow-x-auto rounded-lg">
        <div class="inline-block min-w-full align-middle">
          <div class="overflow-hidden shadow sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
              <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                  <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                    no
                  </th>
                  <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                    Kode Mk
                  </th>
                  <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                    Nama Mk
                  </th>
                  <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                    Sks
                  </th>
                  <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                    Aksi
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white dark:bg-gray-800">
                <tr>
                  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    1.
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    8998990990
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    Bahasa Alien
                  </td>
                  <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                   4
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    <div class="flex gap-x-4">
                      
                      <a href="" class="inline-block  p-2 rounded-md bg-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class=" w-5 text-white" fill="currentColor" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/></svg>
                      </a>

                      <form action="">
                      <button type="submit" class="bg-red-500 p-2 rounded-md">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 text-white" fill="currentColor" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                    </button>
                    </form>


                    </div>
                  </td>

                </tr>
                <tr class="bg-gray-50 dark:bg-gray-700">
                  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    2.
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    8998990990
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    Bahasa Alien
                  </td>
                  <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                   4
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    <div class="flex gap-x-4">
                      
                      <a href="" class="inline-block  p-2 rounded-md bg-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class=" w-5 text-white" fill="currentColor" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/></svg>
                      </a>

                      <form action="">
                      <button type="submit" class="bg-red-500 p-2 rounded-md">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 text-white" fill="currentColor" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                    </button>
                    </form>


                    </div>
                  </td>

                </tr>
                <tr>
                  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    3.
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    8998990990
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    Bahasa Alien
                  </td>
                  <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                   4
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    <div class="flex gap-x-4">
                      
                      <a href="" class="inline-block  p-2 rounded-md bg-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class=" w-5 text-white" fill="currentColor" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/></svg>
                      </a>

                      <form action="">
                      <button type="submit" class="bg-red-500 p-2 rounded-md">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 text-white" fill="currentColor" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                    </button>
                    </form>


                    </div>
                  </td>
                </tr>
                <tr class="bg-gray-50 dark:bg-gray-700">
                  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    4.
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    8998990990
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    Bahasa Alien
                  </td>
                  <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                   4
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    <div class="flex gap-x-4">
                      
                      <a href="" class="inline-block  p-2 rounded-md bg-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class=" w-5 text-white" fill="currentColor" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/></svg>
                      </a>

                      <form action="">
                      <button type="submit" class="bg-red-500 p-2 rounded-md">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 text-white" fill="currentColor" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                    </button>
                    </form>


                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    5.
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    8998990990
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    Bahasa Alien
                  </td>
                  <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                   4
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    <div class="flex gap-x-4">
                      
                      <a href="" class="inline-block  p-2 rounded-md bg-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class=" w-5 text-white" fill="currentColor" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/></svg>
                      </a>

                      <form action="">
                      <button type="submit" class="bg-red-500 p-2 rounded-md">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 text-white" fill="currentColor" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                    </button>
                    </form>


                    </div>
                  </td>
                </tr>
                <tr class="bg-gray-50 dark:bg-gray-700">
                  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    6.
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    8998990990
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    Bahasa Alien
                  </td>
                  <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                   4
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    <div class="flex gap-x-4">
                      
                      <a href="" class="inline-block  p-2 rounded-md bg-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class=" w-5 text-white" fill="currentColor" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/></svg>
                      </a>

                      <form action="">
                      <button type="submit" class="bg-red-500 p-2 rounded-md">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 text-white" fill="currentColor" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                    </button>
                    </form>


                    </div>
                  </td>
                </tr>

                <tr>
                  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    7.
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    8998990990
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    Bahasa Alien
                  </td>
                  <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                   4
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    <div class="flex gap-x-4">
                      
                      <a href="" class="inline-block  p-2 rounded-md bg-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class=" w-5 text-white" fill="currentColor" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/></svg>
                      </a>

                      <form action="">
                      <button type="submit" class="bg-red-500 p-2 rounded-md">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 text-white" fill="currentColor" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                    </button>
                    </form>


                    </div>
                  </td>
                </tr>
                <tr class="bg-gray-50 dark:bg-gray-700">
                  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    8.
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    8998990990
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    Bahasa Alien
                  </td>
                  <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                   4
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    <div class="flex gap-x-4">
                      
                      <a href="" class="inline-block  p-2 rounded-md bg-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class=" w-5 text-white" fill="currentColor" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/></svg>
                      </a>

                      <form action="">
                      <button type="submit" class="bg-red-500 p-2 rounded-md">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 text-white" fill="currentColor" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                    </button>
                    </form>


                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    9.
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    8998990990
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    Bahasa Alien
                  </td>
                  <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                   4
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    <div class="flex gap-x-4">
                      
                      <a href="" class="inline-block  p-2 rounded-md bg-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class=" w-5 text-white" fill="currentColor" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/></svg>
                      </a>

                      <form action="">
                      <button type="submit" class="bg-red-500 p-2 rounded-md">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 text-white" fill="currentColor" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                    </button>
                    </form>


                    </div>
                  </td>
                </tr>
                <tr class="bg-gray-50 dark:bg-gray-700">
                  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    10.
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    8998990990
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    Bahasa Alien
                  </td>
                  <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                   4
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    <div class="flex gap-x-4">
                      
                      <a href="" class="inline-block  p-2 rounded-md bg-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class=" w-5 text-white" fill="currentColor" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/></svg>
                      </a>

                      <form action="">
                      <button type="submit" class="bg-red-500 p-2 rounded-md">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 text-white" fill="currentColor" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                    </button>
                    </form>


                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
  {{-- table matakuliah end --}}





    


</div>

{{-- content-1 end --}}

   
</div>

@endsection