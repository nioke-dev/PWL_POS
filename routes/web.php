<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\MUserController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome2');
});

Route::get('/level', [LevelController::class, 'index']);
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/tambah', [UserController::class, 'tambah']);
Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);
Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_Simpan']);
Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);



Route::get('/kategori', [KategoriController::class, 'index'])->name('manage.category');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('category.create');
Route::post('/kategori', [KategoriController::class, 'store']);
Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{id}', [KategoriController::class, 'update']);
Route::get('/kategori/delete/{id}', [KategoriController::class, 'delete'])->name('kategori.delete');

Route::get('/user', [MUserController::class, 'index'])->name('manage.user');
Route::get('/user/create', [MUserController::class, 'create'])->name('user.create');
Route::post('/user', [MUserController::class, 'store'])->name('user.store');
Route::get('/user/edit/{id}', [MUserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [MUserController::class, 'update']);
Route::get('/user/delete/{id}', [MUserController::class, 'delete'])->name('user.delete');
