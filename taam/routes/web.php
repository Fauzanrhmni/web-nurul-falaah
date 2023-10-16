<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\home;

use App\Http\Controllers\loginC;
use App\Http\Controllers\adminC;
use App\Http\Controllers\guruC;
use App\Http\Controllers\siswaC;
use App\Http\Controllers\kelasC;
use App\Http\Controllers\pesanC;
use App\Http\Controllers\fasilitasC;
use App\Http\Controllers\akademikC;

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
// User
Route::get('/', [home::class,'index'])->name('login');
Route::get('/tentang/profile', [home::class,'profile']);
Route::get('/tentang/Data_siswa', [home::class,'data_siswa']);
Route::get('/kalender', [home::class,'kalender']);
Route::get('/fasilitas', [home::class, 'fasilitas']);

Route::post('/form', [home::class,'prosesForm']);

Route::get('/administratorTaam', [loginC::class, 'index'])->middleware('guest');
Route::post('/login', [loginC::class, 'store']);
Route::post('/logout', [loginC::class, 'logout']);


//admin
Route::get('/dashboard', [adminC::class, 'index'])->middleware('auth');

Route::get('/sekolah/{id}/edit',  [adminC::class, 'edit'])->middleware('auth');
Route::post('/sekolah/{id}/update', [adminC::class, 'update'])->middleware('auth');
Route::patch('/sekolah/{id}/update', [adminC::class, 'update'])->middleware('auth');

Route::get('/admin/create', [adminC::class, 'create'])->middleware('auth');
Route::post('/admin', [adminC::class, 'store'])->middleware('auth');

// Menampilkan formulir edit
Route::get('/admin/{id}/edit', [adminC::class, 'edit_admin'])->middleware('auth');
Route::put('/admin/{id}', [adminC::class, 'update_admin'])->middleware('auth');
Route::delete('/admin/delete/{id}', [adminC::class, 'destroy'])->middleware('auth');

// route Guru
Route::get('/guru', [guruC::class, 'index'])->middleware('auth');
Route::get('/guru/create', [guruC::class, 'create'])->middleware('auth');
Route::post('/guru', [guruC::class, 'store'])->middleware('auth');
Route::get('/guru/{id}/edit', [guruC::class, 'edit'])->middleware('auth');
Route::put('/guru/{id}', [guruC::class, 'update'])->middleware('auth');
Route::delete('/guru/delete/{id}', [guruC::class, 'destroy'])->middleware('auth');
Route::get('/guru/search', [guruC::class, 'searchGuru'])->middleware('auth');

// route siswa
Route::get('/siswa', [siswaC::class, 'index'])->middleware('auth');
Route::get('/siswa/create', [siswaC::class, 'create'])->middleware('auth');
Route::post('/siswa', [siswaC::class, 'store'])->middleware('auth');
Route::get('/siswa/{id}/edit', [siswaC::class, 'edit'])->middleware('auth');
Route::put('/siswa/{id}', [siswaC::class, 'update'])->middleware('auth');
Route::delete('/siswa/delete/{id}', [siswaC::class, 'destroy'])->middleware('auth');
Route::get('/siswa/search', [siswaC::class, 'searchsiswa'])->middleware('auth');

// route kelas
Route::get('/kelas', [kelasC::class, 'index'])->middleware('auth');
Route::get('/kelas/create', [kelasC::class, 'create'])->middleware('auth');
Route::post('/kelas', [kelasC::class, 'store'])->middleware('auth');
Route::get('/kelas/{id}/edit', [kelasC::class, 'edit'])->middleware('auth');
Route::put('/kelas/{id}', [kelasC::class, 'update'])->middleware('auth');
Route::delete('/kelas/delete/{id}', [kelasC::class, 'destroy'])->middleware('auth');
Route::get('/kelas/search', [kelasC::class, 'searchKelas'])->middleware('auth');

// route fasilitas
Route::get('/fasilitasAdmin', [fasilitasC::class, 'index'])->middleware('auth');
Route::get('/fasilitasAdmin/create', [fasilitasC::class, 'create'])->middleware('auth');
Route::post('/fasilitasAdmin', [fasilitasC::class, 'store'])->middleware('auth');
Route::delete('/fasilitasAdmin/delete/{id}', [fasilitasC::class, 'destroy'])->middleware('auth');
Route::get('/fasilitasAdmin/search', [fasilitasC::class, 'searchKelas'])->middleware('auth');

// route akademik
Route::get('/akademik', [akademikC::class, 'index'])->middleware('auth');
Route::get('/akademik/create', [akademikC::class, 'create'])->middleware('auth');
Route::post('/akademik', [akademikC::class, 'store'])->middleware('auth');
Route::get('/akademik/{id}/edit', [akademikC::class, 'edit'])->middleware('auth');
Route::put('/akademik/{id}', [akademikC::class, 'update'])->middleware('auth');
Route::delete('/akademik/delete/{id}', [akademikC::class, 'destroy'])->middleware('auth');
Route::get('/akademik/search', [akademikC::class, 'searchakademik'])->middleware('auth');

// route pesan
Route::get('/pesan', [pesanC::class, 'index'])->middleware('auth');
Route::delete('/pesan/delete/{id}', [pesanC::class, 'destroy'])->middleware('auth');
Route::get('/pesan/search', [pesanC::class, 'searchpesan'])->middleware('auth');