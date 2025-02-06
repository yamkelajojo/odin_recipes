<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PreparationStage;
use App\Models\RecipeImage;
use App\Models\RecipeIngredient;

class Recipe extends Model
{
    protected $table = 'recipes';

    protected $fillable = ['name', 'description'];


    public function preparationStages()
    {
        return $this->hasMany(PreparationStage::class, 'recipes_id', 'id');
    }    


    public function images()
    {
        return $this->hasMany(RecipeImage::class, 'recipes_id', 'id');
    }
    
    public function ingredients()
    {
        return $this->hasMany(RecipeIngredient::class, 'recipes_id', 'id');
    }
}


