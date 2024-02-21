<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Direction;
use Illuminate\Support\Facades\Hash;

class DirectionController extends Controller
{
    
    public function index(){
        $directions = Direction::all();
        return view('admin.direction', compact('directions'));
    }

    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required',
        'code' => 'required|unique:directions,code|max:2',
        'password' => 'required|min:6|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/',
    ]);

    Direction::create([
        'name' => $request->name,
        'code' => $request->code,
        'password' => Hash::make($request->password),
    ]);

    return redirect()->back()->with('success', 'Kierunek dodany pomyślnie');
    }
}
