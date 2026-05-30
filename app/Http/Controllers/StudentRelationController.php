<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Major;
use App\Models\Subject;
use Illuminate\Http\Request;

class StudentRelationController extends Controller
{
    public function index()
    {
        $students = Student::with(['major', 'subjects'])->get();
        return view('student-relation.index', compact('students'));
    }

    public function show($id)
    {
        $student = Student::with(['major', 'subjects'])->findOrFail($id);
        return view('student-relation.show', compact('student'));
    }

    public function create()
    {
        $majors = Major::all();
        $subjects = Subject::all();
        return view('student-relation.create', compact('majors', 'subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:students',
            'name' => 'required',
            'address' => 'required',
            'major_id' => 'required|exists:majors,id',
            'subjects' => 'required|array',
            'subjects.*' => 'exists:subjects,id',
        ]);

        $student = Student::create($request->only(['nim', 'name', 'address', 'major_id']));
        $student->subjects()->attach($request->subjects);

        return redirect()->route('students.index')->with('success', 'Student created successfully');
    }

    public function edit($id)
    {
        $student = Student::with('subjects')->findOrFail($id);
        $majors = Major::all();
        $subjects = Subject::all();
        return view('student-relation.edit', compact('student', 'majors', 'subjects'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'nim' => 'required|unique:students,nim,' . $student->id,
            'name' => 'required',
            'address' => 'required',
            'major_id' => 'required|exists:majors,id',
            'subjects' => 'required|array',
            'subjects.*' => 'exists:subjects,id',
        ]);

        $student->update($request->only(['nim', 'name', 'address', 'major_id']));
        $student->subjects()->sync($request->subjects);

        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->subjects()->detach();
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }

    public function latihan()
    {
        // 1. Semua mahasiswa beserta jurusan dan mata kuliahnya
        $students = Student::with(['major', 'subjects'])->get();

        // 2. Jurusan yang memiliki mahasiswa terbanyak
        $topMajor = Major::withCount('students')
            ->orderBy('students_count', 'desc')
            ->first();

        // 3. Mata kuliah yang diambil oleh mahasiswa tertentu
        $studentSubjects = Student::with('subjects')
            ->where('nim', '2411531001')
            ->first();

        // 4. Total SKS yang diambil setiap mahasiswa
        $studentsSks = Student::with('subjects')->get()->map(function ($student) {
            return [
                'name' => $student->name,
                'total_sks' => $student->subjects->sum('sks'),
            ];
        });

        return view('student-relation.latihan', compact(
            'students',
            'topMajor',
            'studentSubjects',
            'studentsSks'
        ));
    }
}