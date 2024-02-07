<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Active;
use App\Models\Code;
use App\Imports\ActivesImport;
use Maatwebsite\Excel\Facades\Excel;

class ActiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $codeId = $request->input('code_id');
        $actives = Active::where('code_id', $codeId)->get();

        return view('main.table', compact('actives'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $active = Active::findOrfail($id);

        $directionId = session('direction_logged_in');
        if ($active->code->direction_id != $directionId) {
            return redirect()->route('home')->with('error', 'You are not authorized to edit that student.');
        }

        return view('main.edit', compact('active'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $active = Active::findOrfail($id);

        $request->validate([
            'student_name' => 'required',
            'company_name' => 'required',
            'MrMs' => 'required',
            'company_address' => 'required',
            'company_person' => 'required',
            'position' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'supervisor_name' => 'required',
            'hours' => 'required',
        ]);

        $directionId = session('direction_logged_in');
        if ($active->code->direction_id != $directionId) {
            return redirect()->route('selectclass')->with('error', 'You are not authorized to edit that student.');
        }

        $active->update($request->all());

        return redirect()->route('selectclass')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function importActive(Request $request)
    {
        $directionId = session('direction_logged_in');
        $codes = Code::where('direction_id', $directionId)->where('active', true)->get();

        return view('main.import_excel', compact('codes'));
    }

    public function uploadActive(Request $request)
    {
        $directionId = session('direction_logged_in');
        $codes = Code::where('direction_id', $directionId)->where('active', true)->get();

        $codeId = $request->input('code_id');

        Excel::import(new ActivesImport($codeId), $request->file('file'));

        $actives = Active::where('code_id', $codeId)->get();

        return view('main.table', compact('actives'));
    }

    public function archiveIndex(Request $request)
    {
        $codeId = $request->input('code_id');
        $actives = Active::where('code_id', $codeId)->get();

        return view('main.archivetable', compact('actives'));
    }
}
