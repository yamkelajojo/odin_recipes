<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Recipe;

class RecipeImage extends Model
{
    // Allow mass assignment for these attributes
    protected $fillable = ['src', 'recipes_id'];

    /**
     * The recipe this image belongs to.
     */
    public function recipe()
    {
        return $this->belongsTo(Recipe::class, 'recipes_id');
    }
}

