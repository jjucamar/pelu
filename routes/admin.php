<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SpecialtyController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function()
    {
        return view('admin.index');
    }
)
->name('admin.index')
->middleware(['can:admin.index'])
;

// creamos la ruta para el manejo de los roles

Route::resource('/roles',RoleController::class)
->names('roles');

// creamos la ruta para el manejo de los Usuarios

Route::resource('/users',UserController::class)
->names('users');

// Para el manejo de las especialidades

Route::resource('/specialties',SpecialtyController::class)->names('specialties');
