<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
     protected $table = 'departamentos';
     protected $fillable = ['nombre','localizacion','idempleadojefe',];
     
     public function empleado(){
        return $this->hasMany('App\Models\Empleado','iddepartamentos');
    }
    public function jefe(){
        return $this->belongsTo('App\Models\Empleado','idempleadojefe');
    }
     
}
