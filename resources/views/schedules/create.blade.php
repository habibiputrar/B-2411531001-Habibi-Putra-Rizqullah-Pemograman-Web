@extends('layouts.app-relation')

@section('content')
    <h2>Tambah Jadwal</h2>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('schedules.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="subject_id" class="form-label">Mata Kuliah</label>
                    <select class="form-control @error('subject_id') is-invalid @enderror" id="subject_id"
                        name="subject_id">
                        <option value="">Pilih Mata Kuliah</option>
                        @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}" {{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                                {{ $subject->name }} ({{ $subject->sks }} SKS)
                            </option>
                        @endforeach
                    </select>
                    @error('subject_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="day" class="form-label">Hari</label>
                    <select class="form-control @error('day') is-invalid @enderror" id="day" name="day">
                        <option value="">Pilih Hari</option>
                        @foreach($days as $day)
                            <option value="{{ $day }}" {{ old('day') == $day ? 'selected' : '' }}>
                                {{ $day }}
                            </option>
                        @endforeach
                    </select>
                    @error('day')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="start_time" class="form-label">Jam Mulai</label>
                    <input type="time" class="form-control @error('start_time') is-invalid @enderror" id="start_time"
                        name="start_time" value="{{ old('start_time') }}">
                    @error('start_time')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="end_time" class="form-label">Jam Selesai</label>
                    <input type="time" class="form-control @error('end_time') is-invalid @enderror" id="end_time"
                        name="end_time" value="{{ old('end_time') }}">
                    @error('end_time')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="room" class="form-label">Ruangan</label>
                    <input type="text" class="form-control @error('room') is-invalid @enderror" id="room" name="room"
                        value="{{ old('room') }}" placeholder="Contoh: Lab A, Ruang 301">
                    @error('room')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('schedules.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection