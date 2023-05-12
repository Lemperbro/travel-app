@extends('layouts.two')
<div class="flex flex-col items-center justify-center min-h-screen bg-center bg-cover font-mono">

	<div class="max-w-lg w-full h-full mx-auto z-10 bg-orange-500 rounded-3xl">
		<div class="flex flex-col">
			<div class="bg-white relative drop-shadow-2xl  rounded-3xl p-4 m-4">
				<div class="flex-none sm:flex">
					<div class="flex-auto justify-evenly">
						<div class="flex items-center justify-between">
							<div class="flex items-center mt-2">
								<span class="mr-3 rounded-full bg-white w-28 ">
   							 		<img src="{{ asset('img/logo.png') }}" class="">
								</span>
							</div>
							<div class="ml-auto text-center">
								<h1 class="text-sm text-orange-600">Order Code</h1>
								<h1 class="font-semibold text-sm">{{ $data->doc_no }}</h1>
							</div>
						</div>
						<div class=" border-dashed border-b-2 my-5"></div>
            <div class="">
              <h1 class="text-center font-semibold text-xl my-5 font-mono">{{ $data->wisata->nama_wisata }} - {{ $data->wisata->kota->nama_kota }}</h1>
            </div>


			<div class="flex items-center my-5 text-sm justify-between">
				<div class="flex flex-col text-center">
					<span class="text-sm text-orange-600 font-semibold">Name Of Passanger</span>
					<h1 class="font-semibold text-base">{{ $data->user->username }}</h1>
				</div>


				<div class="flex flex-col text-center">
					<span class="text-sm text-orange-600 font-semibold">Departure</span>
					<h1 class="text-xs">{{ \Carbon\Carbon::parse($data->wisata->tanggal)->format('d,F,Y') }}</h1>
					<h1 class="text-xs">{{ \Carbon\Carbon::parse($data->wisata->tanggal)->format('h:i') }} WIB</h1>
				</div>

			</div>
						<div class="flex items-center">
							<div class="flex flex-col">
								<div class="flex-auto text-xs text-gray-400 my-1">
								</div>

								<div class="w-full flex-none text-lg text-orange-600 font-bold leading-none">Pick Up</div>
								<div class="flex justify-between mt-2 w-[150px]">
									<div class="text-xs">
										<h1>Kota</h1>
										<h1>Location</h1>
									</div>
									<div class="text-xs">
										<h1>:</h1>
										<h1>:</h1>
									</div>
									<div class="text-xs">
										<h1>{{ $data->pickup_kota }}</h1>
										<h1>{{ $data->pickup_point }}</h1>
									</div>
								</div>


							</div>
							<div class="flex flex-col mx-auto">

								</div>
								<div class="flex flex-col ">

									<div class="w-full flex-none text-lg text-orange-600 font-bold leading-none">Drop Point</div>
									
									<div class="flex justify-between mt-2 w-[150px]">
										<div class="text-xs">
											<h1>Kota</h1>
											<h1>Location</h1>
										</div>
										<div class="text-xs">
											<h1>:</h1>
											<h1>:</h1>
										</div>
										<div class="text-xs">
											<h1>{{ $data->drop_kota }}</h1>
											<h1>{{ $data->drop_point }}</h1>
										</div>
									</div>

								</div>
							</div>
							<div class=" border-dashed border-b-2 my-5 pt-5">
								<div class="absolute rounded-full w-5 h-5 bg-orange-500 -mt-2 -left-2"></div>
								<div class="absolute rounded-full w-5 h-5 bg-orange-500 -mt-2 -right-2"></div>
							</div>
							<div class="flex items-center mb-4">
								<div class="flex flex-col text-sm">
									<span class="text-orange-600 font-semibold">Type Tour</span>
									<div class="font-semibold">{{ $data->wisata->tour_type }}</div>

								</div>
								<div class="flex flex-col mx-auto text-sm">
									<div class="font-semibold text-green-600 text-center text-2xl font-mono">{{ $data->payment_status }}</div>

								</div>
								<div class="flex flex-col text-sm">
									<span class="text-orange-600 font-semibold">Price</span>
                 				 <div class="font-semibold">Rp. {{ $data->amount }}</div>



								</div>
							</div>

							<div class="border-dashed border-b-2 my-5 pt-5">
								<div class="absolute rounded-full w-5 h-5 bg-orange-500 -mt-2 -left-2"></div>
								<div class="absolute rounded-full w-5 h-5 bg-orange-500 -mt-2 -right-2"></div>
							</div>


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>