<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorrespNature extends Model
{
    use HasFactory;
    protected $table='corresp_cn';

    public function codeNatue()
    {
      return  $this->belongsTo(NatureComptable::class,'code_cn','id');
    }
}
