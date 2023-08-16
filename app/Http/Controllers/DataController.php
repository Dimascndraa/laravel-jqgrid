<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function getStudentsData()
    {
        $students = Student::all();
        return response()->json($students);
    }
}
