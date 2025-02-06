<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RecipeController extends Controller
{
    public function index()
    {
        // Fetch all recipes with relationships
        $recipes = Recipe::with(['images', 'ingredients', 'preparationStages'])->get();

        // Pass data to the Inertia page
        return Inertia::render('Recipes', [
            'recipes' => $recipes,
        ]);
    }

    public function show($id)
    {
        // Fetch a single recipe by ID
        $recipe = Recipe::with(['images', 'ingredients', 'preparationStages'])->findOrFail($id);

        // Return data to an Inertia page
        return Inertia::render('Recipes/Show', [
            'recipe' => $recipe,
        ]);
    }
}
