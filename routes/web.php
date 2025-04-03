<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia; 

use App\Http\Controllers\RecipeController;

Route::get('/', function () {
    return Inertia::render('Home');
});

// Route::get('/recipes', function () {
//     return Inertia::render('Recipes');
// });
Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');
Route::post('/recipes/fetch', [RecipeController::class, 'fetchRecipes']);



// Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');
