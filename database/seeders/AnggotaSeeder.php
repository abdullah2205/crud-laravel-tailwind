<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Anggota;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Anggota::create([
            'nomor_induk' => '13.2019.1.90142',
            'nama' => 'Muhammad Abdullah',
            'tempat_lahir' => 'Kediri',
            'tanggal_lahir' => '2000-05-22',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Jl. Irawati II No. 2 Surabaya',
            'ranting_latihan' => 'SMP AWS',
            'ikat_pinggang' => 'Cokelat',
            'jabatan' => 'Anggota',
        ]);

        Anggota::create([
            'nomor_induk' => '13.2019.1.90141',
            'nama' => 'Haykal Rezha',
            'tempat_lahir' => 'Surabaya',
            'tanggal_lahir' => '2000-02-12',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Jl. Bolodewo I No. 12 Surabaya',
            'ranting_latihan' => 'SMK PRAPANCA',
            'ikat_pinggang' => 'Cokelat',
            'jabatan' => 'Anggota',
        ]);

        Anggota::create([
            'nomor_induk' => '13.2018.1.00493',
            'nama' => 'Firdy Putra',
            'tempat_lahir' => 'Surabaya',
            'tanggal_lahir' => '2000-11-09',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Jl. Sidotopo II No. 2 Surabaya',
            'ranting_latihan' => 'SMP AWS',
            'ikat_pinggang' => 'Cokelat',
            'jabatan' => 'Anggota',
        ]);

        Anggota::create([
            'nomor_induk' => '13.2019.1.90138',
            'nama' => 'Irgi Asy Syifa',
            'tempat_lahir' => 'Solo',
            'tanggal_lahir' => '2004-11-07',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Jl. Aja Dulu No. 2 Solo',
            'ranting_latihan' => 'SMA 1 Solo',
            'ikat_pinggang' => 'Hijau',
            'jabatan' => 'Anggota',
        ]);

        Anggota::create([
            'nomor_induk' => '13.2019.1.90140',
            'nama' => 'Muhammad Naufal',
            'tempat_lahir' => 'Sidoarjo',
            'tanggal_lahir' => '1999-05-09',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Jl. Kenjeran No. 24 Surabaya',
            'ranting_latihan' => 'SMP AWS',
            'ikat_pinggang' => 'Hijau',
            'jabatan' => 'Anggota',
        ]);
    }
}
