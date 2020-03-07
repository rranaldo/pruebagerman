<?php

namespace App\Http\Controllers;
use App\Models\Municipio;
use App\Models\Departamento;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use App\Models\Conductor;

class GeneralController extends Controller
{
    //
    public function AllMunicipiosJson(){
        
        return Departamento::whereSlug('santander')
                            ->with('Municipios')
                            ->get()
                            ->toJson();

    }

    public function AllRepeatMunicipios(){
            
        return   Municipio::select(['localidades_mun.municipio as Municipio','Dept.departamento as Departamento'])
                            ->join('localidades_dep as Dept','Dept.id','=','localidades_mun.localidades_dep_id')
                            ->select('Municipio','Departamento')
                            ->orderBy('Municipio')
                            ->get()
                            ->groupBy('Municipio')

                            ->filter(function($elemnt){

                                 return count($elemnt)>1;

                             })

                            ->map(function($event){

                                    $new_list=[];
                                    foreach($event as $e){
                                        $new_list[]=$e->Departamento;
                                    }
                                    return $new_list;
                            })

                            ->toJson();
    }
    public function tableWithDataFaker(){
            $faker=Faker::create();
            $data_faker=[];
            $tipo_documentos=array(

            );
            for($i=1;$i<=10;$i++){
                /*
                Se solicito en el caso de documento_tipo que:
                El documento_tipo se genera aleatorio de de una lista de 3 elementos (1: Cédula, 2: Pasaporte, 3: Cédula Extranjería)
                Pero sucede que, el tipo de dato es tinyint, con numeros 1byte largo 2.
                por lo  que Utilizare una lista de numeros, para identificarlos.
                y si fueran textos seria de la siguiente manera
                  'documento_tipo' => $faker->randomElement([1=>'Cédula', 2=>'Pasaporte',3=> 'Cédula Extranjería']),
                */
                $data_faker[]=array(
                                    'nombre'=> $faker->name,
                                    'documento_tipo' => $faker->randomElement([1,2,3]),
                                    'documento' => $faker->randomNumber(),
                                    'documento_ciudad' => Municipio::inRandomOrder()->first()['id'],
                                    'nacimiento' => $faker->dateTime()
                                );
                                
            }
           // Conductor::insert($data_faker);
            $conductores = Conductor::with('ciudad')->get();

           return view('lista',['conductores'=> $conductores]);

            

    }
}