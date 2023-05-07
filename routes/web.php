<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FishController;
use App\Http\Controllers\FishingVesselController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\CollectionController;

use Illuminate\Support\Facades\Route;




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


    Route::resource('vendor', VendorController::class);
    Route::resource('fish', FishController::class);
    Route::resource('fishing-vessel', FishingVesselController::class);
    Route::post('fish/{fish}/variant', [FishController::class, 'storeVariant']);

    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');

    Route::get('collection', [CollectionController::class, 'index'])->name('collection.index');
    Route::post('collection', [CollectionController::class, 'store'])->name('collection.store');

    Route::resource('bank', BankController::class);

    Route::post('collection/{collection}/start',[CollectionController::class, 'startCollection'])->name('collection.start');

    Route::get('collection/{collection}/invoice/{invoice}', [\App\Http\Controllers\InvoiceController::class, 'show'])->name('collection.invoice');

    Route::get('collection/{collection}/invoice/{invoice}/payment', [\App\Http\Controllers\InvoiceController::class, 'showPaymentScreen'])->name('collection.invoice.payment-screen');

    Route::post('collection/{collection}/invoice/{invoice}/payment', [\App\Http\Controllers\InvoiceController::class, 'handlePayment'])->name('collection.invoice.payment');

    Route::get('inventory', [\App\Http\Controllers\InventoryController::class, 'index'])->name('inventory.index');




    Route::resource('collection-vessel', \App\Http\Controllers\CollectionVesselController::class);


});


require __DIR__ . '/auth.php';
