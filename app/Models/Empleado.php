<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $table = 'empleados';

    protected $fillable = ['fechacontrato','nombre','apellidos','email','telefono','iddepartamentos','idpuestos',];

    public function puestos(){
        return $this->belongsTo('App\Models\Puesto','idpuestos');
    }
    public function departamentos(){
        return $this->belongsTo('App\Models\Departamento','iddepartamentos');
    }
}
