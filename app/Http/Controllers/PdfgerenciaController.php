<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;

class PdfgerenciaController extends Controller
{
    // Métodos del controlador

    public function create()
    {
        return view('gerencia.creategerencia');
    }

    public function index()
    {
        $nombreParametroPath = public_path('storage/gerencia');
        $pdfs = File::files($nombreParametroPath);

        return view('gerencia.indexgerencia', compact('pdfs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pdf' => 'required|array',
            'pdf.*' => 'required|mimes:pdf|max:10240',
        ]);

        foreach ($request->file('pdf') as $file) {
            $pdf = new Pdf;

            if ($file) {
                $fileName = $file->getClientOriginalName();
                $filePath = $file->storeAs('gerencia', $fileName, 'public');
                $pdf->nombre_archivo = $fileName;
                $pdf->ruta_archivo = '/storage/' . $filePath;
                $pdf->save();
            }
        }

        return redirect()->route('gerencia.index')->with('success', 'Archivo PDF subido exitosamente.');
    }

    public function show($nombre_archivo)
    {
        $pdf = Pdf::findOrFail($nombre_archivo);

        $pdfPath = $pdf->nombre_archivo;

        if (!Storage::disk('public')->exists($pdfPath)) {
            abort(404);
        }

        $pdfUrl = Storage::url($pdfPath);

        return view('gerencia.show', compact('pdfUrl'));
    }

    public function destroy($nombre_archivo)
    {
        $pdf = Pdf::where('nombre_archivo', $nombre_archivo)->first();
        if ($pdf) {
            $pdf->delete();
        }

        unlink(public_path('storage/gerencia'.'/'. $pdf->nombre_archivo));

        return redirect()->route('gerencia.index')->with('success', 'Archivo PDF eliminado exitosamente.');
    }

    public function busqueda(Request $request)
    {
        $keyword = $request->input('busqueda');

        $directory = public_path('storage/gerencia');

        $files = File::allFiles($directory);

        $filteredFiles = collect($files)->filter(function ($file) use ($keyword) {
            return str_contains($file->getFilename(), $keyword);
        });

        $allFiles = File::allFiles($directory);

        return view('gerencia.resultados', compact('filteredFiles', 'allFiles', 'keyword'));
    }

    // Agrega tus propios métodos aquí

}