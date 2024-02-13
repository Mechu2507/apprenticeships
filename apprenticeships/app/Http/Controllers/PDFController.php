<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Active;
use ZipArchive;


class PDFController extends Controller
{
    
    public function generatePDF(Request $request)
    {
        $ids = $request->input('selected_ids', []);
        $actives = Active::whereIn('id', $ids)->get();

        Active::whereIn('id', $ids)->update(['generated' => 1]);

        $pdf = PDF::loadView('pdf.template', compact('actives'));
        return $pdf->download( 'porozumienie_'. date('Y-m-d-H:i') . '.pdf');

    }

    public function generateSinglePDF(Request $request)
    {
        $ids = $request->input('selected_ids', []);
        $actives = Active::whereIn('id', $ids)->get();

        Active::whereIn('id', $ids)->update(['generated' => 1]);

        $pdf = PDF::loadView('pdf.single_template', compact('actives'));
        return $pdf->download('porozumienie_wielu_studentow' . date('Y-m-d-H:i') . '.pdf');
    }
}
