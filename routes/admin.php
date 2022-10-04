<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;

//routa panel administrador
Route::get('', [HomeController::class, 'index'])->name('admin');