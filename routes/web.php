<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia; 
use app\Http\Controller\RecipeController;

Route::get('/', function () {
    return Inertia::render('Home');
});
