@extends('admin.layouts.main')

@section('container')
    
<main class="pt-20 -mt-2">
  <div class="mx-auto p-2">
    <!-- row -->
    <div class="flex flex-wrap flex-row">
      <div class="flex-shrink max-w-full px-4 w-full">   
        <p class="text-xl font-bold mt-3 mb-5">Customers</p>
      </div>                                                 
      <div class="flex-shrink max-w-full px-4 w-full mb-6">
        <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg h-full">
          <div class="flex flex-wrap flex-row -mx-4">
            <div class="flex-shrink max-w-full px-4 w-full">
              <div class="md:flex md:justify-between">
                <div>
                  <a href="#" class="py-2 px-4 mb-3 block lg:inline-block text-center rounded leading-5 text-gray-100 bg-indigo-500 border border-indigo-500 hover:text-white hover:bg-indigo-600 hover:ring-0 hover:border-indigo-600 focus:bg-indigo-600 focus:border-indigo-600 focus:outline-none focus:ring-0">Add new <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="inline-block ltr:ml-1 rtl:mr-1 bi bi-plus-lg" viewBox="0 0 16 16">
                    <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z"></path>
                  </svg></a>
                </div>

                <div>
                  <div id="bulk-actions">
                    <label class="flex flex-wrap flex-row">
                      <select id="bulk_actions" name="bulk_actions" class="inline-block leading-5 relative py-2 ltr:pl-3 ltr:pr-8 rtl:pr-3 rtl:pl-8 mb-3 rounded bg-gray-100 border border-gray-200 overflow-x-auto focus:outline-none focus:border-gray-300 focus:ring-0 dark:text-gray-300 dark:bg-gray-700 dark:border-gray-700 dark:focus:border-gray-600 select-caret appearance-none">
                        <option value="">Action</option>
                        <option value="activate">Activate</option>
                        <option value="blocked">Blocked</option>
                      </select>        
                      <input type="submit" id="bulk_apply" class="ltr:ml-2 rtl:mr-2 py-2 px-4 inline-block text-center mb-3 rounded leading-5 border hover:bg-gray-300 dark:bg-gray-900 dark:bg-opacity-40 dark:border-gray-800 dark:hover:bg-gray-900 focus:outline-none focus:ring-0 cursor-pointer" value="Apply">
                    </label>
                  </div>
                </div>
              </div>
              <div class="w-full mb-6 overflow-x-auto">
                <forms action="#">
                  <table class="table-sorter table-bordered w-full ltr:text-left rtl:text-right text-gray-600 dark:text-gray-400">
                    <thead>
                      <tr class="bg-gray-100 dark:bg-gray-900 dark:bg-opacity-40">
                        <th class="hidden sm:table-cell border">Customers</th>
                        <th class="hidden sm:table-cell">Email</th>
                        <th class="hidden lg:table-cell">Date added</th>
                        <th class="hidden lg:table-cell">Status</th>
                        <th class="text-center hidden lg:table-cell">IP</th>
                        <th data-sortable="false">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
      
                        <td>
                          <a href="#">
                            <div class="flex flex-wrap flex-row items-center">
                              <div class="self-center"><img class="h-8 w-8 rounded-full" src="ft_default/fp.png"></div>
                              <div class="leading-5 dark:text-gray-300 flex-1 ltr:ml-2 rtl:mr-2 mb-1">  
                                Ari Budin
                              </div>
                            </div>
                          </a>
                        </td>
                        <td class="hidden sm:table-cell">example@gmail.com</td>
                        <td class="hidden lg:table-cell">27/05/2022</td>
                        <td class="hidden lg:table-cell">
                          <span class="text-sm px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full">Pending</span>
                        </td>
                        <td class="text-center hidden lg:table-cell">43.252.106.9</td>
                        <td class="text-center">
                          <a href="javascript:;" class="inline-block ltr:mr-2 rtl:ml-2 hover:text-red-500" title="Delete">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                              <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                            </svg>
                          </a>
                          <a href="javascript:;" class="inline-block ltr:mr-2 rtl:ml-2 hover:text-green-500" title="Edit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                            </svg>
                          </a>
                        </td>
                      </tr> 
                    </tbody>
                  </table>

                  <!-- select all -->
                  <script type="text/javascript">
                    const selectall = document.querySelector("#check_all");
                    if ( selectall != null) {
                      selectall.addEventListener("click", function(){
                        if (document.querySelector("#check_all").checked == true) {
                          var ele=document.querySelectorAll('.checkedall');  
                          for(var i=0; i<ele.length; i++){  
                              if(ele[i].type=='checkbox')  
                                  ele[i].checked=true;  
                          }  
                        } else {
                          var ele=document.querySelectorAll('.checkedall');  
                          for(var i=0; i<ele.length; i++){  
                              if(ele[i].type=='checkbox')  
                                  ele[i].checked=false;  
                                
                          }  
                        }
                      });
                    }            
                  </script>
                </forms>
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
