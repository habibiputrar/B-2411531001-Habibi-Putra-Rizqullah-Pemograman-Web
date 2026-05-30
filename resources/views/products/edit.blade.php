@extends('layouts.app')

@section('content')
    <h2>Edit Product</h2>
    <form action="/products/{{ $product->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" value="{{ $product->name }}">
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="number" name="price" value="{{ $product->price }}">
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description" rows="3">{{ $product->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="/products" class="btn btn-warning">Batal</a>
    </form>
@endsection