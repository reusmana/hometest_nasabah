<?php

use App\Http\Controllers\NasabahController;
use App\Http\Controllers\UserControllers;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login.index');
})->name('/');
Route::post('/login', [UserControllers::class, 'login'])->name('login');
Route::get('/logout', [UserControllers::class, 'logout'])->name('logout');

Route::middleware('role:customer service')->group(function () {
    Route::get('/cs/home', [NasabahController::class, 'cs_dashboard'])->name('cs.home');
    Route::get('/nasabah/data', [NasabahController::class, 'getData'])->name('nasabah.data');
    Route::get('/nasabah/create', [NasabahController::class, 'create'])->name('nasabah.create');
    Route::get('/city/{id}', [NasabahController::class, 'getCity'])->name('city');
    Route::get('/district/{id}', [NasabahController::class, 'getDistrict'])->name('district');
    Route::get('/village/{id}', [NasabahController::class, 'getVillage'])->name('village');
    Route::get('/saved/nasabah', [NasabahController::class, 'store'])->name('saved.nasabah');
    Route::get('/edit/nasabah/{id}', [NasabahController::class, 'edit'])->name('edit.nasabah');
    Route::get('/changed/nasabah', [NasabahController::class, 'changed'])->name('changed.nasabah');
    Route::get('/delete/nasabah/{id}', [NasabahController::class, 'destroy'])->name('delete.nasabah');
});

Route::middleware('role:supervisor')->group(function () {
    Route::get('/supervisor/home', [NasabahController::class, 'supervisor_dashboard'])->name('supervisor.home');
    Route::get('/nasabah/approved/data', [NasabahController::class, 'getDataNasabah'])->name('nasabah.approved.data');
    Route::get('/nasabah/approved/{id}', [NasabahController::class, 'approved'])->name('nasabah.approved');
});
