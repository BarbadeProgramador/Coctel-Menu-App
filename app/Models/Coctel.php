<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Coctel extends Model
{

    protected $table = 'coctel';
    
    protected $fillable = ['nombre', 'bebida', 'tipo', 'precio'];


    public function ingredientes (): BelongsToMany
    {
        return $this->belongsToMany(
            Ingredientes::class,
            'coctel_ingredientes'
        );
    }
}
