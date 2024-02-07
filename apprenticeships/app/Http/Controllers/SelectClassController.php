<?php

namespace App\Http\Controllers;

use App\Models\Code;
use Illuminate\Http\Request;
use App\Models\Direction;

class SelectClassController extends Controller
{
    
    public function index()
    {
        $directionId = session('direction_logged_in');
        $codes = Code::where('direction_id', $directionId)->where('active', true)->get();

        return view('main.selectclass', compact('codes'));
    }

    public function create()
    {
        $directionId = session('direction_logged_in');
        return view('main.createcode', compact('directionId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'digit' => 'required|integer|min:0|max:9',
            'mode' => 'required|in:S,N',
            'degree' => 'required|in:1,2',
            'year' => 'required|integer|min:2000',
        ]);
    
        $directionId = session('direction_logged_in');
        $directionCode = Direction::find($directionId)->code; 
    
        $newCode = $directionCode . $request->digit . $request->mode . $request->degree . '|' . substr($request->year, -2);
    
        Code::create([
            'direction_id' => $directionId,
            'code' => $newCode,
            'active' => 1
        ]);
    
        return redirect()->route('selectclass')->with('success', 'Nowy rocznik został dodany.');
    }

    public function archiveIndex()
    {
        $directionId = session('direction_logged_in');
        $codes = Code::where('direction_id', $directionId)->where('active', false)->get();

        return view('main.selectarchive', compact('codes'));
    }
    
}
