<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table="localidades_mun";

    protected $primaryKey="id";

    protected $fillable = [
        'municipio', 'slug', 'localidades_dep_id','locdan','latitud','longitud','capital'
    ];
    public function  departamento(){
        return $this->hasOne(Departamento::class,'id','localidades_dep_id');
    }
}
