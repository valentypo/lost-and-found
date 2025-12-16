<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LostItemController;
use App\Http\Controllers\FoundItemController;
use App\Http\Controllers\ClaimController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Lost & Found CRUD
    Route::resource('/lost-items', LostItemController::class);

    Route::resource('/found-items', FoundItemController::class);

    // Claim actions
    Route::post('/claim', [ClaimController::class, 'store'])->name('claim.store');
    Route::post('/claim/{claim}/approve', [ClaimController::class, 'approve'])->name('claim.approve');
    Route::post('/claim/{claim}/reject', [ClaimController::class, 'reject'])->name('claim.reject');
    Route::post('/claim/{claim}/finish', [ClaimController::class, 'finish'])->name('claim.finish');


    // Claims pages
    Route::get('/claims', [ClaimController::class, 'index'])->name('claims.index');
    Route::get('/claims/pending', [ClaimController::class, 'pending'])->name('claims.pending');
    Route::get('/claims/requests', [ClaimController::class, 'requests'])->name('claims.requests');
    Route::get('/claims/{id}', [ClaimController::class, 'show'])->name('claims.show');
    Route::delete('/claims/{id}', [ClaimController::class, 'destroy'])->name('claims.destroy');

});

require __DIR__.'/auth.php';
