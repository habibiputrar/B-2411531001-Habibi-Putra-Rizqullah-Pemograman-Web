@extends('layouts.app-relation')

@section('content')
    <h2 class="mb-4">Latihan Query Relationship</h2>

    {{-- 1. Semua mahasiswa beserta jurusan dan mata kuliahnya --}}
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">1. Semua Mahasiswa beserta Jurusan dan Mata Kuliah</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Mata Kuliah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student->nim }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->major->name }}</td>
                            <td>
                                @foreach($student->subjects as $subject)
                                    <span class="badge bg-secondary me-1">{{ $subject->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- 2. Jurusan yang memiliki mahasiswa terbanyak --}}
    <div class="card mb-4">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">2. Jurusan dengan Mahasiswa Terbanyak</h5>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Jurusan</th>
                        <th>Jumlah Mahasiswa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $topMajor->name }}</td>
                        <td><span class="badge bg-success">{{ $topMajor->students_count }} mahasiswa</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- 3. Mata kuliah yang diambil mahasiswa tertentu --}}
    <div class="card mb-4">
        <div class="card-header bg-warning">
            <h5 class="mb-0">3. Mata Kuliah Mahasiswa: {{ $studentSubjects->name }}</h5>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($studentSubjects->subjects as $subject)
                        <tr>
                            <td>{{ $subject->name }}</td>
                            <td>{{ $subject->sks }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- 4. Total SKS setiap mahasiswa --}}
    <div class="card mb-4">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">4. Total SKS Setiap Mahasiswa</h5>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Total SKS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($studentsSks as $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td><span class="badge bg-info">{{ $item['total_sks'] }} SKS</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <a href="{{ route('students.index') }}" class="btn btn-secondary">Kembali</a>

@endsection