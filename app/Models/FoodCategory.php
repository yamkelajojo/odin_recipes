<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ingredient;


class FoodCategory extends Model
{

    protected $fillable = ['title'];

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class, 'food_categories_id');
    }
    
}
