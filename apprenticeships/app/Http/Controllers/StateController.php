<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Active;
use App\Models\State;
use App\Imports\StudentsDataImport;
use Maatwebsite\Excel\Facades\Excel;

class StateController extends Controller
{
    public function index(Request $request)
    {
        $codeId = $request->input('code_id');
        $actives = Active::where('code_id', $codeId)->where('generated', true)->get();
        $states = State::all()->where('id', '!=', 1);
        $active = Active::find($codeId);

        return view('main.state_table', compact('actives', 'states', 'codeId', 'active'));
    }

    public function uploadStudentsData(Request $request)
    {
        $codeId = $request->input('code_id');

        Excel::import(new StudentsDataImport($codeId), $request->file('file'));

        return redirect()->route('selectstatus')->with('success', 'Zaimportowano dane studentów.');
    }

    public function editStatus(Request $request, $id)
    {
        $active = Active::findorfail($id);

        $directionId = session('direction_logged_in');
        if(session('direction_name') != 'Admin'){
            if ($active->code->direction_id != $directionId) {
                return redirect()->route('selectclass')->with('error', 'Nie masz uprawnień do edycji tego studenta.');
            }
        }

        return view('main.edit_status', compact('active'));
    }

    public function updateStatus(Request $request, string $id)
    {
        $active = Active::findorfail($id);
        
        $active->company = $request->input('company', $active->company);

        $request->validate([
            'index' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'for_signature' => 'nullable|date',
            'mail_date' => 'nullable|date',
            'envelope_date' => 'nullable|date',
            'self_collection' => 'nullable|date',
            'return' => 'nullable|date',
            'company' => 'required'
        ]);
        
        $directionId = session('direction_logged_in');
        if(session('direction_name') != 'Admin'){
            if ($active->code->direction_id != $directionId) {
                return redirect()->route('selectstatus')->with('error', 'Nie masz uprawnień do edycji tego studenta.');
            }
        }
        
        $active->update($request->all());

        return redirect()->route('selectstatus')->with('success', 'Zaktualizowano status.');
    }
    
}
