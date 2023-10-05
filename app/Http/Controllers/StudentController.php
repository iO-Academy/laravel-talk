<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function getAll()
    {
        $students = Student::all();
        return $students;
    }

    public function create(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|min:1|max:255',
            'last_name' => 'string|max:255',
            'address' => 'required|min:10|max:500|string',
            'age' => 'required|integer|min:0|max:809'
        ]);

        $student = new Student();
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->address = $request->address;
        $student->age = $request->age;

        if ($student->save()) {
            return response()->json([
                'message' => 'student saved to db'
            ]);
        }
    }
}
