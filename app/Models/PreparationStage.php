<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Recipe;
use App\Models\PreparationStageStep;


class PreparationStage extends Model
{
    use HasFactory;

    protected $fillable = ['stage', 'description', 'recipes_id'];

    /**
     * The recipe this stage belongs to.
     */
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    /**
     * Get all steps for this preparation stage.
     */
    public function steps()
    {
        return $this->hasMany(PreparationStageStep::class, 'preparation_stages_id');
    }
}
