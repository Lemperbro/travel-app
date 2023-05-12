@extends('admin.layouts.main')

@section('container')

<div>
    
 <!-- component -->
<!-- This is an example component -->
@foreach ($data as $data)

<form method="post" action="/admin/wisata/edit/{{ $data->id }}" enctype="multipart/form-data" class="mx-auto mt-10 w-full container" 
    x-data="{
        slide : 1,
        ActiveSlide : 1 ,
        total : $refs.Content.children.length,
        previous(){
            if(this.slide > 1)
                this.slide--
        },
        next(){
            if(this.slide < this.total)
                this.slide++

                
                
        }
    }">
    @csrf
        <div x-ref="Content" class="bg-white dark:bg-gray-700  rounded-lg p-10 h-[85vh] overflow-auto">

            <!-- slide 1 start -->
            <div x-show="slide == 1" >
                <!-- step-1 -->
                <div class="flex justify-between mb-10">
                    <h1 x-text="`Step : ${slide} of ${total}`" class="text-gray-900 dark:text-white"></h1>
                    <h1 class="font-semibold text-gray-900 dark:text-white">Upload Wisata</h1>
                </div>


                
                <div id="previewContainer" class="flex gap-x-2 ">
                </div>

                <div class="mb-5 text-center">  
                    <label 
                        for="image"
                        type="button"
                        class="cursor-pointer inine-flex justify-between items-center focus:outline-none border py-2 px-4 rounded-lg shadow-sm text-left text-gray-600 bg-white hover:bg-gray-100 font-medium"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-flex flex-shrink-0 w-6 h-6 -mt-1 mr-1" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                            <path d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
                            <circle cx="12" cy="13" r="3" />
                        </svg>						
                        Browse Image
                    </label>

                    <div class="mx-auto w-48 text-xs text-center mt-1 text-gray-500 dark:text-gray-200">Click to add profile picture</div>

                    <input type="file" name="image[]" id="image" class="w-full hidden border object-cover rounded-md mt-4" multiple>
                </div>

                <div class="mb-5">
                    <label for="nama" class="font-bold mb-1 text-gray-900 dark:text-white block">Tour Name</label>
                    <input type="text" name="nama"
                        class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline bg-gray-200 dark:bg-gray-900 text-gray-900 dark:text-white border-none font-medium"
                        value="{{ $data->nama_wisata }}">
                </div>

                {{-- percobaan start --}}
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 my-4">

                    <div class="">
                        <label for="harga" class="font-bold mb-1 text-gray-900 dark:text-white block">Date</label>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-2">
                            <div>
                            <label for="start_date" class=" text-xs mb-1 text-gray-900 dark:text-white block">Start Date</label>
                            <input type="date" name="start_date" id="start_date"
                                class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline bg-gray-200 dark:bg-gray-900 text-gray-900 dark:text-white border-none font-medium"
                                value="">
                            </div>

                            <div>
                                <label for="end_date" class=" text-xs mb-1 text-gray-900 dark:text-white block">End Date</label>
                                <input type="date" name="end_date" id="end_date"
                                    class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline bg-gray-200 dark:bg-gray-900 text-gray-900 dark:text-white border-none font-medium"
                                    value="">
                            </div>

                        </div>

                    </div>
   
                    <div class="relative ">
                        <label for="age" class="font-bold mb-1 text-gray-900 dark:text-white block">Age</label>

                        <select name="age" id="age" class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline bg-gray-200 dark:bg-gray-900 text-gray-900 dark:text-white border-none font-medium absolute bottom-0">
                            <option value="" selected>Select Age</option>
                            <option value="">5-10 Th</option>
                            <option value="">11-20 Th</option>
                            <option value="">21-30 Th</option>
                        </select>
                        
                    </div>

                    <div class="relative">
                        <label for="price" class="font-bold mb-1 text-gray-900 dark:text-white block">Price</label>
                        <input type="number" name="price"
                            class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline bg-gray-200 dark:bg-gray-900 text-gray-900 dark:text-white border-none font-medium absolute bottom-0"
                            value="">
                    </div>
   
                   </div>
                   {{-- percobaan end --}}
                <div class="grid grid-cols-2 gap-4">

                 <div class="">
                     <label for="harga" class="font-bold mb-1 text-gray-900 dark:text-white block">Price</label>
                     <input type="number" name="harga"
                         class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline bg-gray-200 dark:bg-gray-900 text-gray-900 dark:text-white border-none font-medium"
                         value="{{ $data->harga }}">
                 </div>

                 <div class="">
                     <label for="departure" class="font-bold mb-1 text-gray-900 dark:text-white block">Departure</label>
                     <input type="datetime-local" name="departure"
                         class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline bg-gray-200 dark:bg-gray-900 text-gray-900 dark:text-white border-none font-medium"
                         value="{{ $data->tanggal }}">
                 </div>

                </div>



                <div class="grid grid-cols-2 gap-4 my-4">

                    <div class="">
                        <label for="long_tour" class="font-bold mb-1 text-gray-900 dark:text-white block">Long Tour</label>
                        <input type="text" name="long_tour"
                            class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline bg-gray-200 dark:bg-gray-900 text-gray-900 dark:text-white border-none font-medium"
                            value="{{ $data->long_tour }}">
                    </div>

                    <div class="">
                        <label for="type" class="font-bold mb-1 text-gray-900 dark:text-white block">Type Tour</label>
                        <select name="type" id="" class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline bg-gray-200 dark:bg-gray-900 text-gray-900 dark:text-white border-none font-medium">
                            <option value="single trip" {{ ($data->tour_type === 'single trip') ? 'selected' : '' }}>Single Trip</option>
                            <option value="open trip" {{ ($data->tour_type === 'open trip') ? 'selected' : '' }}>Open Trip</option>
                            <option value="private trip" {{ ($data->tour_type === 'private trip') ? 'selected' : '' }}>Private Trip</option>
                        </select>
                    </div>
                </div>







         <div class="grid grid-cols-2 gap-4">

             <div class="mb-5">
                 <label for="kota" class="font-bold mb-1 text-gray-900 dark:text-white block">City</label>
                 <select name="kota" id="" class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline bg-gray-200 dark:bg-gray-900 text-gray-900 dark:text-white border-none font-medium">
                     @foreach ($kota as $kota)
                     <option value="{{ $kota->id }}" {{ ($data->kota->id === $kota->id) ? 'selected' : '' }}>{{ $kota->nama_kota }}</option>
                     @endforeach
                 </select>
             </div>

             <div class="mb-5">
                 <label for="loacation" class="font-bold mb-1 text-gray-900 dark:text-white block">Location</label>
                 <input type="text" name="location" id="loacation" class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline bg-gray-200 dark:bg-gray-900 text-gray-900 dark:text-white border-none font-medium" value="{{ $data->location }}">
             </div>
             
         </div>



  <div class="mt-10">
    <label for="deskripsi" class="font-bold mb-1 text-gray-900 dark:text-white block">Description</label>
    <textarea type="text" name="deskripsi" id="deskripsi" class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline bg-gray-200 dark:bg-gray-900 text-gray-900 dark:text-white border-none font-medium">{{ $data->deskripsi }}</textarea>
