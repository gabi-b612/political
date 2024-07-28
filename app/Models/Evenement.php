<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Evenement extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'date_de_l_evenement',
    ];

    public function photos(): HasMany
    {
        return $this->hasMany(PhotoEvenement::class);
    }
}
