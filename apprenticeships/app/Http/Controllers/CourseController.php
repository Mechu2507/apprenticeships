<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    
    public function showLoginForm()
    {
        $courses = Course::all();
        return view('login', compact('courses'));
    }
}
