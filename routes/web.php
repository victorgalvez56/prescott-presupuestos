<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('general_manager', 'EmployeesController');
Route::resource('customers', 'CustomersController');

Route::get('servicios', [App\Http\Controllers\HomeController::class, 'services'])->name('services');
Route::get('portafolio', [App\Http\Controllers\HomeController::class, 'briefcase'])->name('briefcase');
Route::get('contacto', [App\Http\Controllers\HomeController::class, 'contacts'])->name('contacts');


Route::get('cliente/logo', 'Customers@index_logo');
Route::get('cliente/planners', 'Customers@index_logo');

Route::get('administrador',  [App\Http\Controllers\GeneralManager::class, 'index'])->name('administrator');
Route::get('empleados/logo', 'CustomersController@index_logo');
Route::get('empleados/planners', 'CustomersController@index_logo');


Route::get('mostrar/{id}',  [App\Http\Controllers\GeneralManager::class, 'show'])->name('show.customers');

Route::get('mostrar/logos/{id}',  [App\Http\Controllers\GeneralManager::class, 'show_logos'])->name('show.logos');
Route::get('agregar/logo/{id}',  [App\Http\Controllers\GeneralManager::class, 'add_logo'])->name('add.logo');
Route::post('registrar/logo',  [App\Http\Controllers\GeneralManager::class, 'store_logo'])->name('store.logo');


Route::get('mostrar/planners/{id}',  [App\Http\Controllers\GeneralManager::class, 'show_planners'])->name('show.planners');
Route::get('agregar/planner/{id}',  [App\Http\Controllers\GeneralManager::class, 'add_planner'])->name('add.planner');
Route::post('registrar/planner',  [App\Http\Controllers\GeneralManager::class, 'store_planner'])->name('store.planner');
