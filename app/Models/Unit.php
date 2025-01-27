<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ingredient;

class Unit extends Model
{
    protected $fillable = ['name',];

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class, 'units_id');
    }
}
