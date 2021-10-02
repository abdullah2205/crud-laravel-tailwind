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
		<div class="my-4 rounded-xl bg-gray-200 shadow-md">
			<div class="py-3">
				<p class="font-bold text-gray-700 py-4 px-4 text-xl">
					Data Anggota PS. Sayta Wijasena
				</p>
				<button class="mb-2 mx-4 py-1  w-24 text-center bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 rounded-lg text-white">
					Tambah
				</button>
				<table class="table-auto w-full text-left">
					<thead class="text-green-500">
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
							<th class="w-40">Aksi</th>
						</tr>
					</thead>
					<tbody class="text-gray-600 bg-gray-200">
						@foreach ($anggota as $anggota_row)
						<tr class="hover:bg-gray-300">
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
										<button class="bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-opacity-50 px-3 py-1 rounded-lg text-white mr-1"> Ubah </button>
									</a>
									@csrf
									@method('DELETE')
										<button class="bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 px-3 py-1 rounded-lg text-white" type="submit" >Hapus</button>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>