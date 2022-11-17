<?php

use App\Http\Controllers\Admin\RoleController;
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