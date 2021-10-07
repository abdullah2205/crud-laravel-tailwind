<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<title>SIM PS</title>
	</head>
	<body>
		<div class="container h-screen py-1 px-4 mx-auto bg-green-200">
			<div class="my-4 rounded-xl glass shadow-lg py-1 px-4">
				<p class="font-bold text-green-500 py-4 text-xl">
					Tambah Data Anggota
				</p>
				{{-- Error Alert  --}}
				@if (count($errors))
				<div class="alert bg-red-500 text-white block mb-4">
					@foreach ($errors->all() as $error)
					<div class="py-1">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-6 h-6 mx-2 stroke-current"> 
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>                         
						</svg> 
						<label>{{ $error }}</label>
					</div>
					@endforeach
				</div>
				@endif
				{{-- End Error Alert --}}
				<div class="mb-4 rounded-xl bg-white px-4 py-1">
					<div class="pb-2 pt-1 text-gray-600">
						<form action="{{ route('anggota.store') }}" method="post" class="grid grid-cols-3 gap-3">
							@csrf
							<div class="form-control">
								<label class="label">
									<span class="label-text">Nomor Induk</span>
								</label>
								<input type="text" name="nomor_induk" class="input input-warning bg-gray-100 input-sm border-0" value="{{ old('nomor_induk') }}">
							</div>
							<div class="form-control">
								<label class="label">
									<span class="label-text">Nama</span>
								</label> 
								<input type="text" name="nama" class="input input-warning bg-gray-100 input-sm border-0" value="{{ old('nama') }}">
							</div>
							<div class="form-control">
								<label class="label">
									<span class="label-text">Tempat Lahir</span>
								</label> 
								<input type="text" name="tempat_lahir" class="input input-warning bg-gray-100 input-sm border-0" value="{{ old('tempat_lahir') }}">
							</div>
							<div class="form-control">
								<label class="label">
									<span class="label-text">Tanggal Lahir</span>
								</label> 
								<input type="date" name="tanggal_lahir" class="input input-warning bg-gray-100 input-sm border-0" value="{{ old('tanggal_lahir') }}">
							</div>
							<div class="form-control">
								<label class="label">
									<span class="label-text">Jenis Kelamin</span>
								</label> 
								<div class="flex space-x-2 bg-gray-100 rounded-lg">
									<div class="form-control w-48">
										<label class="cursor-pointer inline-flex items-center py-1">
											<input type="radio"name="jenis_kelamin" class="ml-2 radio radio-md radio-accent" value="Laki-laki" {{ (old('jenis_kelamin') == "Laki-laki") ? "checked" : ""}}>
											<span class="label-text ml-2">Laki-laki</span> 
										</label>
									</div>
									<div class="form-control w-48">
										<label class="cursor-pointer inline-flex items-center py-1">
											<input type="radio" name="jenis_kelamin" class="ml-2 radio radio-md radio-accent" value="Perempuan" {{ (old('jenis_kelamin') == "Perempuan") ? "checked" : ""}}>
											<span class="label-text ml-2">Perempuan</span>
										</label>
									</div>
								</div>
							</div>
							<div class="form-control">
								<label class="label">
									<span class="label-text">Alamat</span>
								</label> 
								<input type="text" name="alamat" class="input input-warning bg-gray-100 input-sm border-0" value="{{ old('alamat') }}">
							</div>
							<div class="form-control">
								<label class="label">
									<span class="label-text">Ranting Latihan</span>
								</label> 
								<input type="text" name="ranting_latihan" class="input input-warning bg-gray-100 input-sm border-0" value="{{ old('ranting_latihan') }}">
							</div>
							<div class="form-control">
								<label class="label">
									<span class="label-text">Ikat Pinggang</span>
								</label>
								<select class="select select-sm border-0 bg-gray-100 select-warning font-normal" name="ikat_pinggang">
									<option disabled="disabled" selected="selected">Pilih Ikat Pinggang</option> 
									<option value="Putih"> Putih</option>
									<option value="Kuning"> Kuning</option>
									<option value="Oranye"> Oranye</option>
									<option value="Hijau"> Hijau</option>
									<option value="Hijau Bintang"> Hijau Bintang</option>
									<option value="Biru"> Biru</option>
									<option value="Biru Bintang"> Biru Bintang</option>
									<option value="Cokelat"> Cokelat</option>
									<option value="Cokelat Bintang"> Cokelat Bintang</option>
									<option value="Hitam"> Hitam</option>
									<option value="Hitam Pembina"> Hitam Pembina</option>
								</select>
							</div>
							<div class="form-control">
								<label class="label">
									<span class="label-text">Jabatan</span>
								</label> 
								<select class="select select-sm border-0 bg-gray-100 select-warning font-normal" name="jabatan">
									<option disabled="disabled" selected="selected">Pilih Jabatan</option> 
									<option value="Anggota"> Anggota</option>
									<option value="Pengurus"> Pengurus</option>
									<option value="Dewan Pendekar"> Dewan Pendekar</option>
								</select>
							</div>
							<div class="flex justify-end col-span-3 space-x-1">
								<a href="{{ route('anggota.index') }}" class="mt-3">
									<button type="button" class="btn btn-sm border-0 bg-red-500 hover:bg-red-600 rounded-lg text-white mr-1"> Batal </button>
								</a>
								<button class="btn btn-sm mt-3 mb-1 right-0  border-0 bg-yellow-500 hover:bg-yellow-600 rounded-lg text-white">Simpan</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
