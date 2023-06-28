<?php
//punto rutas
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\CreadorController;




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



Route::get('/creador-carpetas', [CreadorController::class, 'creador'])->name('creador.creador');
Route::get('/creador-carpetas-crear', [CreadorController::class, 'generarVistasYControlador'])->name('creador.crear');
 
 //rutas para sistemas

    use App\Http\Controllers\PdfsistemasController;
    
    Route::get('/sistemas', [PdfsistemasController::class, 'index'])->name('sistemas.index');
    Route::get('/upload-sistemas', [PdfsistemasController::class, 'create'])->name('sistemas.create');
    Route::post('/upload-sistemas', [PdfsistemasController::class, 'store'])->name('sistemas.store');
    Route::get('storage/sistemas . /{nombre_archivo}', [PdfsistemasController::class, 'show'])->name('sistemas.show');
    Route::delete('/sistemas/{nombre_archivo}', [PdfsistemasController::class, 'destroy'])->name('sistemas.destroy');
    Route::get('/sistemas-busqueda', [PdfsistemasController::class, 'busqueda'])->name('sistemas.busqueda');