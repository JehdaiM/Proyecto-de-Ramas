<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesionController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\Users;
use App\Http\Controllers\EmpleadoController;

Route::get('/', [Users::class, 'welcome'])->name('index');  
Route::get('/index', [Users::class, 'index'])->name('index'); 
Route::get('/create', [Users::class, 'create'])->name('create'); 
Route::post('/', [Users::class, 'store'])->name('store'); 
Route::get('/show/{id}', [Users::class, 'show'])->name('show'); 
Route::get('/edit/{id}', [Users::class, 'edit'])->name('edit'); 
Route::put('/update/{id}', [Users::class, 'update'])->name('update');
Route::delete('/destroy/{id}', [Users::class, 'destroy'])->name('destroy'); 

Route::get('/register', [SesionController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [SesionController::class, 'register']);
Route::get('/login', [SesionController::class, 'showLoginForm'])->name('login');
Route::post('/login', [SesionController::class, 'login']);
Route::get('/logout', [SesionController::class, 'logout'])->name('logout');


Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
Route::get('/productos/{id}', [ProductoController::class, 'show'])->name('productos.show');
Route::get('/productos/{id}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
Route::put('/productos/{id}', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('/productos/{id}', [ProductoController::class, 'destroy'])->name('productos.destroy');


Route::get('/empleados', [EmpleadoController::class, 'index'])->name('empleados.index');
Route::get('/empleados/create', [EmpleadoController::class, 'create'])->name('empleados.create');
Route::post('/empleados', [EmpleadoController::class, 'store'])->name('empleados.store');
Route::get('/empleados/{id}', [EmpleadoController::class, 'show'])->name('empleados.show');
Route::get('/empleados/{id}/edit', [EmpleadoController::class, 'edit'])->name('empleados.edit');
Route::put('/empleados/{id}', [EmpleadoController::class, 'update'])->name('empleados.update');
Route::delete('/empleados/{id}', [EmpleadoController::class, 'destroy'])->name('empleados.destroy');

// Ruta solo para administradores
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('checkAdmin');

// Ruta solo para usuarios normales
Route::get('/user/profile', function () {
    return view('user.profile');
})->middleware('checkUser');
