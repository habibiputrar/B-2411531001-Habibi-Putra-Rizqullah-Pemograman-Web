@extends('layouts.app-relation')

@section('content')
    <div class="mb-4">
        <h2>Detail Mahasiswa</h2>
        <div class="card mb-4">
            <div class="card-body">
                <table class="table table-borderless mb-0">
                    <tr>
                        <th width="150">NIM</th>
                        <td>{{ $student->nim }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>{{ $student->name }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $student->address }}</td>
                    </tr>
                    <tr>
                        <th>Jurusan</th>
                        <td>{{ $student->major->name }}</td>
                    </tr>
                    <tr>
                        <th>Total SKS</th>
                        <td>{{ $student->subjects->sum('sks') }} SKS</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <h4 class="mb-3">Jadwal Mata Kuliah</h4>
    <div class="row">
        @foreach($student->subjects as $subject)
            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">{{ $subject->name }}</h5>
                        <small>{{ $subject->sks }} SKS</small>
                    </div>
                    <div class="card-body">
                        @if($subject->schedules->isEmpty())
                            <p class="text-muted">Belum ada jadwal</p>
                        @else
                            @foreach($subject->schedules as $schedule)
                                <div class="d-flex align-items-center mb-2">
                                    <span class="badge bg-secondary me-2">{{ $schedule->day }}</span>
                                    <span class="me-2">🕐 {{ $schedule->start_time }} - {{ $schedule->end_time }}</span>
                                    <span>🏫 {{ $schedule->room }}</span>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <a href="{{ route('students.index') }}" class="btn btn-secondary">Kembali</a>
@endsection