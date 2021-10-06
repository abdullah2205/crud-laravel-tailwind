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
		<div class="container py-1 px-4 h-screen mx-auto bg-blue-200">
			<div class="my-4 rounded-xl glass shadow-lg py-1 px-4">
				
				@if ($msg = Session::get('success'))
				<div class="">
					<div class="alert-toast mt-3 mr-4 absolute right-0 md:w-full max-w-xs">
						<input type="checkbox" class="hidden" id="footertoast">
						<label class="close cursor-pointer flex justify-between p-3 bg-green-500 h-20 rounded-xl shadow-xl text-white font-bold" for="footertoast">
							{{ $msg }}
						<svg class="mt-1 fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 18 18">
							<path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
						</svg>
						</label>
					</div>
				</div>
				@endif

				<p class="font-bold text-blue-500 py-4 text-xl">
					Data Anggota PS. Sayta Wijasena
				</p>
				<button class="btn btn-sm mb-2 border-0 bg-green-500 bg-transparent hover:bg-green-600 rounded-lg text-white">
					Tambah
				</button>
				<div class="mb-4 mt-2 rounded-xl bg-white shadow-md">
					<div class="pb-2 pt-1">
						<table class="table-auto w-full text-left">
							<thead class="text-blue-500">
								<tr>
									<th class="w-28 py-4 pl-4">No. Induk</th>
									<th class="w-72">Nama</th>
									<th class="w-60 ">Ranting Latihan</th>
									<th class="w-36">Ikat Pinggang</th>
									<th class="w-60">Detail</th>
									<th class="w-40">Aksi</th>
								</tr>
							</thead>
							<tbody class="text-gray-600 bg-white">

								@forelse ($anggotas as $anggota)
								<tr class="hover:bg-gray-200 hover:bg-opacity-50">
									<td class="px-4 py-2">{{ $anggota->nomor_induk }}</td>
									<td>{{ $anggota->nama }}</td>
									<td>{{ $anggota->ranting_latihan }}</td>
									<td>{{ $anggota->ikat_pinggang }}</td>
									<td>
										<div class="collapse"> 
											<input type="checkbox">
											<div class="collapse-title">
												<svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13l-3 3m0 0l-3-3m3 3V8m0 13a9 9 0 110-18 9 9 0 010 18z" />
												</svg>
											</div> 
											<div class="collapse-content"> 
												<table class="table-auto text-sm">
													<tr>
														<th class="h-8 align-bottom text-blue-500">Tempat Tanggal Lahir</th>
													</tr>
													<tr>
														<td>{{ $anggota->tempat_lahir }}, {{ $anggota->tanggal_lahir }}</td>
													</tr>
													<tr>
														<th class="h-8 align-bottom text-blue-500">Jenis Kelamin</th>
													</tr>
													<tr>
														<td>{{ $anggota->jenis_kelamin }}</td>
													</tr>
													<tr>
														<th class="h-8 align-bottom text-blue-500">Alamat</th>
													</tr>
													<tr>
														<td>{{ $anggota->alamat }}</td>
													</tr>
													<tr>
														<th class="h-8 align-bottom text-blue-500">Jabatan</th>
													</tr>												
													<tr>
														<td>{{ $anggota->jabatan }}</td>
													</tr>
												</table>
											</div>
										</div>
									</td>
									<td>
										<form action="{{ route('anggota.destroy', $anggota->id) }}" method="post">
											<a href="{{ route('anggota.edit', $anggota->id) }}">
												<button type="button" class="btn btn-sm border-0 bg-yellow-500 hover:bg-yellow-600 rounded-lg text-white mr-1"> Ubah </button>
											</a>
											@csrf
											@method('DELETE')
												<button class="btn btn-sm border-0 bg-red-500 hover:bg-red-600 rounded-lg text-white" onclick="return confirm('Are you sure you want to Delete this Data?')">Hapus</button>
										</form>
									</td>
								</tr>
								@empty
								<tr>
									<td class="pl-4">Data Kosong</td>
								</tr>
								@endforelse
								
							</tbody>
						</table>
						{{ $anggotas->links('layouts/pagination') }}
					</div>
				</div>
			</div>
		</div>

		<style>
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