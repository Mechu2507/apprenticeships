<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Active;
use App\Models\Representative;
use ZipArchive;


class PDFController extends Controller
{
    
    public function generatePDF(Request $request)
    {
        $ids = $request->input('selected_ids', []);
        $actives = Active::whereIn('id', $ids)->get();

        $representativeId = $request->input('representative_id');
        $representative = Representative::find($representativeId);

        Active::whereIn('id', $ids)->update(['generated' => 1, 'state_id' => 2]);

        $pdf = PDF::loadView('pdf.template', compact('actives', 'representative'));
        return $pdf->download( 'porozumienie_'. date('Y-m-d-H:i') . '.pdf');

    }

    public function generateSinglePDF(Request $request)
    {
        $ids = $request->input('selected_ids', []);
        $actives = Active::whereIn('id', $ids)->get();

        $first = $actives->first();
        $consistent = $actives->every(function ($active) use ($first) {
            return $active->company_name == $first->company_name &&
                   $active->supervisor_name == $first->supervisor_name &&
                   $active->company_person == $first->company_person;
        });

        if (!$consistent) {
            return redirect()->route('selectclass')->with('error', 'Nie można wygenerować jednego porozumienia dla różnych danych firm');
        }

        $representativeId = $request->input('representative_id');
        $representative = Representative::find($representativeId);

        Active::whereIn('id', $ids)->update(['generated' => 1, 'state_id' => 2]);


        $pdf = PDF::loadView('pdf.single_template', compact('actives', 'representative'));
        return $pdf->download('porozumienie_wielu_studentow' . date('Y-m-d-H:i') . '.pdf');
    }
}
