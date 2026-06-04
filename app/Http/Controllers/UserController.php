<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = \App\Models\User::all();
        return view('user.index', ['users' => $users]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $user = new \App\Models\User;
        $user->name = $request->get('nama');
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->password = \Hash::make($request->get('password'));
        $user->level = json_encode($request->get('level'));
        $user->save();

        return redirect()->route('users.index')->with('status', 'User baru berhasil ditambahkan');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $user = \App\Models\User::findOrFail($id);
        return view('user.edit', ['user' => $user]);
    }

    public function update(Request $request, string $id)
    {
        $user = \App\Models\User::findOrFail($id);
        $user->name = $request->get('nama');
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->level = json_encode($request->get('level'));
        $user->save();

        return redirect()->route('users.index')->with('status', 'User berhasil diubah');
    }

    public function destroy(string $id)
    {
        $user = \App\Models\User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('status', 'User berhasil dihapus');
    }
}