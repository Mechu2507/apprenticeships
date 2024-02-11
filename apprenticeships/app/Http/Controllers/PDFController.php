<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Active;


class PDFController extends Controller
{
    
    public function generatePDF(Request $request)
    {
        $ids = $request->input('selected_ids', []);
        $actives = Active::whereIn('id', $ids)->get();
        
        foreach ($actives as $active) {
            $active->update(['generated' => 1]);
            $pdf = PDF::loadView('pdf.template', compact('actives'));
            return $pdf->download($active->code->direction->name . '.pdf');
        }

        return back()->with('success', 'PDF wygenerowane.');
    }
}
