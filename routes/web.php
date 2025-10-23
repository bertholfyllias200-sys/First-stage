<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\VendeurDashboardController;
use App\Http\Controllers\PdfController;
use App\Livewire\ProductCrud;
use App\Livewire\Approvisionnement;

// --- Accueil public ---
Route::get('/', fn () => view('welcome'))->name('home');

// --- Facture PDF ---
Route::get('/facture/{id}', [PdfController::class, 'generate'])->name('facture.pdf')->middleware('auth');

// --- Routes pour utilisateurs authentifiés ---
Route::middleware(['auth', 'verified'])->group(function () {

    // ADMIN
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('/produits', ProductCrud::class)->name('produits');
        Route::get('/approvisionnement', Approvisionnement::class)->name('approvisionnement');
    });

    // VENDEUR
    Route::middleware('role:vendeur')->prefix('vendeur')->name('vendeur.')->group(function () {
        Route::get('/dashboard', [VendeurDashboardController::class, 'index'])->name('dashboard');

        Route::get('/historique', function () {
            $sales = \App\Models\Sale::with('items', 'user')
                ->where('user_id', auth()->id())
                ->latest()->get();

            return view('vendeur.historique', compact('sales'));
        })->name('historique');
    });

    // Fallback dashboard (non utilisé ici)
    Route::get('/dashboard', fn () => redirect()->route('home'))->name('dashboard');
});
