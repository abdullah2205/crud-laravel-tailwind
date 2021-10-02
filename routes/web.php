<?php

use App\Models\Anggota;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $anggota['anggota'] = Anggota::all(); //anggota = ke view
    return view('app', $anggota);
});

Route::resource('anggota', 'AppController'); // anggota = route nya untuk button