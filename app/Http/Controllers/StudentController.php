<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderby('name')->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $courses = Course::orderby('title')->get();
        return view('students.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'birth_date' => 'required',
            'course_id' => 'required'
        ]);
        Student::create($request->only(['name', 'email', 'birth_date', 'course_id']));
        return redirect('/students');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect('/students');
    }

    public function edit(Student $student)
    {
        $courses = Course::orderby('title')->get();
        return view('students.edit', compact('student', 'courses'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'birth_date' => 'required',
            'course_id' => 'required'
        ]);
        $student->update($request->only(['name', 'email', 'birth_date', 'course_id']));
        return redirect('/students');
    }
}
