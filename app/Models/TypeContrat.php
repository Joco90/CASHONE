<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeContrat extends Model
{
    use HasFactory;
    protected $table='type_contrat';

    protected $fillable = [
        'id',
        'code',
        'libelle',
        'statut',
        'auteur',
    ];
}
