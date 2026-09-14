<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Device extends Model
{
    protected $fillable = ['nom', 'marque', 'numero_serie', 'etat', 'date_achat', 'description', 'room_id'];

    public function interventions(): HasMany
    {
        return $this->hasMany(Intervention::class);
    }

    public function categories(): BelongsToMany
    {
        // Correction ici : singulier 'category_device' et liaison avec le modèle pivot
        return $this->belongsToMany(Category::class, 'category_device')
                    ->using(CategoryDevice::class); 
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}