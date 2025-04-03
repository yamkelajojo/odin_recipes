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
        return Inertia::render('Recipes');
    }

    public function fetchRecipes(Request $request)
    {
        // $recipes = Recipe::with([
        //     'images',
        //     'ingredients.ingredient.foodCategory',  
        //     'ingredients.ingredient.unit',          
        //     'preparationStages.preparationStageSteps'
        // ])->get();
        
        $recipes = Recipe::with(['images', 'ingredients', 'preparationStages'])->get();

        return response()->json($recipes);
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
