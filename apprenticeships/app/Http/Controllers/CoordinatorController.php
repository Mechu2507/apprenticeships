<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coordinator;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CoordinatorsImport;

class CoordinatorController extends Controller
{
    public function index()
    {
        $coordinators = Coordinator::all();

        return view('main.coordinators', compact('coordinators'));
    }

    public function uploadCoordinator(Request $request)
    {
        
        Excel::import(new CoordinatorsImport, $request->file('file'));

        return redirect()->route('coordinators.index')->with('success', 'Koordynatorzy zaimportowani pomyślnie');
    }

    public function edit(string $id)
    {
        $coordinator = Coordinator::findOrfail($id);

        return view('main.edit_coordinator', compact('coordinator'));
    }

    public function update(Request $request, string $id)
    {
        $coordinator = Coordinator::findOrfail($id);

        $coordinator->update($request->all());

        return redirect()->route('coordinators.index')->with('success', 'Koordynator zaktualizowany pomyślnie');
    }

    public function create()
    {
        return view('main.create_coordinator');
    }

    public function store(Request $request)
    {
        Coordinator::create($request->all());

        return redirect()->route('coordinators.index')->with('success', 'Koordynator dodany pomyślnie');
    }

    public function destroy(string $id)
    {
        $coordinator = Coordinator::findOrfail($id);

        $coordinator->delete();

        return redirect()->route('coordinators.index')->with('success', 'Koordynator usunięty pomyślnie');
    }
}
