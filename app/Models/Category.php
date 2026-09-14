<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    protected $fillable = ['nom'];

    /**
     * Obtenir les équipements associés à cette catégorie.
     */
    public function devices(): BelongsToMany
    {
        return $this->belongsToMany(Device::class, 'category_device')
                    ->using(CategoryDevice::class);
    }
}