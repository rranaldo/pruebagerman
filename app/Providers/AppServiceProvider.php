<?php

namespace App\Providers;
use App\Models\Departamento;
use App\Models\Municipio;
use View;
use Illuminate\Support\ServiceProvider;
use DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
 

            $Departamentos =Departamento::select(['localidades_dep.departamento as Departamento','Mun.municipio as Municipio'])
            ->join('localidades_mun as Mun','Mun.localidades_dep_id','=','localidades_dep.id')
            ->select('Municipio','Departamento')
            ->orderBy('Departamento')
            ->get()
            ->groupBy('Departamento')


            ->map(function($event){

                    return count($event);
            });
        /*
        select(['Dept.departamento as Departamento'])
        ->join('localidades_dep as Dept','Dept.id','=','localidades_mun.localidades_dep_id')      
        ->select('Total', DB::raw('count(*) as total'))
        ->select('Departamento','Total')
         ->orderBy('Departamento')
        ->get();
        */

      View::share('deptotal',$Departamentos);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
