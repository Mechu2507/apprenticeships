<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Code;
use App\Models\Active;


class StatController extends Controller
{
    
    public function index(Request $request)
    {
        $codeId = $request->input('code_id');
        $actives = Active::where('code_id', $codeId)->get();
    
        $companyNameStats = $actives->groupBy('company_name')
                            ->map(function ($items, $key) {
                                return count($items);
                            })
                            ->sortBy(function ($count, $key) {
                                return [-$count, $key];
                            });

        $companyPersonStats = $actives->groupBy('company_person')
                            ->map(function ($items, $key) {
                                return count($items);
                            })
                            ->sortBy(function ($count, $key) {
                                return [-$count, $key];
                            });         
                            
        $positionStats = $actives->groupBy('position')
                            ->map(function ($items, $key) {
                                return count($items);
                            })
                            ->sortBy(function ($count, $key) {
                                return [-$count, $key];
                            });                    
        
        $supervisorStats = $actives->groupBy('supervisor_name')
                            ->map(function ($items, $key) {
                                return count($items);
                            })
                            ->sortBy(function ($count, $key) {
                                return [-$count, $key];
                            });
                            
        $generatedStats = $actives->groupBy('generated')
                            ->map(function ($items, $key) {
                                return count($items);
                            })
                            ->sortBy(function ($count, $key) {
                                return [-$count, $key];
                            });
                    
        $actives1 = Active::with('state')->where('code_id', $codeId)->get();
                            
        $statusStats = $actives->groupBy(function($item) {
            return $item->state->name ?? 'Brak informacji o firmie';
        })
        ->map(function ($items, $key) {
            return count($items);
        })
        ->sortByDesc(function ($count, $key) {
            return [$count, $key];
        });                    

        return view('main.stat_table', compact('companyNameStats', 'companyPersonStats', 'positionStats', 'supervisorStats', 'generatedStats', 'statusStats'));
    }



}
