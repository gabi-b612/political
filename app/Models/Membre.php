<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    use HasFactory;
    protected $fillable = [
        'numero_d_adhesion',
        'prenom',
        'nom',
        'post_nom',
        'sexe',
        'lieu_de_naissance',
        'province_d_origine',
        'territoire_d_origine',
        'etudes',
        'adresse',
        'telephone',
        'photo_de_profil',
    ];
}
