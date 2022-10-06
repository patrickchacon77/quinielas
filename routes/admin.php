<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\TorneoController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\UserTorneoController;
use App\Http\Controllers\ResultadoController;

//routa panel administrador
Route::get('', [HomeController::class, 'index'])->name('admin');

//routa cursos resource
Route::resource('/torneos', TorneoController::class)->names('admin.torneos');//->middleware('can:admin.cursos');


Route::get('/torneos/addPais/{id}', [TorneoController::class, 'addPais'])->name('admin.torneos.addPais');

Route::any('/torneos/guardarPais/', [TorneoController::class, 'GuardarPais'])->name('admin.torneos.guardarPais');



//routa cursos resource
Route::resource('/paises', PaisController::class)->names('admin.paises');//->middleware('can:admin.cursos');

//routa cursos resource
Route::resource('/partidos', PartidoController::class)->names('admin.partidos');//->middleware('can:admin.cursos');

//routa cursos resource
Route::resource('/invitaciones', UserTorneoController::class)->names('admin.invitaciones');//->middleware('can:admin.cursos');

//routa cursos resource
Route::resource('/resultados', ResultadoController::class)->names('admin.resultados');//->middleware('can:admin.cursos');