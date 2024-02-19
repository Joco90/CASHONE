<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table='PROFILE';

    protected $fillable = [
        'ID','CODE','LIBELLE','TYPE','AUTEUR','STATUT',
    ];
}