</div>


            </div>


            <!-- slide 1 end -->

            <!-- slide 2 start -->
            <div x-show="slide == 2" >
                <!-- step 2 -->
                <div class="flex justify-between mb-10">
                    <h1 x-text="`Step : ${slide} of ${total}`" class="text-gray-900 dark:text-white"></h1>
                    <h1 class="font-semibold text-gray-900 dark:text-white">Upload Tour</h1>
                </div>


                <div class="mb-5">
                    <h1 class="font-semibold text-lg text-gray-900 dark:text-white">Inclusion</h1>
                    <div class="flex flex-wrap gap-4">
                   <div id="inclusion" class="flex flex-wrap gap-4">

                       @foreach ($inclusion as $inclusions)
                                       
                       <div class="flex gap-x-2" id="area_inclusion">
                       <input type="text" name="inclusion[]" id="inclusion" class="h-12 rounded-md p-2 bg-gray-200 dark:bg-gray-900 border-none text-gray-900 dark:text-white" value="{{ $inclusions }}"> 
                       <h1 id="remove_inclusion" class="text-white bg-red-600 py-2 px-4 rounded-md inline-block text-xl font-semibold cursor-pointer">-</h1>
                       </div>
                       @endforeach
                       
                   </div>
                   <h1 id="add_inclusion" class="bg-blue-600 py-2 px-4 text-xl font-semibold text-white h-12 rounded-md inline cursor-pointer">+</h1>
               </div> 
       </div>


                <div class="mb-5">
                    <h1 class="font-semibold text-lg text-gray-900 dark:text-white">Exclusion</h1>
                    <div class="flex flex-wrap gap-4">
                    <div id="exclusion" class="flex flex-wrap gap-4">
                    @foreach ($exclusion as $exclusions)
                        
                    <div class="flex gap-x-2" id="area_exclusion">
                        <input type="text" name="exclusion[]" id="exclusion" class="h-12 rounded-md p-2 bg-gray-200 dark:bg-gray-900 border-none text-gray-900 dark:text-white" value="{{ $exclusions }}"> 
                        <h1 id="remove_exclusion" class="text-white bg-red-600 py-2 px-4 rounded-md inline-block text-xl font-semibold cursor-pointer">-</h1>
                        </div> 
                    @endforeach

                    </div>
                    <h1 id="add_exclusion" class="bg-blue-600 py-2 px-4 text-xl font-semibold text-white h-12 rounded-md inline cursor-pointer">+</h1>
                </div> 
            </div>


            </div>

            <!-- slide 2 end -->


            <!-- slide 3 start -->
            <div x-show="slide == 3" >
                <!-- step 3 -->
                <div class="flex justify-between mb-10">
                    <h1 x-text="`Step : ${slide} of ${total}`" class="text-gray-900 dark:text-white"></h1>
                    <h1 class="font-semibold text-gray-900 dark:text-white">Upload Tour</h1>
                </div>


                @php
                $number = 0;
                @endphp
                
                <div class="mb-5">
                        <h1 class="font-semibold text-lg text-gray-900 dark:text-white">Itenerary</h1>
                        <div class="mb-1" id="day">
                            @foreach ($data->itenerary as $itenerary)

                                <div id="itenerary">
                                    @php
                                        $no = 0;
                                    @endphp


                                    @php
                                        $no++;
                                    @endphp
                                <h3 class="mt-1 text-gray-900 dark:text-white">Day {{ $no }}</h3>
                                <input type="hidden" id="count_day" value="{{ $data->itenerary->count() }}">
                                <input type="hidden" name="id_itenerary[]" value="{{ $itenerary->id }}">
                                    <input type="text" name="agenda[]" id="agenda" class="w-full h-12 rounded-md p-2 bg-gray-200 dark:bg-gray-900 border-none text-gray-900 dark:text-white mt-4 mb-2" value="{{ $itenerary->agenda }}">
                                    <div class="grid lg:grid-cols-2 gap-x-4 my-4">
                                        <div class="w-full">
                                            <h1 class="text-gray-900 dark:text-white">Start Time</h1>
                                            <input type="time" name="startTime[]" value="{{ $itenerary->startTime }}" class="bg-gray-900 border border-gray-700 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white appearance-none w-full">
                                        </div>
                                        <div class="w-full">
                                            <h1 class="text-gray-900 dark:text-white">End Time</h1>
                                            <input type="time" name="endTime[]" value="{{ $itenerary->endTime }}" class="bg-gray-900 border border-gray-700 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white appearance-none w-full">
                                        </div>
                                    </div>
                                    <textarea id="banner-message" class="message w-full h-20 relative hidden">
                                        
                                    </textarea>
                                    <textarea type="text" id="banner-message" class="message w-full h-20 relative bg-gray-200 dark:bg-gray-900 border-none text-gray-900 dark:text-white" name="itenerary[]">{{ $itenerary->deskripsi }}</textarea>

                                    <h1 id="remove_itenerary" class="bg-red-600 text-white rounded-md inline-block py-1 px-3 font-semibold text-2xl float-right mt-4 cursor-pointer remove_itenerary" data-id="{{ $itenerary->id }}">-</h1>
                
                                
                                        
                        </div>
                        @endforeach

                
                        </div>
                    <h1 id="add_day" class="bg-blue-600 p-2 text-lg font-semibold text-white rounded-md inline-block justify-center cursor-pointer mt-10">Add Day</h1>
                    
                    </div>
                
                

                <div class="mb-5 mt-24 ">

                  <div class="mb-5" id="equipment">
                    <h1 class="font-semibold text-lg text-gray-900 dark:text-white">Equipment </h1>

                    <div  class="mt-4">
                        <input type="file" name="images" class="w-full bg-gray-200 dark:bg-gray-900 border-none text-gray-900 dark:text-white rounded-md">
                    </div>

                    
                </div>
                </div>

                
            </div>
            <!-- slide 3 end -->


        </div>

        <div class="text-center my-2 flex gap-x-2 mx-auto justify-center ">
            <h1 @click="previous" class="bg-gray-300 rounded p-2 cursor-pointer" :class="{'bg-purple-300' : slide > 1}">Previous</h1>
            <h1 @click="next" class="bg-purple-300 rounded p-2 cursor-pointer" :class="{'hidden' : slide === total}">Next</h1>
            <button type="submit" class="bg-purple-300 rounded p-2 cursor-pointer" :class="{'hidden' : slide < total}">Send</button>
        </div>
    </form>
@endforeach

    
</div>
@endsection