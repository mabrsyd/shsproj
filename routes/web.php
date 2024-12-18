<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\InventoryController;

Route::get('/', function () {
    return view('home');
});

Route::get('/team', function () {
    return view('team');
});

Route::get('/dashboard', function () {
    return view('home');

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Testimoni Baru
    Route::post('/testimoni', [TestimoniController::class, 'store'])->name('testimoni.store');
});


Route::resource('projects', ProjectController::class);

Route::resource('testimonials', TestimonialController::class);

Route::resource('inventaris', InventarisController::class);

// Inventory Route
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/inventory', [InventoryController::class, 'index'])->name('admin.inventory.index');
    Route::get('/admin/inventory/create', [InventoryController::class, 'create'])->name('admin.inventory.create');
    Route::post('/admin/inventory', [InventoryController::class, 'store'])->name('admin.inventory.store');
    Route::get('/admin/inventory/{inventory}/edit', [InventoryController::class, 'edit'])->name('admin.inventory.edit');
    Route::put('/admin/inventory/{inventory}', [InventoryController::class, 'update'])->name('admin.inventory.update');
    Route::delete('/admin/inventory/{inventory}', [InventoryController::class, 'destroy'])->name('admin.inventory.destroy');
    Route::get('/admin/inventory/low-stock', [InventoryController::class, 'lowStockAlert'])->name('admin.inventory.low-stock');
});

// Public Inventory Route
Route::get('/inventory', [InventoryController::class, 'publicIndex'])->name('inventory.public');


require __DIR__.'/auth.php';
