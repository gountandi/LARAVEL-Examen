<?php

 use App\Http\Controllers\ProduitController;
 use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    /** Routes de ressource
     * Vous créer pour les 7 méthode d'un controlleur les 7 routes automatiquement
     * Syntaxe:
     * Route::ressource('models', Controller::class)
     */

    Route::resource('produits', ProduitController::class);
    Route::resource('commandes', CommandeController::class);


    Route::get("/commandes/{commande}/facture",[CommandeController::class,'generer_facture'])->name('generer_facture');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
