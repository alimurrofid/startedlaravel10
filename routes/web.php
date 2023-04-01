<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\HalamanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/siswa', function () {
//     return "<h1>SAYA SISWA</h1>";
// });
// Route::get('/siswa/{id}', function ($id) {
//     return "<h1>SAYA SISWA DENGAN ID  $id </h1>";
// })->where('id', '[0-9]+');
// Route::get('/siswa/{id}/{nama}', function ($id , $nama) {
//     return "<h1>SAYA SISWA DENGAN ID $id & NAMA $nama</h1>";
// })->where(['id' => '[0-9]+', 'nama' => '[a-z]+']);

Route::get('siswa',[SiswaController::class, 'index']);
Route::get('siswa/{id}',[SiswaController::class, 'detail'])->where('id','[0-9]+');

Route::get('/',[HalamanController::class, 'index']);
Route::get('tentang',[HalamanController::class, 'tentang']);
Route::get('kontak',[HalamanController::class, 'kontak']);