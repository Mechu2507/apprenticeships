<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Active;
use App\Models\Representative;
use App\Models\Code;
use App\Imports\ActivesImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ActivesExport;


class AdminController extends Controller
{
    public function index(Request $request)
    {
        $codeId = $request->input('code_id');
        $actives = Active::where('code_id', $codeId)->get();
        $representatives = Representative::all();

        return view('main.table', compact('actives', 'representatives'));
    }

    public function importActive()
    {
        $directionId = session('direction_logged_in');
        $codes = Code::where('active', true)->get();

        return view('main.import_excel', compact('codes'));
    }

    public function uploadActive(Request $request)
    {
        $directionId = session('direction_logged_in');
        $codes = Code::where('active', true)->get();

        $codeId = $request->input('code_id');

        Excel::import(new ActivesImport($codeId), $request->file('file'));

        $actives = Active::where('code_id', $codeId)->get();
        $representatives = Representative::all();

        return view('main.table', compact('actives', 'representatives'));
    }

    public function exportActiveIndex(Request $request)
    {
        $directionId = session('direction_logged_in');
        $codes = Code::where('active', true)->get();

        $codes1 = Code::where('active', false)->get();

        return view('main.export_excel', compact('codes', 'codes1'));
    }

    public function exportActive(Request $request)
    {
        $directionId = session('direction_logged_in');
        $codes = Code::get();

        $codeId = $request->input('code_id');

        return Excel::download(new ActivesExport($codeId), 'export' . date('Y-m-d-H:i') . '.xlsx');
    }
}
