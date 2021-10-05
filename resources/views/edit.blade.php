<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<title>SIM PS. Satya Wijasena</title>
	</head>
	<body>
		<div class="container h-screen py-1 px-4 mx-auto bg-yellow-200">
			<div class="my-4 rounded-xl glass shadow-lg py-1 px-4">

				@if (count($errors))
					<div class="alert alert-danger">
						<ul class="mb-0">

							@foreach ($errors->all() as $error)
							<li class="m-0 p-0">{{ $error }}</li>
							@endforeach
							
						</ul>
					</div>
				@endif

				<p class="font-bold text-yellow-500 py-4 text-xl">
					Ubah Data Anggota
				</p>
				<div class="mb-4 rounded-xl bg-white px-4 py-1">
					<div class="pb-2 pt-1 text-gray-600">
						<form action="{{ route('anggota.update', $anggotas->id) }}" method="post">
							@method('PUT')
							@csrf
							<div class="form-control ">
								<label class="label">
								<span class="label-text">Nomor Induk</span>
								</label> 
								<input type="text" placeholder="nomor induk" name="nomor_induk" class="input bg-gray-100 h-8 border-0" value="{{ $anggotas->nomor_induk }}">
							</div>
							<div class="form-control">
								<label class="label">
								<span class="label-text">Nama</span>
								</label> 
								<input type="text" placeholder="nomor induk" name="nama" class="input bg-gray-100 h-8 border-0" value="{{ $anggotas->nama }}">
							</div>
							<div class="form-control">
								<label class="label">
								<span class="label-text">Tempat Lahir</span>
								</label> 
								<input type="text" placeholder="nomor induk" name="tempat_lahir" class="input bg-gray-100 h-8 border-0" value="{{ $anggotas->tempat_lahir }}">
							</div>
							<div class="form-control">
								<label class="label">
								<span class="label-text">Tanggal Lahir</span>
								</label> 
								<input type="date" placeholder="nomor induk" name="tanggal_lahir" class="input bg-gray-100 h-8 border-0" value="{{ $anggotas->tanggal_lahir }}">
							</div>
							<div class="form-control">
								<label class="label">
								<span class="label-text">Jenis Kelamin</span>
								</label> 
								<input type="text" placeholder="nomor induk" name="jenis_kelamin" class="input bg-gray-100 h-8 border-0" value="{{ $anggotas->jenis_kelamin }}">
							</div>
							<div class="form-control">
								<label class="label">
								<span class="label-text">Alamat</span>
								</label> 
								<input type="text" placeholder="nomor induk" name="alamat" class="input bg-gray-100 h-8 border-0" value="{{ $anggotas->alamat }}">
							</div>
							<div class="form-control">
								<label class="label">
								<span class="label-text">Ranting Latihan</span>
								</label> 
								<input type="text" placeholder="nomor induk" name="ranting_latihan" class="input bg-gray-100 h-8 border-0" value="{{ $anggotas->ranting_latihan }}">
							</div>
							<div class="form-control">
								<label class="label">
								<span class="label-text">Ikat Pinggang</span>
								</label> 
								<input type="text" placeholder="nomor induk" name="ikat_pinggang" class="input bg-gray-100 h-8 border-0" value="{{ $anggotas->ikat_pinggang }}">
							</div>
							<div class="form-control">
								<label class="label">
								<span class="label-text">Jabatan</span>
								</label> 
								<input type="text" placeholder="nomor induk" name="jabatan" class="input bg-gray-100 h-8 border-0" value="{{ $anggotas->jabatan }}">
							</div>
							<button class="btn btn-sm bg-red-400 border-0">Simpan</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
