<form action="/" class="filters my-4">
    <div
      class="flex  w-full pt-4 sm:max-w-[640px] md:max-w-[768px] lg:max-w-[1024px] xl:max-w-[1280px] 2xl:max-w-[1536px]"
    >
      <div
        x-data="filters()"
        @reset="reset = $event.detail.reset, filterCounter = 0"
      >
        <div class="flex flex-wrap items-center">
          <div class="flex items-start">
            <div
              class="mb-3"
              x-ref="myFilter"
              x-data="{
                                show: false,
                                counter: 0,
                                }
                                "
              @reset.window="counter = 0"
            >
              <select name="type"
                id="dropdownDefault"
                data-dropdown-toggle="dropdown"
                x-on:click="open"
                type="button"
                class="flex min-h-[3rem] items-center justify-between rounded-md bg-stone-100 px-4 py-2 text-stone-800 border-none appearance-none"
              >
                Type
                <span
                  x-show="counter"
                  x-text="counter"
                  class="bg-green-500 text-green-100 card-pills--counter ml-2 rounded-md px-2 py-1 text-sm"
                  style="display: none"
                  >0</span
                >
                <i
                  class="fas fa-angle-down pl-3 text-stone-700 dark:text-stone-300"
                ></i>
              <div
                x-show="isOpen()"
                x-on:click.away="close"
                class="w-46 shadow-stone-55 absolute z-10 divide-y divide-gray-100 overflow-hidden rounded-md bg-white shadow-lg "
                data-popper-placement="bottom"
                style="display: none"
              >
                <div
                  class="text-gray-700"
                  aria-labelledby="dropdownDefault"
                >
                  <option value="private trip"
                    x-data="{ 
                                          checked: false
                                      }"
                    @reset.window="checked = false"
                  >
                    <button
                      @click="count"
                      :class="checked ? 'text-green-500 bg-green-50' : ''"
                      class="group flex w-full items-center justify-between px-4 py-2 hover:bg-stone-500 hover:text-stone-300"
                    >
                      Private Trip
                      <i
                        :class="
                                checked ? 'text-green-400' : 'text-gray-600'
                              "
                        class="fas fa-check pl-4 group-hover:text-white text-gray-600"
                      ></i>
                    </button>
                  </option>
  
                  <option value="single trip"
                    x-data="{ 
                                          checked: false
                                      }"
                    @reset.window="checked = false"
                  >
                    <button
                      @click="count"
                      :class="checked ? 'text-green-500 bg-green-50' : ''"
                      class="group flex w-full items-center justify-between px-4 py-2 hover:bg-stone-500 hover:text-stone-300"
                    >
                      Single Trip
                      <i
                        :class="
                                checked ? 'text-green-400' : 'text-gray-600'
                              "
                        class="fas fa-check pl-4 group-hover:text-white text-gray-600"
                      ></i>
                    </button>
                  </option>
  
                  <option value="open trip"
                    x-data="{ 
                                          checked: false
                                      }"
                    @reset.window="checked = false"
                  >
                    <button
                      @click="count"
                      :class="checked ? 'text-green-500 bg-green-50' : ''"
                      class="group flex w-full items-center justify-between px-4 py-2 hover:bg-stone-500 hover:text-stone-300"
                    >
                      Open Trip
                      <i
                        :class="
                                checked ? 'text-green-400' : 'text-gray-600'
                              "
                        class="fas fa-check pl-4 group-hover:text-white text-gray-600"
                      ></i>
                    </button>
                  </option>

                </div>
              </select>

              </div>
            </div>
  
            
  
            <div
              class="ml-3 mb-3"
              x-ref="myFilter"
              x-data="{
                                show: false,
                                counter: 0,
                                }
                                "
              @reset.window="counter = 0"
            >
              <select name="price"
                id="dropdownDefault"
                data-dropdown-toggle="dropdown"
                x-on:click="open"
                type="button"
                class="flex min-h-[3rem] items-center justify-between rounded-md bg-stone-100 px-4 py-2 text-stone-800 border-none appearance-none"
              >
                Price
                <span
                  x-show="counter"
                  x-text="counter"
                  class="bg-green-500 text-green-100 card-pills--counter ml-2 rounded-md px-2 py-1 text-sm"
                  style="display: none"
                  >0</span
                >
                <i
                  class="fas fa-angle-down pl-3 text-stone-700 dark:text-stone-300"
                ></i>
              <div
                x-show="isOpen()"
                x-on:click.away="close"
                class="w-46 shadow-stone-55 absolute z-10 divide-y divide-gray-100 overflow-hidden rounded-md bg-white shadow-lg "
                data-popper-placement="bottom"
                style="display: none"
              >
                <div 
                  class="text-gray-700"
                  aria-labelledby="dropdownDefault"
                >
                  <option value="termurah"
                    x-data="{ 
                                          checked: false
                                      }"
                    @reset.window="checked = false"
                  >
                    <button
                      @click="count"
                      :class="checked ? 'text-green-500 bg-green-50' : ''"
                      class="group flex w-full items-center justify-between px-4 py-2 hover:bg-stone-500 hover:text-stone-300"
                    >
                      
                        cheapest
                      <i
                        :class="
                                checked ? 'text-green-400' : 'text-gray-600'
                              "
                        class="fas fa-check pl-4 group-hover:text-white text-gray-600"
                      ></i>
                    </button>
                  </option>
  
                  <option value="termahal"
                    x-data="{ 
                                          checked: false
                                      }"
                    @reset.window="checked = false"
                  >
                    <button
                      @click="count"
                      :class="checked ? 'text-green-500 bg-green-50' : ''"
                      class="group flex w-full items-center justify-between px-4 py-2 hover:bg-stone-500 hover:text-stone-300"
                    >
                    most expensive
                      <i
                        :class="
                                checked ? 'text-green-400' : 'text-gray-600'
                              "
                        class="fas fa-check pl-4 group-hover:text-white text-gray-600"
                      ></i>
                    </button>
                  </option>
  
                  
                </div>
              </div>
            </select>

            </div>
  
           
  
           <div class="ml-3 mb-3">
            <button type="submit" class="bg-orange-700 rounded-md px-4 py-2 text-white flex min-h-[3rem] items-center justify-between">Search</button>
           </div>
  
            <div>
              <button
                @click="$dispatch( 'reset', { reset : !reset } )"
                x-show="filterCounter"
                class="mb-3 ml-4 flex min-h-[3rem] items-center justify-between rounded-md bg-stone-500 px-4 py-2 text-stone-50"
                style="display: none"
              >
                <i class="fas fa-times pr-2 group-hover:text-white"></i>
                Reset
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      function filters() {
        return {
          filterCounter: 0,
          reset: false,
          resetCounter: false,
          open() {
            this.show = true;
          },
          close() {
            this.show = false;
          },
  
          isOpen() {
            return this.show === true;
          },
  
          count() {
            this.show = false;
            this.checked = !this.checked;
            if (this.checked) {
              this.counter = this.counter + 1;
              this.filterCounter = this.filterCounter + 1;
            } else if (!this.checked) {
              this.counter = this.counter - 1;
              this.filterCounter = this.filterCounter - 1;
            }
          },
        };
      }
    </script>
  </form>