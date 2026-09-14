<?php
use App\Http\Controllers\TechController;
use Illuminate\Support\Facades\Route;

// 1. Routes d'affichage fixes (toujours en premier)
Route::get('/', [ TechController::class, 'index' ]);
Route::get('/create', [TechController::class,'create'])->name('dev.create');
Route::get('/categorie',[ TechController::class, 'category'])->name('categorie');
Route::get('/salle',[TechController::class, 'room'])->name('salle');

// 2. Traitements de formulaires (POST / PUT)
Route::post('/', [TechController::class, 'store'])->name('dev.store');
Route::post('/salle', [TechController::class, 'storeS'])->name('salle.store');
Route::post('/categorie', [TechController::class, 'storeC'])->name('cat.store');
Route::put('/{id}', [TechController::class, 'update'])->name('dev.update'); // Traitement modification

// 3. Routes avec paramètres dynamiques / variables (toujours en dernier)
Route::get('/salle/{id}', [TechController::class, 'showRoom'])->name('salle.show'); // Détail d'une salle[cite: 1]
Route::get('/{id}', [TechController::class, 'showDevice'])->name('device.show');
Route::get('/{id}/edit', [TechController::class, 'edit'])->name('dev.edit'); // Formulaire modification
Route::post('/{id}/intervention', [TechController::class, 'storeIntervention'])->name('intervention.store');