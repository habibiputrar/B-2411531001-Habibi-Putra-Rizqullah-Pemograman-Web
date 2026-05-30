@extends('layouts.app')

@section('content')
    <h2>Tambah Costumer</h2>
    <form action="/costumers" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone">
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/costumers" class="btn btn-warning">Batal</a>
    </form>
@endsection