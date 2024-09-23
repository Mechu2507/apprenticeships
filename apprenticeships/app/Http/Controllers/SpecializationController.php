<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Specialization;
class SpecializationController extends Controller
{
    public function index()
    {
        $specializations = Specialization::all();
        return view('main.specialization', compact('specializations'));
    }
    public function store(Request $request)
    {
        Specialization::create($request->all());
        return redirect()->route('specializations.index');
    }
    public function edit(string $id)
    {
        $specialization = Specialization::findOrFail($id);
        return view('main.edit_specialization', compact('specialization'));
    }
    public function update(Request $request, string $id)
    {
        $specialization = Specialization::find($id);
        $specialization->update($request->all());
        return redirect()->route('specializations.index');
    }
    public function destroy(string $id)
    {
        $specialization = Specialization::find($id);
        $specialization->delete();
        return redirect()->route('specializations.index');
    }
}