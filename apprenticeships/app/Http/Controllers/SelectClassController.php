<?php

namespace App\Http\Controllers;

use App\Models\Code;
use Illuminate\Http\Request;
use App\Models\Direction;
use App\Models\Specialization;

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
        $specializations = Specialization::all();
        return view('main.createcode', compact('directionId', 'specializations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'digit' => 'required|integer|min:0|max:9',
            'mode' => 'required|in:S,N',
            'degree' => 'required|in:1,2',
            'year' => 'required|integer|min:2000',
            'specialization' => 'required',
        ]);
    
        $directionId = session('direction_logged_in');
        $directionCode = Direction::find($directionId)->code; 
    
        $specialization = Specialization::find($request->specialization)->letter;

        $newCode = $directionCode . $request->digit . $request->mode . $request->degree . '|' . substr($request->year, -2) . $specialization;
    
        $romanDigit = $this->toRoman($request->digit);
        $romanDegree = $this->toRoman($request->degree);
        $fullMode = $this->convertMode($request->mode);

        Code::create([
            'direction_id' => $directionId,
            'code' => $newCode,
            'active' => 1,
            'year' => $romanDigit . ' rok',
            'degree' => $romanDegree . ' stopień',
            'mode' => $fullMode,
        ]);
    
        return redirect()->route('selectclass')->with('success', 'Nowy rocznik został dodany.');
    }

    function toRoman($number) {
        $map = ['0' => '', '1' => 'I', '2' => 'II', '3' => 'III', '4' => 'IV', '5' => 'V'];
        return $map[$number] ?? $number;
    }

    function convertMode($mode) {
        $map = ['S' => 'st. stacjonarne', 'N' => 'st. niestacjonarne'];
        return $map[$mode] ?? $mode;
    }

    public function archiveIndex()
    {
        $directionId = session('direction_logged_in');
        $codes = Code::where('direction_id', $directionId)->where('active', false)->get();

        return view('main.selectarchive', compact('codes'));
    }

    public function toArchive($id)
    {
        $code = Code::findOrFail($id);
        
        $code->active = 0;
        $code->save();

        return redirect()->route('selectclass')->with('success', 'Rocznik został przeniesiony do archiwum.');
    }

    public function statusIndex()
    {
        $directionId = session('direction_logged_in');
        $codes = Code::where('direction_id', $directionId)->where('active', true)->get();

        return view('main.selectstate', compact('codes'));
    }

    public function statIndex()
    {
        $directionId = session('direction_logged_in');
        $codes = Code::where('direction_id', $directionId)->where('active', true)->get();

        $codes1 = Code::where('direction_id', $directionId)->where('active', false)->get();

        return view('main.selectstat', compact('codes', 'codes1'));
    }
    
}
