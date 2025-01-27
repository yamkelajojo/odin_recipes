<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Recipe;
use App\Models\Ingredient;

class RecipeIngredient extends Model
{
    use HasFactory;

    protected $fillable = ['recipes_id', 'ingredients_id', 'quantity'];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class, 'recipes_id');
    }

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class, 'ingredients_id');
    }
}
