<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigBd extends Model
{
    use HasFactory;
    protected $table='config_db';

    protected $fillable = [
        'id','libelle','auteur'
    ];
}
