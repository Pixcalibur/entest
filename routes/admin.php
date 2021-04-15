<?php

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

Route::prefix('admin')->middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['auth'])->name('dashboard');

    Route::prefix('vaccine-type')->group(function () {

        Route::get('/', [
            \App\Http\Controllers\Admin\VaccineTypeController::class,
            'index'
        ])->name('vaccine-type.list');

        Route::get('/create', [
            \App\Http\Controllers\Admin\VaccineTypeController::class,
            'create'
        ])->name('vaccine-type.create');

        Route::put('/store', [
            \App\Http\Controllers\Admin\VaccineTypeController::class,
            'store'
        ])->name('vaccine-type.store');

        Route::get('/edit/{id}', [
            \App\Http\Controllers\Admin\VaccineTypeController::class,
            'edit'
        ])->name('vaccine-type.edit')->where('id', '[0-9]+');

        Route::patch('/update/{id}', [
            \App\Http\Controllers\Admin\VaccineTypeController::class,
            'update'
        ])->name('vaccine-type.update')->where('id', '[0-9]+');

        //Route::delete('/delete/{id}', [
        Route::get('/delete/{id}', [
            \App\Http\Controllers\Admin\VaccineTypeController::class,
            'delete'
        ])->name('vaccine-type.delete')->where('id', '[0-9]+');
    });

    Route::prefix('vaccine-shipment')->group(function () {

        Route::get('/', [
            \App\Http\Controllers\Admin\VaccineShipmentController::class,
            'index'
        ])->name('vaccine-shipment.list');

        Route::get('/create', [
            \App\Http\Controllers\Admin\VaccineShipmentController::class,
            'create'
        ])->name('vaccine-shipment.create');

        Route::put('/store', [
            \App\Http\Controllers\Admin\VaccineShipmentController::class,
            'store'
        ])->name('vaccine-shipment.store');

        Route::get('/edit/{id}', [
            \App\Http\Controllers\Admin\VaccineShipmentController::class,
            'edit'
        ])->name('vaccine-shipment.edit')->where('id', '[0-9]+');

        Route::patch('/update/{id}', [
            \App\Http\Controllers\Admin\VaccineShipmentController::class,
            'update'
        ])->name('vaccine-shipment.update')->where('id', '[0-9]+');

        //Route::delete('/delete/{id}', [
        Route::get('/delete/{id}', [
            \App\Http\Controllers\Admin\VaccineShipmentController::class,
            'delete'
        ])->name('vaccine-shipment.delete')->where('id', '[0-9]+');

    });
});
