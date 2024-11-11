<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeaturesController;
use App\Http\Controllers\UlasanController;

// Landing page
// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');

Route::get('/', [FeaturesController::class, 'index'])->name('welcome');

// Autentikasi
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/profile', [AuthController::class, 'showProfile'])->name('profile.form')->middleware('auth');
Route::post('/profile', [AuthController::class, 'profile'])->name('profile')->middleware('auth');

// CRUD Destinasi Wisata
Route::get('/wisata/add', [AdminController::class, 'create'])->name('pages.create');
Route::get('/wisata', [AdminController::class, 'index'])->name('pages.index');
Route::post('/wisata', [AdminController::class, 'store'])->name('pages.store');
Route::get('/wisata/{id}/edit', [AdminController::class, 'edit'])->name('pages.edit');
Route::put('/wisata/{id}', [AdminController::class, 'update'])->name('pages.update');
Route::delete('/wisata/{id}', [AdminController::class, 'destroy'])->name('pages.destroy');

// Features
Route::get('/search', [FeaturesController::class, 'search'])->name('features.searching');
Route::get('/sort', [FeaturesController::class, 'sort'])->name('features.sorting');
Route::get('/sortKab', [FeaturesController::class, 'sortKab'])->name('features.sortKab');

// Hightlight Destinasi Tiap Kabupaten/Kota
Route::get('/kabupaten/{kabupaten_kota}', [FeaturesController::class, 'showByKabupaten'])->name('features.kabupaten');

// Detail Destinasi
Route::get('/wisata/{id}', [FeaturesController::class, 'detail'])->name('features.detail_destinasi');

// Plan Trip (Rekomendasi)
Route::get('/plan-trip', [FeaturesController::class, 'showPlanTripForm'])->name('features.plan_trip_form');
Route::post('/plan-trip', [FeaturesController::class, 'planTrip'])->name('features.plan_trip');

// Ulasan
Route::get('/ulasan/{id}', [UlasanController::class, 'show'])->name('ulasan.show');
Route::post('/ulasan', [UlasanController::class, 'store'])->name('ulasan.store')->middleware('auth');