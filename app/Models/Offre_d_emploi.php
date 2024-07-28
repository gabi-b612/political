<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre_d_emploi extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'date_limite_de_candidature',
    ];
}
