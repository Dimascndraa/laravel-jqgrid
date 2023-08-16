<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function getStudentsData()
    {
        $students = Student::all();
        return response()->json($students);
    }

    public function editStudent(Request $request)
    {
        $student = Student::find($request->id);
        $student->update($request->all());
        return response()->json(['success' => true]);
    }

    public function addStudent(Request $request)
    {
        Student::create($request->all());
        return response()->json(['success' => true]);
    }

    public function deleteStudent(Request $request)
    {
        Student::destroy($request->id);
        return response()->json(['success' => true]);
    }
}
