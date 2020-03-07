<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConductoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $createTableSqlString =
                "CREATE TABLE `conductores` (
                    `ID` bigint unsigned not null auto_increment primary key,
                    `nombre` varchar(200) not null,
                    `documento_tipo` tinyint(2) not null ,
                    `documento` varchar(20) not null,
                    `documento_ciudad` SMALLINT(5) not null ,
                    `nacimiento` datetime null)
                    COLLATE='utf8_general_ci'
                    ENGINE=InnoDB
                    AUTO_INCREMENT=1;";

        DB::statement($createTableSqlString);
    /*     
    En el caso de documento_ciudad 1byte no alcanza para representar 5 numeros. MYSQL utiliza almenos 2, con smallint 
    ya que tinyint, utiliza un solo byte y utiliza de -128 a 127 , con 255 valores posibles.
    
    Las migraciones normalmente las creo utilizando el Schema , pero para restringir mejor los tipo de datos , utilizo un comando Raw,
    ya que los tipos de datos de laravel son menos restrintivos. 

    
       Schema::create('conductores',function( Blueprint $table ){
                $table->bigIncrements('ID');
                $table->string('nombre',200);
                $table->tinyInteger('documento_tipo');
                $table->string('documento',20);
                $table->smallInteger('documento_ciudad');
                $table->datetime('nacimiento')->nullable();
            });
*/

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conductores');
    }
}
