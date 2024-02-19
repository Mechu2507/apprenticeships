<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Active;
use App\Models\State;

class StateController extends Controller
{
    public function index(Request $request)
    {
        $codeId = $request->input('code_id');
        $actives = Active::where('code_id', $codeId)->where('generated', true)->get();

        $states = State::all();

        return view('main.state_table', compact('actives', 'states'));
    }

    public function updateStatus(Request $request)
    {
        foreach ($request->states as $activeId => $stateId) {
            $active = Active::find($activeId);
            if ($active) {
                $active->state_id = $stateId;
                $active->save();
            }
        }
    
        return redirect()->route('selectstatus')->with('success', 'Zaktualizowano stan studentów.');
    }
    
}
