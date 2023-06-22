<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

//Rutas hacia los metodos del controlador PDF
//Ruta para mostrar el form
Route::get('/upload-pdf', [PdfController::class, 'create'])->name('pdf.create');
//ruta para cargar los archivos
Route::post('/upload-pdf', [PdfController::class, 'store'])->name('pdf.store');
//ruta para imprimir los archivos
Route::get('/pdf', [PdfController::class, 'index'])->name('pdf.index');
//Ruta para visualizar archivo
Route::get('storage/{nombre_archivo}', [PdfController::class, 'show'])->name('pdf.show');

//Rutas adicionales


