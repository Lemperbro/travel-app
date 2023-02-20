@extends('admin.layouts.main')


@section('container')

<div>
    
    <!-- component -->
   <!-- This is an example component -->
   <form method="post" action="/admin/wisata/edit" enctype="multipart/form-data" class="rounded-md w-full bg-white shadow-best my-20">
     @csrf
   
   
   @foreach ($data as $data)
       
       <div>
           <div class="max-w-3xl mx-auto ">
   
   
               <div x-show.transition="step != 'complete'">	
                   <!-- Top Navigation -->
                   <div class="">
   
                   <!-- Step Content -->
                   <div class="py-10">	
                       <div >
                        
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
   
                               <div class="mx-auto w-48 text-gray-500 text-xs text-center mt-1">Click to add profile picture</div>
   
                               <input type="file" name="image[]" id="image" class="w-full hidden border object-cover rounded-md mt-4" multiple>
                           </div>
   
                           <div class="mb-5">
                               <label for="nama" class="font-bold mb-1 text-gray-700 block">Nama Wisata</label>
                               <input type="text" name="nama"
                                   class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                   value="{{ $data->nama_wisata }}">
                           </div>
   
                           <div class="flex gap-4 justify-between">
                               <div class="">
                                   <label for="departure" class="font-bold mb-1 text-gray-700 block">Departure</label>
                                   <input type="datetime-local" name="departure"
                                       class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                       value="{{ $data->tanggal }}">
                               </div>
                               <div class="">
                                   <label for="long_tour" class="font-bold mb-1 text-gray-700 block">Long Tour</label>
                                   <input type="text" name="long_tour"
                                       class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                       value="{{ $data->long_tour }}">
                               </div>
                               <div class="">
                                   <label for="type" class="font-bold mb-1 text-gray-700 block">Type Tour</label>
                                   <select name="type" id="" class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium">
                                       <option value="single trip" {{ ($data->tour_type === 'single trip') ? 'selected' : '' }}>Single Trip</option>
                                       <option value="open trip" {{ ($data->tour_type === 'open trip') ? 'selected' : '' }}>Open Trip</option>
                                       <option value="private trip" {{ ($data->tour_type === 'private trip') ? 'selected' : '' }}>Private Trip</option>
                                   </select>
                               </div>
                           </div>
   
   
   
   
   
                    <div class="mb-5">
                        <label for="kota" class="font-bold mb-1 text-gray-700 block">Kota</label>
                        <select name="kota" id="" class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium">
                            @foreach ($kota as $kota)
                            <option value="{{ $kota->id }}" {{ ($data->kota->id === $kota->id) ? 'selected' : '' }}>{{ $kota->nama_kota }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-5">
                        <label for="loacation" class="font-bold mb-1 text-gray-700 block">Location</label>
                        <input type="text" name="location" id="loacation" class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium" value="{{ $data->location }}">
                    </div>
        

               <div class="mb-5">
                        <div id="jemput">
                        <h1 class="font-semibold text-gray-700">Titik Jemput</h1>
                        @foreach ($data->jemput as $jemput)
        
                            <div class="mt-4 grid grid-cols-2 gap-4 border mx-auto w-full" > 
        
                    <div class="">
                        <label for="titik_jemput" class="font-bold text-sm mb-1 text-gray-700 block">Lokasi</label>
                            <input type="text" name="titik_jemput[]" id="titik_jemput" class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium" value="{{ $jemput->lokasi }}">
                        </div>
        
                        <div>
                            <label for="harga" class="font-bold text-sm mb-1 text-gray-700 block">Harga</label>
                            <input type="number" name="harga[]" id="harga" class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium" value="{{ $jemput->harga }}">
                        </div>
        
                        </div>
                        @endforeach
        
                        </div>
                        <h1 id="add_jemput" class="bg-blue-600 py-2 px-4 text-xl font-semibold text-white mt-2 rounded-md inline-block float-right cursor-pointer">+</h1>
             </div>

             <div class="mt-10">
               <label for="deskripsi" class="font-bold mb-1 text-gray-700 block">Deskripsi</label>
               <textarea type="text" name="deskripsi" id="deskripsi" class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium">{{ $data->deskripsi }}</textarea>
           </div>
   
           <div class="mb-5">
                     <h1 class="font-semibold text-lg">Inclusion</h1>
                     <div class="flex flex-wrap gap-4">
                    <div id="inclusion" class="flex flex-wrap gap-4">
                        <input type="text" name="inclusion[]" id="inclusion" class="h-12 rounded-md p-2 border">  
                    </div>
                    <h1 id="add_inclusion" class="bg-blue-600 py-2 px-4 text-xl font-semibold text-white h-12 rounded-md inline cursor-pointer">+</h1>
                </div> 
        </div>


        <div class="mb-5">
            <h1 class="font-semibold text-lg">Exclusion</h1>
            <div class="flex flex-wrap gap-4">
           <div id="exclusion" class="flex flex-wrap gap-4">
               <input type="text" name="exclusion[]" id="inclusion" class="h-12 rounded-md p-2 border">  
           </div>
           <h1 id="add_exclusion" class="bg-blue-600 py-2 px-4 text-xl font-semibold text-white h-12 rounded-md inline cursor-pointer">+</h1>
       </div> 
</div>


   
<div class="mb-5" >
        <h1 class="font-semibold text-lg">Itenerary</h1>
        <div class="mb-1" id="day">
            <h3>Day 1</h3>
                <div id="itenerary">
                
                    <input type="text" name="agenda[]" id="agenda" class="w-full h-12 rounded-md p-2 border mt-4 mb-2">
                    <textarea id="banner-message" class="message w-full h-20 relative" name="itenerary[]" style="">
                    </textarea>
                        
        </div>

        </div>
    <h1 id="add_day" class="bg-blue-600 p-2 text-lg font-semibold text-white rounded-md inline-block justify-center cursor-pointer">Add Day</h1>
    
    </div>
   

    <div class="mb-5 mt-24 flex flex-wrap gap-x-4">

          <div id="equipment">

          <h1 class="font-semibold text-lg">Equipment 1</h1>
            <div class="flex gap-x-4">
              <input type="file" name="images[]" class="border rounded-md ">
              <input type="text" name="equipment[]" id="equipment" class="rounded-md p-2 border ">
            </div>
        
          </div>



        </div>
        <h1 id="add_equipment" class="bg-blue-600 py-2 px-4 text-xl font-semibold text-white rounded-md cursor-pointer text-center w-[10%] mx-auto">+</h1>
   
               
   

           <!-- / Bottom Navigation https://placehold.co/300x300/e2e8f0/cccccc -->	
   
   @endforeach
   
       </form>
   
   
   
       
   </div>
@endsection