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

          <label for="username" class="dark:text-white text-grey-900 font-semibold inline-block">Nama</label>
          <input type="text" id="username" class="bg-gray-50 mt-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

        </div>

        <div class="my-4">

          <label for="prodi" class="dark:text-white text-grey-900 font-semibold inline-block">Prodi</label>
          <select id="prodi" class="bg-gray-50 mt-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Pilih Prodi</option>
            <option value="US">United States</option>
            <option value="CA">Canada</option>
            <option value="FR">France</option>
            <option value="DE">Germany</option>
          </select>
          
        </div>

        <div class="my-4">

          <label for="thn_masuk" class="dark:text-white text-grey-900 font-semibold inline-block">Tahun Masuk</label>
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
        <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Mahasiswa</h3>
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
                    Nama
                  </th>
                  <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                    Nim
                  </th>
                  <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                    Prodi
                  </th>
                  <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                    Th Masuk
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
                    9093023
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    Bahasa Alien
                  </td>
                  <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                   2020
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    2020
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    2
                  </td>

                </tr>
                <tr class="bg-gray-50 dark:bg-gray-700">
                  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    2.
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    9093023
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    Bahasa Alien
                  </td>
                  <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                   2020
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    2020
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    2
                  </td>
                </tr>
                <tr>
                  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    3.
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    9093023
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    Bahasa Alien
                  </td>
                  <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                   2020
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    2020
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    2
                  </td>
                </tr>
                <tr class="bg-gray-50 dark:bg-gray-700">
                  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    4.
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    9093023
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    Bahasa Alien
                  </td>
                  <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                   2020
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    2020
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    2
                  </td>
                </tr>
                <tr>
                  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    5.
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    9093023
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    Bahasa Alien
                  </td>
                  <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                   2020
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    2020
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    2
                  </td>
                </tr>
                <tr class="bg-gray-50 dark:bg-gray-700">
                  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    6.
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    9093023
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    Bahasa Alien
                  </td>
                  <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                   2020
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    2020
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    2
                  </td>
                </tr>

                <tr>
                  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    7.
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    9093023
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    Bahasa Alien
                  </td>
                  <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                   2020
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    2020
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    2
                  </td>
                </tr>
                <tr class="bg-gray-50 dark:bg-gray-700">
                  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    8.
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    9093023
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    Bahasa Alien
                  </td>
                  <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                   2020
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    2020
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    2
                  </td>
                </tr>
                <tr>
                  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    9.
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    9093023
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    Bahasa Alien
                  </td>
                  <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                   2020
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    2020
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    2
                  </td>
                </tr>
                <tr class="bg-gray-50 dark:bg-gray-700">
                  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    10.
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    9093023
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    Bahasa Alien
                  </td>
                  <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                   2020
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    2020
                  </td>
                  <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    2
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