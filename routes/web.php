<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/AllMunicipiosJson','GeneralController@AllMunicipiosJson')->name('AllMunicipiosJson');

Route::get('/AllRepeatMunicipios','GeneralController@AllRepeatMunicipios')->name('AllRepeatMunicipios');

Route::get('/tableWithDataFaker','GeneralController@tableWithDataFaker')->name('tableWithDataFaker');

Route::get('/tableWithDataFaker','GeneralController@tableWithDataFaker')->name('tableWithDataFaker');

Route::get('/departamento_totalmunicipios', function () {
    return view('departamento_totales');
});
