@extends('admin.layouts.main')


@section('container')

<div>
  @include('admin.partials.sidebar')
    
 <!-- component -->
<!-- This is an example component -->
<form method="post" action="/admin/wisata/add" enctype="multipart/form-data" class="rounded-md w-full bg-white shadow-best my-20">
  @csrf



	<div x-data="app()" x-cloak>
		<div class="max-w-3xl mx-auto px-4 py-10">


			<div x-show.transition="step != 'complete'">	
				<!-- Top Navigation -->
				<div class="border-b-2 py-4">
					<div class="uppercase tracking-wide text-xs font-bold text-gray-500 mb-1 leading-tight" x-text="`Step: ${step} of 3`"></div>
					<div class="flex flex-col md:flex-row md:items-center md:justify-between">
						<div class="flex-1">
							<div x-show="step === 1">
								<div class="text-lg font-bold text-gray-700 leading-tight">Upload Wisata</div>
							</div>
							
							<div x-show="step === 2">
								<div class="text-lg font-bold text-gray-700 leading-tight">Upload Inclusion Eklusion </div>
							</div>

							<div x-show="step === 3">
								<div class="text-lg font-bold text-gray-700 leading-tight">Upload Equipment And Itinerary</div>
							</div>
						</div>

						<div class="flex items-center md:w-64">
							<div class="w-full bg-white rounded-full mr-2">
								<div class="rounded-full bg-green-500 text-xs leading-none h-2 text-center text-white" :style="'width: '+ parseInt(step / 3 * 100) +'%'"></div>
							</div>
							<div class="text-xs w-10 text-gray-600" x-text="parseInt(step / 3 * 100) +'%'"></div>
						</div>
					</div>
				</div>
				<!-- /Top Navigation -->

				<!-- Step Content -->
				<div class="py-10">	
					<div x-show.transition.in="step === 1">
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
							<label for="nama" class="font-bold mb-1 text-gray-700 block">Nama Kota</label>
							<input type="text" name="nama"
								class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
								>
						</div>

						<div class="mb-5">
							<label for="departure" class="font-bold mb-1 text-gray-700 block">Departure</label>
							<input type="datetime-local" name="departure"
								class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
								>
						</div>

            <div class="mb-5">
							<label for="long_tour" class="font-bold mb-1 text-gray-700 block">Long Tour</label>
							<input type="text" name="long_tour"
								class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
								>
						</div>
            <div class="mb-5">
              <label for="type" class="font-bold mb-1 text-gray-700 block">Type Tour</label>
              <select name="type" id="" class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium">
                  <option value="single_trip">Single Trip</option>
                  <option value="open_trip">Open Trip</option>
                  <option value="private_trip">Private Trip</option>
              </select>
          </div>

            <div class="mb-5">
              <label for="kota" class="font-bold mb-1 text-gray-700 block">Kota</label>
              <select name="kota" id="" class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium">
                  @foreach ($kota as $kota)
                  <option value="{{ $kota->id }}">{{ $kota->nama_kota }}</option>
                  @endforeach
              </select>
          </div>
          <div class="mb-5">
              <label for="loacation" class="font-bold mb-1 text-gray-700 block">Location</label>
              <input type="text" name="location" id="loacation" class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium">
          </div>

            <div class="mb-5">
              <div id="jemput">
                  <div class="mt-4 border rounded-md p-8 shadow-best" > 
                  <label for="titik_jemput" class="font-bold mb-1 text-gray-700 block">Titik Jemput </label>
                  <input type="text" name="titik_jemput[]" id="titik_jemput" class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium">
                  <label for="harga" class="font-bold mb-1 text-gray-700 block">Harga</label>
                  <input type="number" name="harga[]" id="harga" class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium">
              </div>
              </div>
              <h1 id="add_jemput" class="bg-blue-600 py-2 px-4 text-xl font-semibold text-white mt-2 rounded-md inline-block float-right cursor-pointer">+</h1>
          </div>

          <div class="mt-10">
            <label for="deskripsi" class="font-bold mb-1 text-gray-700 block">Deskripsi</label>
            <input type="text" name="deskripsi" id="deskripsi" class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium">
        </div>

					</div>

					<div x-show.transition.in="step === 2">

              <div class="mb-5 border rounded-md p-4">
                  <h1 class="font-semibold text-lg">Inclusion</h1>
                <div class="mb-5">
                  <div id="inclusion">
                      <div class="mt-4 border rounded-md p-8 shadow-best" > 
                      <input type="text" name="inclusion[]" id="inclusion" class="w-full h-12 rounded-md p-2 border mt-4 mb-2">
                  </div>
                  </div>
                  <h1 id="add_inclusion" class="bg-blue-600 py-2 px-4 text-xl font-semibold text-white mt-2 rounded-md inline-block float-right">+</h1>
              </div>

              </div>

              <div class="mb-5 mt-8 border rounded-md p-4">
                <h1 class="font-semibold text-lg">Exclusions</h1>
              <div class="mb-5">
                <div id="exclusion">
                    <div class="mt-4 border rounded-md p-8 shadow-best" > 
                    <input type="text" name="exclusion[]" id="exclusion" class="w-full h-12 rounded-md p-2 border mt-4 mb-2">
                </div>
                </div>
                <h1 id="add_exclusion" class="bg-blue-600 py-2 px-4 text-xl font-semibold text-white mt-2 rounded-md inline-block float-right">+</h1>
            </div>

            </div>



					</div>
					<div x-show.transition.in="step === 3">
						<div class="mb-5">
							<label for="email" class="font-bold mb-1 text-gray-700 block">Gender</label>
							
							<div class="flex">
								<label
									class="flex justify-start items-center text-truncate rounded-lg bg-white pl-4 pr-6 py-3 shadow-sm mr-4">
									<div class="text-teal-600 mr-3">
										<input type="radio" x-model="gender" value="Male" class="form-radio focus:outline-none focus:shadow-outline" />
									</div>
									<div class="select-none text-gray-700">Male</div>
								</label>

								<label
									class="flex justify-start items-center text-truncate rounded-lg bg-white pl-4 pr-6 py-3 shadow-sm">
									<div class="text-teal-600 mr-3">
										<input type="radio" x-model="gender" value="Female" class="form-radio focus:outline-none focus:shadow-outline" />
									</div>
									<div class="select-none text-gray-700">Female</div>
								</label>
							</div>
						</div>

						<div class="mb-5">
							<label for="profession" class="font-bold mb-1 text-gray-700 block">Profession</label>
							<input type="profession"
								class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
								placeholder="eg. Web Developer">
						</div>
					</div>
				</div>
				<!-- / Step Content -->
			</div>
		</div>

		<!-- Bottom Navigation -->	
		<div class="fixed bottom-0 left-0 right-0 py-5 bg-white shadow-md" x-show="step != 'complete'">
			<div class="max-w-3xl mx-auto px-4">
				<div class="flex justify-between ">
					<div class="w-1/2">
						<h1
							x-show="step > 1"
							@click="step--"
							class="w-32 focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium cursor-pointer" 
						>Previous</h1>
					</div>

					<div class="w-1/2 text-right">
						<h1
							x-show="step < 3"
							@click="step++"
							class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium cursor-pointer" 
						>Next</h1>

						<button
							@click="step = 'complete'"
							x-show="step === 3"
              type="submit"
							class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium" 
						>Complete</button>
					</div>
				</div>
			</div>
		</div>
		<!-- / Bottom Navigation https://placehold.co/300x300/e2e8f0/cccccc -->	
	</form>



    
</div>
@endsection