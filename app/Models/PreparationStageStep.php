<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PreparationStage;

class PreparationStageStep extends Model
{
    public function recipe()
    {
        return $this->belongsToPreparationStage(PreparationStage::class, 'food_categories_id');
    }
}
