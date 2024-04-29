<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;
    protected $table='personnel';

    protected $fillable = [
    'id',
	'matricule',
	'nom',
	'prenoms',
	'emploi',
	'telephone',
	'mobile',
	'email_pro',
	'email_perso',
	'code_ci',
	'contrat',
	'civilite' ,
	'type_id' ,
	'num_id',
	'date_naissance',
	'bq_data',
	'statut',
	'auteur',
    ];

    public function TypeContrat(){

        return $this->belongsTo(TypeContrat::class,'contrat','id');
    }

}
