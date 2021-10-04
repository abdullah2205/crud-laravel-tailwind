<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="container py-4 mx-auto">
		<div class="my-4 rounded-xl bg-gray-200 bg-opacity-50 shadow-lg py-2 px-4">
			<p class="font-bold text-blue-500 py-4 text-xl">
				Data Anggota PS. Sayta Wijasena
			</p>
			<button  id="delete-btn" class="mb-2 py-1  w-24 text-center bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 rounded-lg text-white">
				Tambah
			</button>
			<div class="mb-4 mt-2 rounded-xl bg-white">
				<div class="pb-2 pt-1">
					@if (count($errors))
						<div class="alert alert-danger">
							<ul class="mb-0">
								@foreach ($errors->all() as $error)
									<li class="m-0 p-0">{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
			
					@if ($msg = Session::get('success'))
						<div class="alert-toast fixed bottom-0 right-0 m-8 w-5/6 md:w-full max-w-xs">
							<input type="checkbox" class="hidden" id="footertoast">
							<label class="close cursor-pointer flex items-start justify-between w-full p-3 bg-green-400 h-24 rounded-xl shadow-lg text-white" for="footertoast">
								{{ $msg }}
							<svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
								<path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
							</svg>
							</label>
						</div>
					@endif

					<div class="hidden bg-black bg-opacity-50 absolute inset-0 items-center justify-center text-gray-800" id="overlay">
						<div class="bg-gray-200 max-w-sm p-3 rounded-xl shadow-md">
							<div class="flex justify-between items-center ">
								<h4 class="text-lg font-bold mb-2">Konfirmasi Hapus</h4>
								<svg id="close-modal" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:bg-gray-400 hover:text-white rounded-md" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
								</svg>
							</div>
							<div>
								<p>
									Data yang telah dihapus tidak bisa dikembalikan, yakin hapus data?
								</p>
							</div>
							<div class="mt-3 flex justify-end space-x-3">
								<button class="px-3 py-1 hover:bg-red-300 hover:text-red-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">Batal</button>
								<button class="bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 px-3 py-1 rounded-lg text-white">Hapus</button>
							</div>
						</div>
					</div>
					<table class="table-auto w-full text-left">
						<thead class="text-blue-500">
							<tr>
								<th class="px-4 py-2 ">No. Induk</th>
								<th>Nama</th>
								<th>Tempat Lahir</th>
								<th>Tanggal Lahir</th>
								<th>Jenis Kelamin</th>
								<th>Alamat</th>
								<th>Ranting Latihan</th>
								<th>Ikat Pinggang</th>
								<th>Jabatan</th>
								<th class="w-36">Aksi</th>
							</tr>
						</thead>
						<tbody class="text-gray-600 bg-white">
							<?php $no=1?>
							@foreach ($anggotas as $no => $anggota)
							<tr class="hover:bg-gray-200 hover:bg-opacity-50">
								<td class="px-4 py-2">{{ $anggota->nomor_induk }}</td>
								<td>{{ $anggota->nama }}</td>
								<td>{{ $anggota->tempat_lahir }}</td>
								<td>{{ $anggota->tanggal_lahir }}</td>
								<td>{{ $anggota->jenis_kelamin }}</td>
								<td>{{ $anggota->alamat }}</td>
								<td>{{ $anggota->ranting_latihan }}</td>
								<td>{{ $anggota->ikat_pinggang }}</td>
								<td>{{ $anggota->jabatan }}</td>
								<td>
									<form action="{{ route('anggota.destroy', $anggota->id) }}" method="post">
										<a href="{{ route('anggota.edit', $anggota->id) }}">
											<button class="bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-opacity-50 px-2 py-1 rounded-lg text-white mr-1"> Ubah </button>
										</a>
										@csrf
										@method('DELETE')
											<button class="bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 px-2 py-1 rounded-lg text-white" onclick="return confirm('Are you sure you want to Delete this Data?')">Hapus</button>
									</form>
								</td>
							</tr>
							<tr>
								<td colspan="6" class="hiddenRow">
									<div class="accordian-body collapse p-4" id="data{{ $anggotas->firstItem() + $no }}">
										<div class="row">
											<div class="col-md-7">
												<table>
													<tr>
														<th class="text-blue-500">Tempat Lahir</th>
														<td class="px-4">:</td>
														<td>{{ $anggota->tempat_lahir }}</td>
													</tr>
													<tr>
														<th class="text-blue-500">Tanggal Lahir</th>
														<td class="px-4">:</td>
														<td>{{ $anggota->tanggal_lahir }}</td>
													</tr>
													<tr>
														<th class="text-blue-500">Alamat</th>
														<td class="px-4">:</td>
														<td>{{ $anggota->alamat }}</td>
													</tr>
													<tr>
														<th class="text-blue-500">Jabatan</th>
														<td class="px-4">:</td>
														<td>{{ $anggota->jabatan }}</td>
													</tr>
												</table>
											</div>
										</div>
									</div> 
								</td> 
							</tr>
							@endforeach
						</tbody>
					</table>
					{{ $anggotas->links('layouts/pagination') }}
				</div>
			</div>
		</div>
	</div>

	<script>
		window.addEventListener('DOMContentLoaded', function() {
			const overlay = document.querySelector('#overlay')
			const delBtn = document.querySelector('#delete-btn')
			const closeBtn = document.querySelector('#close-modal')

			delBtn.addEventListener('click', () => {
				overlay.classList.remove('hidden')
				overlay.classList.add('flex')
			})
			closeBtn.addEventListener('click', () => {
				overlay.classList.add('hidden')
				overlay.classList.remove('flex')
			})
		})
	</script>
	  <style>

		/*Banner open/load animation*/
		.alert-banner {
			-webkit-animation: slide-in-top 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
					animation: slide-in-top 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
		}

		/*Banner close animation*/
		.alert-banner input:checked ~ * {
			-webkit-animation: slide-out-top 0.5s cubic-bezier(0.550, 0.085, 0.680, 0.530) both;
					animation: slide-out-top 0.5s cubic-bezier(0.550, 0.085, 0.680, 0.530) both;		
		}

		/*Toast open/load animation*/
		.alert-toast {
			-webkit-animation: slide-in-right 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
					animation: slide-in-right 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
		}

		/*Toast close animation*/
		.alert-toast input:checked ~ * {
			-webkit-animation: fade-out-right 0.7s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
					animation: fade-out-right 0.7s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
		}

		/* -------------------------------------------------------------
		 * Animations generated using Animista * w: http://animista.net, 
		 * ---------------------------------------------------------- */

		@-webkit-keyframes slide-in-top{0%{-webkit-transform:translateY(-1000px);transform:translateY(-1000px);opacity:0}100%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}}@keyframes slide-in-top{0%{-webkit-transform:translateY(-1000px);transform:translateY(-1000px);opacity:0}100%
		{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}}@-webkit-keyframes slide-out-top{0%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}100%{-webkit-transform:translateY(-1000px);transform:translateY(-1000px);opacity:0}}@keyframes slide-out-top{0%
			{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}100%{-webkit-transform:translateY(-1000px);transform:translateY(-1000px);opacity:0}}@-webkit-keyframes slide-in-bottom{0%{-webkit-transform:translateY(1000px);transform:translateY(1000px);opacity:0}100%
			{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}}@keyframes slide-in-bottom{0%{-webkit-transform:translateY(1000px);transform:translateY(1000px);opacity:0}100%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}}@-webkit-keyframes slide-out-bottom{0%
				{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}100%{-webkit-transform:translateY(1000px);transform:translateY(1000px);opacity:0}}@keyframes slide-out-bottom{0%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}100%{-webkit-transform:translateY(1000px);
					transform:translateY(1000px);opacity:0}}@-webkit-keyframes slide-in-right{0%{-webkit-transform:translateX(1000px);transform:translateX(1000px);opacity:0}100%{-webkit-transform:translateX(0);transform:translateX(0);opacity:1}}@keyframes slide-in-right{0%{-webkit-transform:translateX(1000px);
						transform:translateX(1000px);opacity:0}100%{-webkit-transform:translateX(0);transform:translateX(0);opacity:1}}@-webkit-keyframes fade-out-right{0%{-webkit-transform:translateX(0);transform:translateX(0);opacity:1}100%{-webkit-transform:translateX(50px);transform:translateX(50px);opacity:0}}
						@keyframes fade-out-right{0%{-webkit-transform:translateX(0);transform:translateX(0);opacity:1}100%{-webkit-transform:translateX(50px);transform:translateX(50px);opacity:0}}
	
	  </style>
</body>
</html>