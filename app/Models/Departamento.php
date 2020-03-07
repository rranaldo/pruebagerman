<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{   
    protected $table="localidades_dep";

    protected $primaryKey="id";

    protected $fillable = [
        'departamento', 'slug', 'codigo'
    ];

    public function  municipios(){
        return $this->hasMany(Municipio::class,'localidades_dep_id','id');
    }
 
}
