<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Correspondent\Correspondent;
use App\Http\Controllers\Diligence\Diligence;
use App\Http\Controllers\PrintJudgment;
use Illuminate\Support\Facades\Redirect;
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
    return Redirect::to('/login')->with(['type' => 'error','message' => 'Your message']);
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/corresponsales', [App\Http\Controllers\Correspondent::class, 'index'])->name('corresponsales');
Route::get('/corresponsales/agregar', [App\Http\Controllers\Correspondent::class, 'create'])->name('corresponsales/agregar');
Route::get('/corresponsales/editar/{id}', [App\Http\Controllers\Correspondent::class, 'edit'])->name('corresponsales/editar/{id}');
Route::post('correspondent/store', [App\Http\Controllers\Correspondent::class, 'store'])->name('correspondent/store');
Route::put('correspondent/update', [App\Http\Controllers\Correspondent::class, 'update'])->name('correspondent/update');
Route::delete('/correspondent/destroy', [App\Http\Controllers\Correspondent::class, 'destroy'])->name('correspondent/destroy');
Route::get('/juicios', [App\Http\Controllers\Judgment::class, 'index'])->name('juicios');
Route::get('/juicios/agregar', [App\Http\Controllers\Judgment::class, 'create'])->name('juicios/agregar');
Route::get('/juicios/editar/{id}', [App\Http\Controllers\Judgment::class, 'edit'])->name('juicios/editar/{id}');
Route::post('judgment/store', [App\Http\Controllers\Judgment::class, 'store'])->name('judgment/store');
Route::put('judgment/update', [App\Http\Controllers\Judgment::class, 'update'])->name('judgment/update');
Route::delete('judgment/destroy', [App\Http\Controllers\Judgment::class, 'destroy'])->name('judgment/destroy');

Route::get('/juicios-tipo', [App\Http\Controllers\JudgmentType::class, 'index'])->name('juicios-tipo');
Route::get('/juicios-tipo/agregar', [App\Http\Controllers\JudgmentType::class, 'create'])->name('juicios-tipo/agregar');
Route::get('/juicios-tipo/editar/{id}', [App\Http\Controllers\JudgmentType::class, 'edit'])->name('juicios-tipo/editar/{id}');
Route::post('judgment-type/store', [App\Http\Controllers\JudgmentType::class, 'store'])->name('judgment-type/store');
Route::put('judgment-type/update', [App\Http\Controllers\JudgmentType::class, 'update'])->name('judgment-type/update');
Route::delete('judgment-type/destroy', [App\Http\Controllers\JudgmentType::class, 'destroy'])->name('judgment-type/destroy');
Route::get('/juicios-subtipo/{typeId}', [App\Http\Controllers\JudgmentSubType::class, 'index'])->name('juicios-subtipo/{typeId}');
Route::get('/juicios-subtipo/agregar/{typeId}', [App\Http\Controllers\JudgmentSubType::class, 'create'])->name('juicios-subtipo/agregar/{typeId}');
Route::get('/juicios-subtipo/editar/{id}', [App\Http\Controllers\JudgmentSubType::class, 'edit'])->name('juicios-subtipo/editar/{id}');
Route::post('judgment-subtype/store', [App\Http\Controllers\JudgmentSubType::class, 'store'])->name('judgment-subtype/store');
Route::put('judgment-subtype/update', [App\Http\Controllers\JudgmentSubType::class, 'update'])->name('judgment-subtype/update');
Route::delete('judgment-subtype/destroy', [App\Http\Controllers\JudgmentSubType::class, 'destroy'])->name('judgment-subtype/destroy');


Route::get('/cotizaciones', [App\Http\Controllers\Quotes::class, 'index'])->name('cotizaciones');
Route::get('/cotizaciones/agregar', [App\Http\Controllers\Quotes::class, 'create'])->name('cotizaciones/agregar');
Route::get('/cotizaciones/editar/{id}', [App\Http\Controllers\Quotes::class, 'edit'])->name('cotizaciones/editar/{id}');
Route::post('quotes/store', [App\Http\Controllers\Quotes::class, 'store'])->name('quotes/store');
Route::put('quotes/update', [App\Http\Controllers\Quotes::class, 'update'])->name('quotes/update');
Route::delete('quotes/destroy', [App\Http\Controllers\Quotes::class, 'destroy'])->name('quotes/destroy');

Route::get('/usuarios', [App\Http\Controllers\User::class, 'index'])->name('usuarios');
Route::get('/usuarios/agregar', [App\Http\Controllers\User::class, 'create'])->name('usuarios/agregar');
Route::get('/usuarios/editar/{id}', [App\Http\Controllers\User::class, 'edit'])->name('usuarios/editar/{id}');
Route::post('user/store', [App\Http\Controllers\User::class, 'store'])->name('user/store');
Route::put('user/update', [App\Http\Controllers\User::class, 'update'])->name('user/update');
Route::delete('user/destroy', [App\Http\Controllers\User::class, 'destroy'])->name('user/destroy');

Route::get('/plantillas', [App\Http\Controllers\Template::class, 'index'])->name('plantillas');
Route::get('/plantillas/agregar', [App\Http\Controllers\Template::class, 'create'])->name('plantillas/agregar');
Route::get('/plantillas/editar/{id}', [App\Http\Controllers\Template::class, 'edit'])->name('plantillas/editar/{id}');
Route::post('template/store', [App\Http\Controllers\Template::class, 'store'])->name('template/store');

Route::put('template/update', [App\Http\Controllers\Template::class, 'update'])->name('template/update');
Route::delete('template/destroy', [App\Http\Controllers\Template::class, 'destroy'])->name('template/destroy');
Route::get('/jugment-subtype/bytype/{typeId}', [App\Http\Controllers\JudgmentSubType::class, 'bytype'])->name('judgmentsubtype.bytype');
Route::get('/jugment-subtype/{id}', [App\Http\Controllers\JudgmentSubType::class, 'byId'])->name('judgmentsubtype.byId');

Route::get('/estados', [App\Http\Controllers\State::class, 'index'])->name('estados');
Route::get('/estados/agregar', [App\Http\Controllers\State::class, 'create'])->name('estados/agregar');
Route::get('/estados/editar/{id}', [App\Http\Controllers\State::class, 'edit'])->name('estados/editar/{id}');
Route::post('states/store', [App\Http\Controllers\State::class, 'store'])->name('states/store');
Route::put('states/update', [App\Http\Controllers\State::class, 'update'])->name('states/update');
Route::delete('states/destroy', [App\Http\Controllers\State::class, 'destroy'])->name('states/destroy');


Route::get('/ocursos', [App\Http\Controllers\Event::class, 'index'])->name('ocursos');
Route::get('/ocursos/agregar', [App\Http\Controllers\Event::class, 'create'])->name('ocursos/agregar');
Route::get('/ocursos/editar/{id}', [App\Http\Controllers\Event::class, 'edit'])->name('ocursos/editar/{id}');
Route::post('event/store', [App\Http\Controllers\Event::class, 'store'])->name('event/store');
Route::put('event/update', [App\Http\Controllers\Event::class, 'update'])->name('event/update');
Route::delete('event/destroy', [App\Http\Controllers\Event::class, 'destroy'])->name('event/destroy');
Route::get('/event/{id}', [App\Http\Controllers\Event::class, 'byId'])->name('event.byId');

Route::post('print/generate', 'App\Http\Controllers\PrintJudgment@generateTemplate')->name('print/generate');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
