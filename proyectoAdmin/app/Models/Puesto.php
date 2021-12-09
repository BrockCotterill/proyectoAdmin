<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    use HasFactory;
    protected $table = 'puestos';

    protected $fillable = ['nombre','minimo','maximo',];

    public function empleado(){
        return $this->belongsTo('App\Models\Empleado','idpuestos');
    }
}
