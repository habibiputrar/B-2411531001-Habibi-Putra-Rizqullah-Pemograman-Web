@extends('layouts.app')

@section('content')
    <h2>Tambah Product</h2>
    <form action="/products" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name">
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="number" name="price">
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/products" class="btn btn-warning">Batal</a>
    </form>
@endsection