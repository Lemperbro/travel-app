@extends('admin.layouts.main')

@section('container')

<main class="pt-20 -mt-2">
    <div class="mx-auto p-2">
      <!-- row -->
      <div class="flex flex-wrap flex-row">
        <div class="flex-shrink max-w-full px-4 w-full">   
          <p class="text-xl font-bold mt-3 mb-5 dark:text-white">Driver On duty</p>
        </div>                                                 
        <div class="flex-shrink max-w-full px-4 w-full mb-6">
          <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg h-full">
            <div class="flex flex-wrap flex-row -mx-4">
              <div class="flex-shrink max-w-full px-4 w-full">
                  <div class="mb-14">
                    <div id="bulk-actions">
                      <label class="flex flex-wrap flex-row">
                        <select id="bulk_actions" name="bulk_actions" class="inline-block leading-5 relative py-2 ltr:pl-3 ltr:pr-8 rtl:pr-3 rtl:pl-8 mb-3 rounded bg-gray-100 border border-gray-200 overflow-x-auto focus:outline-none focus:border-gray-300 focus:ring-0 dark:text-gray-300 dark:bg-gray-700 dark:border-gray-700 dark:focus:border-gray-600 select-caret appearance-none">
                          <option value="">Free</option>
                          <option value="activate">Duty</option>
                        </select>        
                        <input type="submit" id="bulk_apply" class="ltr:ml-2 rtl:mr-2 py-2 px-4 inline-block text-center mb-3 rounded leading-5 border hover:bg-gray-300 dark:bg-gray-900 dark:bg-opacity-40 dark:text-white dark:border-gray-800 dark:hover:bg-gray-900 focus:outline-none focus:ring-0 cursor-pointer" value="Search">
                      </label>
                    </div>
                  </div>
                <div class="w-full mb-6">
                  <form action="#">
                    <table class="table-sorter table-bordered w-full text-gray-600 dark:text-gray-400">
                      <thead>
                        <tr class="bg-gray-100 dark:bg-gray-900 dark:bg-opacity-40">
                          <th class="hidden sm:table-cell">Driver</th>
                          <th data-sortable="false">Duty</th>
                          <th class="hidden sm:table-cell">Phone</th>
                          <th class="text-center hidden lg:table-cell">Type Tour</th>
                          <th class="hidden lg:table-cell">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
        
                          <td>
                              <div class="flex justify-center mt-3 gap-x-6">
                                <div class="flex justify-center text-center "><img class="h-8 w-8 rounded-full " src="ft_default/fp.png"></div>
                                <div class="dark:text-gray-300 flex text-center ">  
                                  Ari Budin
                                </div>
                              </div>
                          </td>
                          <td class="hidden sm:table-cell text-center">1/08/2023 until 10/09/2023</td>
                          <td class="text-center hidden lg:table-cell">43.252.106.9</td>
                          <td class="text-center">
                            Private Tour
                          </td>
                            <td class="hidden lg:table-cell text-center">
                                <span class="text-sm px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full">On Duty</span>
                              </td>
                        </tr> 
                      </tbody>
                    </table>
  
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  </div>
  </div>
  

    
@endsection