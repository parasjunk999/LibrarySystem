<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'student_name' => 'required',
            'class' => 'required',
            'roll_no' => 'required',
            'mobile_no' => 'required',
            'admission_nom' => 'required',
            'section' => 'required',
        ]);

        Student::create($request->all());

        return redirect()->route('student-corner')->with('success', 'Student created successfully');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'student_name' => 'required',
            'class' => 'required',
            'roll_no' => 'required',
            'mobile_no' => 'required',
            'admission_nom' => 'required',
            'section' => 'required',
        ]);

        $student = Student::findOrFail($id);
        $student->update($request->all());

        return redirect()->route('student-corner')->with('success', 'Student updated successfully');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
    
        return redirect()->route('student-corner')->with('success', 'Student deleted successfully');
    }
    
}