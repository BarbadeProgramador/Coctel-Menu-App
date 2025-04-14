<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ingredientes extends Model
{
    //
    protected $table = 'ingredientes';

    protected $fillable = ['nombre'];

    public function cocteles(): BelongsToMany
    {
        return $this->belongsToMany(
            Coctel::class,
            'coctel_ingredientes'
        );
    }

}
