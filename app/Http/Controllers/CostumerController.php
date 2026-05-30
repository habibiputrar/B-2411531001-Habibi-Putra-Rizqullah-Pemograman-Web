<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use Illuminate\Http\Request;

class CostumerController extends Controller
{
    public function index()
    {
        $costumers = Costumer::all();
        return view('costumers.index', compact('costumers'));
    }

    public function create()
    {
        return view('costumers.create');
    }

    public function store(Request $request)
    {
        Costumer::create($request->only(['name', 'email', 'phone', 'address']));
        return redirect('/costumers');
    }

    public function edit($id)
    {
        $costumer = Costumer::find($id);
        return view('costumers.edit', compact('costumer'));
    }

    public function update(Request $request, $id)
    {
        $costumer = Costumer::find($id);
        $costumer->update($request->only(['name', 'email', 'phone', 'address']));
        return redirect('/costumers');
    }

    public function destroy($id)
    {
        $costumer = Costumer::find($id);
        $costumer->delete();
        return redirect('/costumers');
    }
}