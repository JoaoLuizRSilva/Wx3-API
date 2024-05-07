<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cidade;

class CidadeController extends Controller
{
    public function index()
    {
        $cidades = Cidade::all();
        return response()->json($cidades);
    }

    public function show($id)
    {
        $cidade = Cidade::findOrFail($id);
        return response()->json($cidade);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:25',
        ]);

        $cidade = Cidade::create([
            'nome' => $validatedData['nome'],
        ]);

        return response()->json($cidade, 201);
    }

    public function update(Request $request, $id)
    {
        $cidade = Cidade::findOrFail($id);

        $validatedData = $request->validate([
            'nome' => 'required|string|max:25',
        ]);

        $cidade->update([
            'nome' => $validatedData['nome'],
        ]);

        return response()->json($cidade, 200);
    }

    public function destroy($id)
    {
        $cidade = Cidade::findOrFail($id);

        $cidade->delete();

        return response()->json(null, 204);
    }    
}