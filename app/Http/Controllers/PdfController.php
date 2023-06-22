<?php

namespace App\Http\Controllers;

use App\Models\Pdf;
use Illuminate\Http\Request;
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
        'pdf' => 'required|mimes:pdf|max:2048',
    ]);

    $pdf = new Pdf;

    if ($request->file('pdf')) {
        $file = $request->file('pdf');
        $fileName = $file->getClientOriginalName(); // Obtiene el nombre original del archivo
        $filePath = $file->storeAs('', $fileName, 'public');
        $pdf->nombre_archivo = $fileName;
        $pdf->ruta_archivo = '/storage/' . $filePath;
    }

    $pdf->save();

    return view('pdf/create')->with('success', 'Archivo PDF subido exitosamente.');
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



}




