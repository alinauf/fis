<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FishController;
use App\Http\Controllers\FishingVesselController;
use App\Http\Controllers\VendorController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('vendor', VendorController::class)->middleware(['auth']);
Route::resource('fish', FishController::class)->middleware(['auth']);
Route::resource('fishing-vessel', FishingVesselController::class)->middleware(['auth']);

Route::post('fish/{fish}/variant', [FishController::class, 'storeVariant'])->middleware(['auth']);



require __DIR__.'/auth.php';
