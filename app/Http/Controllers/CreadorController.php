<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


class CreadorController extends Controller
{
    public function creador()
    {
    return view('creador');
    }
public function generarVistasYControlador(Request $request)
{
    $nombreParametro = $request->get('nombreParametro');

    // Nombre de las vistas
    $nombreIndex = 'index' . $nombreParametro . '.blade.php';
    $nombreCreate = 'create' . $nombreParametro . '.blade.php';
    $nombreResultados = 'resultados' . '.blade.php';

    // Contenido de las vistas


    $rutaArchivo = resource_path('views/layouts/navbar.blade.php');

    // Código HTML que deseas agregar
    $codigoHtml = "
      <li>
        <a>$nombreParametro</a>
        <ul class='sub-navigation'>
          <form action='{{ route('$nombreParametro.index') }}' method='GET'>
            <button type='submit' class='btn btn-danger'>PDFs</button>
          </form>
        </ul>
      </li>";
    
    // Leer el contenido actual del archivo
    $contenidoActual = file_get_contents($rutaArchivo);
    
    // Encontrar el punto de inserción (el div) en el contenido actual
    $puntoInsercion = strpos($contenidoActual, '</ul></div>');
    
    // Insertar el código HTML antes del punto de inserción
    if ($puntoInsercion !== false) {
        $contenidoActual = substr_replace($contenidoActual, $codigoHtml, $puntoInsercion, 0);
    }
    
    // Escribir el contenido actualizado en el archivo
    file_put_contents($rutaArchivo, $contenidoActual);
    




    
    


    $contenidoIndex = "@extends('layouts.plantilla')

    @push('styles')
    <link rel='stylesheet' href='{{ asset('css/tables.css') }}'>
    @endpush
    
    @section('title', 'Index')
    
    @section('content')
    <div class='general'>
      <div class='search'>
      <form action='{{ route('$nombreParametro.busqueda') }}' method='GET' class='search'>
          <input type='text' name='busqueda' id='texto' class='form-control' placeholder='Buscar un archivo'>
          <input type='submit' value='Buscar' class='btn btn-primary'>
        </form>
      </div>
    
      <div class='cargar'>
        <form action='{{ route('$nombreParametro.create') }}' method='GET'>
          <button type='submit' class='btn btn-danger'>CARGAR</button>
        </form>
      </div>
    
      <div class='table'>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre de archivo</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @if (!empty(\$pdfs))
            @foreach (\$pdfs as \$pdf)
            <tr>
              <td>{{ \$loop->index + 1 }}</td>
              <td>{{ basename(\$pdf) }}</td>
              <td>
              <a href='{{ route('$nombreParametro.show', basename(\$pdf)) }}' target='_blank'>
                  <button class='btn btn-info'>Abrir</button>
                </a>
                <form action='{{ route('$nombreParametro.destroy', basename(\$pdf)) }}' method='POST'>
                  @method('DELETE')
                  @csrf
                  <button type='submit' class='btn btn-danger'>Eliminar</button>
                </form>
              </td>
            </tr>
            @endforeach
            @else
            <tr>
              <td colspan='3'>No se encontraron PDFs</td>
            </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
    @endsection" ;

    $contenidoCreate = "@extends('layouts.plantilla')
 
    @section('title', 'Index')
    
    @push('styles')
    <link rel='stylesheet' href='{{ asset('css/formulario.css') }}'>
    @endpush
    
    @section('content')
    
    <div class='formulario'>
      <div class='formulario'>
        <form action='{{ route('$nombreParametro.store') }}' method='POST' enctype='multipart/form-data'>
          @csrf
          <div>
            <label for='pdf'>Seleccionar archivo PDF:</label>
            <input type='file' name='pdf[]' accept='application/pdf' id='pdf' multiple>
          </div>
          <div>
            <button type='submit'>Cargar PDF</button>
          </div>
        </form>
      </div>
    </div>
    @endsection";

    $contenidoResultados ="@extends('layouts.plantilla')

    @push('styles')
    <link rel='stylesheet' href='{{ asset('css/tables.css') }}'>
    @endpush
    
    @section('title', 'Index')
    
    @section('content')
    <div class='general'>
      <div class='search'>
        <form action='{{ route('$nombreParametro.busqueda') }}' method='GET' class='search'>        
          <input type='text' name='busqueda' id='texto' class='form-control' placeholder='Buscar un archivo'>
          <input type='submit' value='Buscar' class='btn btn-primary'>
        </form>
      </div>
    
      <div class='cargar'>
        <form action='{{ route('$nombreParametro.create') }}' method='GET'>
          <button type='submit' class='btn btn-danger'>CARGAR</button>
        </form>
      </div>
    
      <div class='table'>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre de archivo</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @if (\$filteredFiles->isEmpty())
            <tr>
              <td colspan='3'>No se encontraron archivos.</td>
            </tr>
            @else
            @foreach (\$filteredFiles as \$file)
            <tr>
              <td>{{ \$loop->index + 1 }}</td>
              <td>{{ \$file->getFilename() }}</td>
              <td>
                <a href='{{ route('$nombreParametro.show', basename(\$file)) }}' target='_blank'>
                  <button class='btn btn-info'>Abrir</button>
                </a>
                <form action='{{ route('sistemas.destroy', basename(\$file)) }}' method='POST'>
                  @method('DELETE')
                  @csrf
                  <button type='submit' class='btn btn-danger'>Eliminar</button>
                </form>
              </td>
            </tr>
            @endforeach
            @endif
          </tbody>
        </table>
      </div>
    </div>
    @endsection" ;


        $carpetaS = public_path('storage/' . $nombreParametro);
        if (!File::exists($carpetaS)) {
            File::makeDirectory($carpetaS);
        }


$carpeta = resource_path('views/' . $nombreParametro);
if (!File::exists($carpeta)) {
    File::makeDirectory($carpeta);
}
    // Rutas de almacenamiento
    $rutaIndex = resource_path('views/' . $nombreParametro . '/' . $nombreIndex);
    $rutaCreate = resource_path('views/' . $nombreParametro . '/' . $nombreCreate);
    $rutaResultados = resource_path('views/' . $nombreParametro . '/' . $nombreResultados);

    // Crear la carpeta si no existe

    // Guardar las vistas
    File::put($rutaIndex, $contenidoIndex);
    File::put($rutaCreate, $contenidoCreate);
    File::put($rutaResultados, $contenidoResultados);

   // Crear el controlador
$nombreControlador = 'Pdf' . $nombreParametro . 'Controller';
$contenidoControlador = "<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;

class $nombreControlador extends Controller
{
    // Métodos del controlador

    public function create()
    {
        return view('$nombreParametro.create$nombreParametro');
    }

    public function index()
    {
        \$nombreParametroPath = public_path('storage/$nombreParametro');
        \$pdfs = File::files(\$nombreParametroPath);

        return view('$nombreParametro.index$nombreParametro', compact('pdfs'));
    }

    public function store(Request \$request)
    {
        \$request->validate([
            'pdf' => 'required|array',
            'pdf.*' => 'required|mimes:pdf|max:10240',
        ]);

        foreach (\$request->file('pdf') as \$file) {
            \$pdf = new Pdf;

            if (\$file) {
                \$fileName = \$file->getClientOriginalName();
                \$filePath = \$file->storeAs('$nombreParametro', \$fileName, 'public');
                \$pdf->nombre_archivo = \$fileName;
                \$pdf->ruta_archivo = '/storage/' . \$filePath;
                \$pdf->save();
            }
        }

        return redirect()->route('$nombreParametro.index')->with('success', 'Archivo PDF subido exitosamente.');
    }

    public function show(\$nombre_archivo)
    {
        \$pdf = Pdf::findOrFail(\$nombre_archivo);

        \$pdfPath = \$pdf->nombre_archivo;

        if (!Storage::disk('public')->exists(\$pdfPath)) {
            abort(404);
        }

        \$pdfUrl = Storage::url(\$pdfPath);

        return view('$nombreParametro.show', compact('pdfUrl'));
    }

    public function destroy(\$nombre_archivo)
    {
        \$pdf = Pdf::where('nombre_archivo', \$nombre_archivo)->first();
        if (\$pdf) {
            \$pdf->delete();
        }

        unlink(public_path('storage/$nombreParametro'.'/'. \$pdf->nombre_archivo));

        return redirect()->route('$nombreParametro.index')->with('success', 'Archivo PDF eliminado exitosamente.');
    }

    public function busqueda(Request \$request)
    {
        \$keyword = \$request->input('busqueda');

        \$directory = public_path('storage/$nombreParametro');

        \$files = File::allFiles(\$directory);

        \$filteredFiles = collect(\$files)->filter(function (\$file) use (\$keyword) {
            return str_contains(\$file->getFilename(), \$keyword);
        });

        \$allFiles = File::allFiles(\$directory);

        return view('$nombreParametro.resultados', compact('filteredFiles', 'allFiles', 'keyword'));
    }

    // Agrega tus propios métodos aquí

}";



    // Guardar el controlador
    $rutaControlador = app_path('Http/Controllers/' . $nombreControlador . '.php');
    File::put($rutaControlador, $contenidoControlador);

    
    //crear rutas
  
    $rutasGeneradas = " //rutas para $nombreParametro
    
    Route::get('/$nombreParametro', [$nombreControlador::class, 'index'])->name('$nombreParametro.index');
    Route::get('/upload-$nombreParametro', [$nombreControlador::class, 'create'])->name('$nombreParametro.create');
    Route::post('/upload-$nombreParametro', [$nombreControlador::class, 'store'])->name('$nombreParametro.store');
    Route::get('storage/$nombreParametro . /{nombre_archivo}', [$nombreControlador::class, 'show'])->name('$nombreParametro.show');
    Route::delete('/$nombreParametro/{nombre_archivo}', [$nombreControlador::class, 'destroy'])->name('$nombreParametro.destroy');
    Route::get('/$nombreParametro-busqueda', [$nombreControlador::class, 'busqueda'])->name('$nombreParametro.busqueda');";

    // Ruta del archivo web.php
    $rutaArchivoWeb = base_path('routes/web.php');

    // Agregar las rutas al archivo web.php
    file_put_contents($rutaArchivoWeb, $rutasGeneradas, FILE_APPEND | LOCK_EX);


    
    
    
    
    // Mensaje de éxito
   return "Las vistas, el controlador y las rutas para '$nombreParametro' han sido generadas exitosamente.";



}



}
