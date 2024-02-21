<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Code;
use App\Models\Direction;

class AdminSelectClassController extends Controller
{
    
    public function index()
    {
        $directionId = session('direction_logged_in');
        $codes = Code::where('active', true)->get();

        return view('admin.selectclass', compact('codes'));
    }

    public function create()
    {
        $directionId = session('direction_logged_in');

        $directions = Direction::all()->where('id', '!=', 1);

        return view('admin.createcode', compact('directionId', 'directions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'direction' => 'required|integer',
            'digit' => 'required|integer|min:0|max:9',
            'mode' => 'required|in:S,N',
            'degree' => 'required|in:1,2',
            'year' => 'required|integer|min:2000',
        ]);
    
        $directionId = session('direction_logged_in');
        // $directionCode = Direction::find($directionId)->code;
        $directionCode = Direction::find($request->direction)->code; 
    
        $newCode = $directionCode . $request->digit . $request->mode . $request->degree . '|' . substr($request->year, -2);
    
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
    
        return redirect()->route('aselectclass')->with('success', 'Nowy rocznik został dodany.');
    }

    function toRoman($number) {
        $map = ['0' => '', '1' => 'I', '2' => 'II', '3' => 'III', '4' => 'IV', '5' => 'V'];
        return $map[$number] ?? $number;
    }

    function convertMode($mode) {
        $map = ['S' => 'st. stacjonarne', 'N' => 'st. niestacjonarne'];
        return $map[$mode] ?? $mode;
    }

    public function toArchive($id)
    {
        $code = Code::find($id);
        $code->active = 0;
        $code->save();

        return redirect()->route('aselectclass')->with('success', 'Rocznik został przeniesiony do archiwum.');
    }

    public function statIndex()
    {
        $directionId = session('direction_logged_in');
        $codes = Code::where('active', true)->get();

        $codes1 = Code::where('active', false)->get();

        return view('main.selectstat', compact('codes', 'codes1'));
    }

    public function statusIndex()
    {
        $directionId = session('direction_logged_in');
        $codes = Code::where('active', true)->get();

        return view('main.selectstate', compact('codes'));
    }

}
