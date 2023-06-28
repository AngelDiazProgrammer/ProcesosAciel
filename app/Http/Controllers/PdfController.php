<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;


class PdfController extends Controller
{
   //subir archivos
    public function create()
    {
        return view('pdf.create');
    }

    //recuperar y mostrar archivos
    public function index()
{
    $pdfs = Pdf::all();

    return view('pdf.index', compact('pdfs'));
}

//cargar archivos 
public function store(Request $request)
{
    $request->validate([
        'pdf' => 'required|array',
        'pdf.*' => 'required|mimes:pdf|max:10240',
    ]);
// Después de realizar la validación


    foreach ($request->file('pdf') as $file) {
        $pdf = new Pdf;

        if ($file) {
            $fileName = $file->getClientOriginalName(); // Obtiene el nombre original del archivo
            $filePath = $file->storeAs('/', $fileName, 'public');
            $pdf->nombre_archivo = $fileName;
            $pdf->ruta_archivo = '/storage/' . $filePath;
            $pdf->save();
        }
    }

    return redirect()->route('pdf.index')->with('success', 'Archivo PDF subido exitosamente.');
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

    return view('pdf.show', compact('pdfUrl'));
}

public function destroy($nombre_archivo)
{
    // Buscar el archivo en la base de datos
    $pdf = Pdf::where('nombre_archivo', $nombre_archivo)->first();

    if (!$pdf) {
        return redirect()->back()->with('error', 'Archivo no encontrado');
    }

    // Eliminar el archivo de almacenamiento
    unlink(public_path('storage'.'/'. $pdf->nombre_archivo));

    // Eliminar el registro de la base de datos
    $pdf->delete();

    return redirect()->back()->with('success', 'Archivo eliminado exitosamente');
}

public function busqueda(Request $request)
    {
       $busqueda=  $request->busqueda;
       $pdfs = Pdf::where('nombre_archivo', 'LIKE','%'.$busqueda.'%')->paginate(100);

    return view('pdf.index', compact('pdfs'));
    }
}





