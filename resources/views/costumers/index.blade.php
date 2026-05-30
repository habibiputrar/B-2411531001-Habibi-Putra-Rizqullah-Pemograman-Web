@extends('layouts.app')

@section('content')
    <h2>Data Costumer</h2>
    <a href="/costumers/create" class="btn btn-primary">+ Tambah Costumer</a>
    <br><br>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Aksi</th>
        </tr>
        @foreach ($costumers as $i => $costumer)
            <tr>
                <td>{{ $i + 1}}</td>
                <td>{{ $costumer->name }}</td>
                <td>{{ $costumer->email }}</td>
                <td>{{ $costumer->phone }}</td>
                <td>{{ $costumer->address }}</td>
                <td>
                    <a href="/costumers/{{ $costumer->id }}/edit" class="btn btn-warning">Edit</a>
                    <form action="/costumers/{{ $costumer->id }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection