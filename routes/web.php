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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::resource('users', 'UsersController');

Route::resource('roles', 'RolesController');

Route::resource('recrutements', 'RecrutementsController');

Route::resource('agents', 'AgentsController');

Route::resource('cursus', 'CursusController');

Route::resource('conges', 'CongesController');

Route::resource('charges', 'ChargesController');

Route::resource('absences', 'AbsencesController');

Route::resource('stagiaires', 'StagiairesController');

Route::resource('themes', 'ThemesController');

Route::resource('postes', 'PostesController');

Route::put('edit/{poste}', 'PostesController@updateposte')->name('modifposte');

Route::resource('contrats', 'ContratsController');

Route::resource('affectations', 'AffectationsController');

Route::resource('affectationAvantages', 'AffectationAvantagesController');

Route::get('bases_imposables_agent/{id}', 'AffectationAvantagesController@avantageAgent')->name('avantages_agent');

Route::resource('departements', 'DepartementsController');

Route::put('edit/{departement}', 'DepartementsController@updatedepartement')->name('modif');

Route::resource('directions', 'DirectionsController');

Route::resource('services', 'ServicesController');

Route::resource('missions', 'MissionsController');

Route::resource('formations', 'FormationsController');

Route::resource('avantages', 'AvantagesController');

Route::put('edit/{avantage}', 'AvantagesController@updateavantage')->name('modifavantage');

Route::resource('abattements', 'AbattementsController');

Route::resource('impots', 'ImpotsController');

Route::put('edit/{impot}', 'ImpotsController@updateimpot')->name('modifimpot');

Route::put('edit/{abattement}', 'AbattementsController@updateabattement')->name('modifabattement');

Route::resource('paie', 'PayrollsController');

Route::get('getData', 'PayrollsController@getData');

Route::get('bulletin_paie/{id}', 'PayrollsController@showPayroll')->name('show_payroll');

Route::get('/home', 'HomeController@index')->name('home');

