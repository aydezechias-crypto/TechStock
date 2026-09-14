<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'batiment', 'capacite'];

    /**
     * Obtenir les équipements associés à cette salle.
     */
    public function devices()
    {
        return $this->hasMany(Device::class);
    }
}