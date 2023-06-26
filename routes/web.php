<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PdfSistemasController;
use App\Http\Controllers\PdfContabilidadController;
use App\Http\Controllers\CreadorController;
use App\Http\Controllers\PdfgerenciaController;


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

// Rutas hacia los métodos del controlador PDF
// Ruta para mostrar el formulario de carga de PDF
Route::get('/upload-pdf', [PdfController::class, 'create'])->name('pdf.create');
// Ruta para procesar la carga de los archivos PDF
Route::post('/upload-pdf', [PdfController::class, 'store'])->name('pdf.store');
// Ruta para mostrar todos los PDF
Route::get('/pdfs', [PdfController::class, 'index'])->name('pdf.index');
// Ruta para mostrar un PDF específico
Route::get('storage/{nombre_archivo}', [PdfController::class, 'show'])->name('pdf.show');
// Ruta para eliminar un pdf 
Route::delete('/pdf/{nombre_archivo}', [PdfController::class, 'destroy'])->name('pdf.destroy');
//Ruta del buscador
Route::get('/pdfs-busqueda', [PdfController::class, 'busqueda'])->name('pdf.busqueda');



// Rutas para los PDFs en sistemas
// Ruta para mostrar los PDFs en sistemas
Route::get('/pdfs-sistemas', [PdfSistemasController::class, 'index'])->name('sistemas.index');
// Ruta para cargar nuevos archivos en sistemas
Route::get('/upload-pdf-sistemas', [PdfSistemasController::class, 'create'])->name('sistemas.create');

Route::post('/upload-pdf-sistemas', [PdfSistemasController::class, 'store'])->name('sistemas.store');

Route::get('storage/Sistemas/{nombre_archivo}', [PdfSistemasController::class, 'show'])->name('sistemas.show');

Route::delete('/sistemas/{nombre_archivo}', [PdfSistemasController::class, 'destroy'])->name('sistemas.destroy');
//Ruta del buscador
Route::get('/sistemas-busqueda', [PdfSistemasController::class, 'busqueda'])->name('sistemas.busqueda');


// Rutas para los PDFs en contabilidiad
// Ruta para mostrar los PDFs en contabilidad
Route::get('/pdfs-contabilidad', [PdfContabilidadController::class, 'index'])->name('contabilidad.index');
// Ruta para cargar nuevos archivos Contabilidad
Route::get('/upload-pdf-contabilidad', [PdfContabilidadController::class, 'create'])->name('contabilidad.create');

Route::post('/upload-pdf-contabilidad', [PdfContabilidadController::class, 'store'])->name('contabilidad.store');

Route::get('storage/contabilidad/{nombre_archivo}', [PdfContabilidadController::class, 'show'])->name('contabilidad.show');

Route::delete('/contabilidad/{nombre_archivo}', [PdfContabilidadController::class, 'destroy'])->name('contabilidad.destroy');
//Ruta del buscador
Route::get('/contabilidad-busqueda', [PdfContabilidadController::class, 'busqueda'])->name('contabilidad.busqueda');


Route::get('/creador-carpetas', [CreadorController::class, 'creador'])->name('creador.creador');
Route::get('/creador-carpetas-crear', [CreadorController::class, 'generarVistasYControlador'])->name('creador.crear');

 //rutas para Gerencia
    
    
     //rutas para gerencia
    
  
  //rutas para ecuador
     //rutas para economia
    

    //rutas para gerencia
    
 //rutas para gerencia
    
    Route::get('/gerencia', [PdfgerenciaController::class, 'index'])->name('gerencia.index');
    Route::get('/upload-gerencia', [PdfgerenciaController::class, 'create'])->name('gerencia.create');
    Route::post('/upload-gerencia', [PdfgerenciaController::class, 'store'])->name('gerencia.store');
    Route::get('storage/gerencia . /{nombre_archivo}', [PdfgerenciaController::class, 'show'])->name('gerencia.show');
    Route::delete('/gerencia/{nombre_archivo}', [PdfgerenciaController::class, 'destroy'])->name('gerencia.destroy');
    Route::get('/gerencia-busqueda', [PdfgerenciaController::class, 'busqueda'])->name('gerencia.busqueda'); //rutas para gerencia
    
    Route::get('/gerencia', [PdfgerenciaController::class, 'index'])->name('gerencia.index');
    Route::get('/upload-gerencia', [PdfgerenciaController::class, 'create'])->name('gerencia.create');
    Route::post('/upload-gerencia', [PdfgerenciaController::class, 'store'])->name('gerencia.store');
    Route::get('storage/gerencia . /{nombre_archivo}', [PdfgerenciaController::class, 'show'])->name('gerencia.show');
    Route::delete('/gerencia/{nombre_archivo}', [PdfgerenciaController::class, 'destroy'])->name('gerencia.destroy');
    Route::get('/gerencia-busqueda', [PdfgerenciaController::class, 'busqueda'])->name('gerencia.busqueda');