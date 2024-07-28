<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Candidature extends Model
{
    use HasFactory;

    protected $fillable = [
        'utilisateur_id',
        'offre_d_emploi_id',
        'lettre_de_motivation',
    ];

    public function utilisateur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class);
    }

    public function offre_d_emploi(): BelongsTo
    {
        return $this->belongsTo(Offre_d_emploi::class);
    }
}
