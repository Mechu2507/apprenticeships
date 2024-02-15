<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Representative;

class RepresentativeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $representatives = Representative::all();
        return view('main.representatives', compact('representatives'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
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
        $representative = Representative::findOrfail($id);
        return view('main.edit-representative', compact('representative'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $representative = Representative::find($id);
        $representative->update($request->all());
        return redirect()->route('representatives.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $representative = Representative::findOrfail($id);
        $representative->delete();
        return redirect()->route('representatives.index');
    }
}
