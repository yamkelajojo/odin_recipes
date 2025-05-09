<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Unit;
use App\Models\FoodCategory;
use App\Models\Recipe;


class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'food_category_id', 'unit_id'];

    /**
     * The food category this ingredient belongs to.
     */
    public function category()
    {
        return $this->belongsTo(FoodCategory::class, 'food_categories_id');
    }

    /**
     * The unit for this ingredient.
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'units_id');
    }

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class, 'recipe_ingredients', 'ingredients_id', 'recipes_id');
    }
    
}
