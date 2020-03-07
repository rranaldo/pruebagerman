<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    protected $table="conductores";

    protected $primaryKey="ID";

    protected $documentos =['Cédula','Pasaporte','Cédula Extranjería'];

    protected $fillable = [
        'nombre', 'documento_tipo', 'documento','documento_ciudad','nacimiento'
    ];
   
    public function  ciudad(){
              
        return $this->hasOne(Municipio::class,'id','documento_ciudad')->with('departamento');
    }
    public function tipo_de_documento(){

        return $this->documentos[$this->documento_tipo-1];
    }
 
}
