<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CategoryDevice extends Pivot
{
    // On force la table SQLite au singulier
    protected $table = 'category_device';
}