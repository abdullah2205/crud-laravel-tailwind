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
			<div class="mb-4 mt-2 rounded-xl bg-white shadow-md">
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
						<div class="bg-blue-400 mx-4 px-4 py-2 rounded-lg text-white font-bold my-4">
							{{ $msg }}
						</div>
					@endif

					<div class="hidden bg-black bg-opacity-50 absolute inset-0 items-center justify-center text-gray-800" id="overlay">
						<div class="bg-gray-200 max-w-sm px-3 py-3 rounded-xl shadow-md">
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
							@foreach ($anggota as $anggota_row)
							<tr class="hover:bg-gray-200 hover:bg-opacity-50">
								<td class="px-4 py-2">{{ $anggota_row->nomor_induk }}</td>
								<td>{{ $anggota_row->nama }}</td>
								<td>{{ $anggota_row->tempat_lahir }}</td>
								<td>{{ $anggota_row->tanggal_lahir }}</td>
								<td>{{ $anggota_row->jenis_kelamin }}</td>
								<td>{{ $anggota_row->alamat }}</td>
								<td>{{ $anggota_row->ranting_latihan }}</td>
								<td>{{ $anggota_row->ikat_pinggang }}</td>
								<td>{{ $anggota_row->jabatan }}</td>
								<td>
									<form action="{{ route('anggota.destroy', $anggota_row->id) }}" method="post">
										<a href="{{ route('anggota.edit', $anggota_row->id) }}">
											<button class="text-sm bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-opacity-50 px-2 py-1 rounded-lg text-white mr-1"> Ubah </button>
										</a>
										@csrf
										@method('DELETE')
											<button class="text-sm bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 px-2 py-1 rounded-lg text-white" onclick="return confirm('Are you sure you want to Delete this Data?')">Hapus</button>
									</form>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
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
</body>
</html>