<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\IndexController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\MaterialController;
use App\Http\Controllers\Auth\InventarioController;
use App\Http\Controllers\Auth\EntradasController;
use App\Http\Controllers\Auth\SalidasController;
use App\Http\Controllers\Auth\QRController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\EntradaController;
use App\Http\Controllers\Auth\SalidaController;

use Illuminate\Support\Facades\DB;

Route::get('/db-test', function () {
    try {
        DB::connection()->getPdo();
        return 'Conectado exitosamente a la base de datos.';
    } catch (\Exception $e) {
        return 'No se pudo conectar a la base de datos: ' . $e->getMessage();
    }
});



Route::get('/index', [IndexController::class, 'index'])->name('index');


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/materiales', [MaterialController::class, 'create'])->name('materiales');
Route::post('/materiales/store', [MaterialController::class, 'store'])->name('materiales.store');



Route::get('inventario', [InventarioController::class, 'index'])->name('inventario.index');
Route::get('materiales/{id}/edit', [InventarioController::class, 'edit'])->name('materiales.edit');
Route::put('materiales/{id}', [InventarioController::class, 'update'])->name('materiales.update');
Route::delete('materiales/{id}', [InventarioController::class, 'destroy'])->name('materiales.destroy');


Route::get('/entradas', [EntradasController::class, 'index'])->name('entradas');
Route::get('/salidas', [SalidasController::class, 'index'])->name('salidas');



Route::get('/codigoqr', [QRController::class, 'create'])->name('codigoqr');
Route::post('/scan-qr', [QRController::class, 'scanQR'])->name('scan.qr');
Route::post('/update-stock/{material}', [QRController::class, 'updateStock'])->name('update.stock');

Route::get('/entrada', [EntradaController::class, 'entrada'])->name('entrada');
Route::get('/salida', [SalidaController::class, 'salida'])->name('salida');

Route::get('/entrada', [EntradaController::class, 'showEntradaForm'])->name('entrada');
Route::post('/entrada', [EntradaController::class, 'storeEntrada'])->name('entrada.store');
Route::get('/entradas/pdf', [EntradasController::class, 'generarPDF'])->name('entradas.pdf');

Route::get('/salida', [SalidaController::class, 'showSalidaForm'])->name('salida');
Route::post('/salida', [SalidaController::class, 'storeSalida'])->name('salida.store');
Route::get('/salidas/pdf', [SalidasController::class, 'generarPDF'])->name('salidas.pdf');

Route::post('/logout', [App\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('logout');