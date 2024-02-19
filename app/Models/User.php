<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table='UTILISATEUR';

    protected $fillable = [
        'ID','CODE','NOM','PRENOMS',
        'PROFILE','EMAIL','TELEPHONE','MOBILE',
        'PSWD','DATE_PSWD','PSW_IS_DEFAULT',
        'PHOTO','MATRI','STATUT','DEBUT_ACTIV','FIN_ACTIV',
        'BLOC','DATE_BLOC','HEURE_BLOC','MOTIF_BLOC',
        'INITIAL','SIGN','IS_ADMIN',
        'IDJADE','AUTEUR',
    ];

    public function codeUtil()
    {
        return 'codeUtil';
    }
}
