<?php

namespace App\Http\Controllers;

use App\Models\Code;
use Illuminate\Http\Request;

class SelectClassController extends Controller
{
    
    public function index()
    {
        $directionId = session('direction_logged_in');
        $codes = Code::where('direction_id', $directionId)->where('active', true)->get();

        return view('main.selectclass', compact('codes'));
    }

}
