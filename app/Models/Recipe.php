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
        return $this->hasMany(PreparationStage::class);
    }


    public function images()
    {
        return $this->hasMany(RecipeImage::class);
    }
    
    public function ingredients()
    {
        return $this->hasMany(RecipeIngredient::class);
    }


}


