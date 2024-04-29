<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChaineBase extends Model
{
    use HasFactory;

    protected $table='chaine_db';

    protected $fillable = [
        'id','code','privider','serveur','utilisateur','passwords',
        'type','name_db','dmaj','statut','auteur','config_db'
    ];

    public function configdb(){

        return $this->belongsTo(ConfigBd::class,'config_db','id');
    }
}
