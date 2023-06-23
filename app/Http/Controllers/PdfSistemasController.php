<?php

namespace App\Http\Controllers;

use App\Models\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;

class PdfSistemasController extends Controller
{
    //
    public function create()
    {
        return view('sistemas.createsistemas');
    }

    //recuperar y mostrar archivos
    public function index()
    {
        $sistemasPath = public_path('storage/sistemas');
        $pdfs = File::files($sistemasPath);
    
        return view('sistemas.indexsistemas', compact('pdfs'));
    }

//cargar archivos 
public function store(Request $request)
{
    $request->validate([
        'pdf' => 'required|array',
        'pdf.*' => 'required|mimes:pdf|max:10240',
    ]);

    foreach ($request->file('pdf') as $file) {
        $pdf = new Pdf;

        if ($file) {
            $fileName = $file->getClientOriginalName(); // Obtiene el nombre original del archivo
            $filePath = $file->storeAs('sistemas', $fileName, 'public');
            $pdf->nombre_archivo = $fileName;
            $pdf->ruta_archivo = '/storage/' . $filePath;
            $pdf->save();
        }
    }

    return redirect()->route('sistemas.index')->with('success', 'Archivo PDF subido exitosamente.');
}

//ver archivos 
public function show($nombre_archivo)
{
    $pdf = Pdf::findOrFail($nombre_archivo);

    $pdfPath = $pdf->nombre_archivo;
    

    if (!Storage::disk('public')->exists($pdfPath)) {
        abort(404);
    }

    $pdf = Storage::url($pdfPath);

    return view('sistemas.show', compact('pdfUrl'));
}

public function destroy($nombre_archivo)
{
    

    // Eliminar la entrada correspondiente en la base de datos
    $pdf = Pdf::where('nombre_archivo', $nombre_archivo)->first();
    if ($pdf) {
        $pdf->delete();
    }
// Eliminar el archivo de la carpeta 'sistemas' en storage
    unlink(public_path('storage/sistemas'.'/'. $pdf->nombre_archivo));

    return redirect()->route('sistemas.index')->with('success', 'Archivo PDF eliminado exitosamente.');
}


public function busqueda(Request $request)
{
    $busqueda = $request->input('busqueda');

    // Ruta de la carpeta sistemas
    $sistemasPath = storage_path('app/public/sistemas');

    // Obtener la lista de archivos en la carpeta sistemas
    $archivos = collect(Storage::files('sistemas'))->map(function ($archivo) use ($sistemasPath) {
        return $sistemasPath . '/' . $archivo;
    });

    // Filtrar los archivos según la búsqueda
    $archivosFiltrados = $archivos->filter(function ($archivo) use ($busqueda) {
        return strpos(basename($archivo), $busqueda) !== false;
    });

    // Obtener los nombres de archivo filtrados
    $nombresArchivosFiltrados = $archivosFiltrados->map(function ($archivo) {
        return basename($archivo);
    });

    // Buscar los registros en la base de datos utilizando los nombres de archivo filtrados
    $pdfs = Pdf::whereIn('nombre_archivo', $nombresArchivosFiltrados)->get();

    // Paginar los archivos filtrados
    $page = $request->query('page', 1);
    $perPage = 100;
    $total = $archivosFiltrados->count();

    $pdfs = new LengthAwarePaginator(
        $pdfs->forPage($page, $perPage)->values(),
        $total,
        $perPage,
        $page,
        ['path' => url()->current()]
    );

    return view('sistemas.indexsistemas', compact('pdfs'));
}








}




