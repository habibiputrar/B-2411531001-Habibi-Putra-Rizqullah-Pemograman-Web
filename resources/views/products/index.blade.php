@extends('layouts.app')

@section('content')
    <h2>Data Product</h2>
    <a href="/products/create" class="btn btn-primary">+ Tambah Product</a>
    <br><br>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
        @foreach ($products as $i => $product)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $product->name }}</td>
                <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                <td>{{ $product->description }}</td>
                <td>
                    <a href="/products/{{ $product->id }}/edit" class="btn btn-warning">Edit</a>
                    <form action="/products/{{ $product->id }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection