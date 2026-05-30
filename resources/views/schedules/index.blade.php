@extends('layouts.app-relation')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Jadwal Mata Kuliah</h2>
        <a href="{{ route('schedules.create') }}" class="btn btn-primary">Tambah Jadwal</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach($subjects as $subject)
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
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Hari</th>
                                        <th>Jam</th>
                                        <th>Ruangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($subject->schedules as $schedule)
                                        <tr>
                                            <td>{{ $schedule->day }}</td>
                                            <td>{{ $schedule->start_time }} - {{ $schedule->end_time }}</td>
                                            <td>{{ $schedule->room }}</td>
                                            <td>
                                                <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <a href="{{ route('students.index') }}" class="btn btn-secondary">Kembali ke Mahasiswa</a>
@endsection