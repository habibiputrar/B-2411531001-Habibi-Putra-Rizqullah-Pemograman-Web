<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Subject;
use App\Models\Student;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $subjects = Subject::with('schedules')->get();
        return view('schedules.index', compact('subjects'));
    }

    public function create()
    {
        $subjects = Subject::all();
        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        return view('schedules.create', compact('subjects', 'days'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'room' => 'required',
        ]);

        Schedule::create($request->all());

        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();

        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil dihapus');
    }

    public function studentDetail($id)
    {
        $student = Student::with(['major', 'subjects.schedules'])->findOrFail($id);
        return view('schedules.student-detail', compact('student'));
    }
}