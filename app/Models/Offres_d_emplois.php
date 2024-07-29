<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offres_d_emplois extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'date_limite_de_candidature',
    ];
}
