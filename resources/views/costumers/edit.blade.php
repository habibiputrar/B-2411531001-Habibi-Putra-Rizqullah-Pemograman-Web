@extends('layouts.app')

@section('content')
    <h2>Edit Costumer</h2>
    <form action="/costumers/{{ $costumer->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" value="{{ $costumer->name }}">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ $costumer->email }}">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" value="{{ $costumer->phone }}">
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" value="{{ $costumer->address }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="/costumers" class="btn btn-warning">Batal</a>
    </form>
@endsection