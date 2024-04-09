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

    protected $table='utilisateur';
    protected $username = 'code';

    protected $fillable = [
        'id','code','name','firstname',
        'profile','email','telephone','mobile',
        'password','date_password','default_password',
        'photo','matricule','statut','debut_activ','fin_activ',
        'bloc','date_bloc','heure_bloc','motif_bloc',
        'initial','sign','is_admin',
        'idjade','auteur',
    ];

    public function profilelibelle(){

        return $this->belongsTo(Profile::class,'profile','id');
    }


}
